<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'connection.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

require '../vendor/autoload.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    $requiredFields = ['client-name', 'client-surname', 'client-phone', 'client-email', 'business-name', 'user-query', 'discovery'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            die("Please fill in all required fields.");
        }
    }

    // Sanitize and prepare data
    $name = $mysqli->real_escape_string(trim($_POST['client-name']));
    $surname = $mysqli->real_escape_string(trim($_POST['client-surname']));
    $email = $mysqli->real_escape_string(trim($_POST['client-email']));
    $phone = $mysqli->real_escape_string(trim($_POST['client-phone']));
    $business_name = $mysqli->real_escape_string(trim($_POST['business-name']));
    $website_link = $mysqli->real_escape_string(trim($_POST['website-address']) ?? '');
    $client_question = $mysqli->real_escape_string(trim($_POST['user-query']));
    $discovery_medium = $mysqli->real_escape_string(trim($_POST['discovery']));
    $onboard = false;
    $_SESSION['email_registered'] = false;

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Check for duplicate email
    $stmt = $mysqli->prepare("SELECT * FROM potential_clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['email_registered'] = true;
        $stmt->close();
    } else {
        // Insert new data
        $stmt = $mysqli->prepare("INSERT INTO potential_clients (name, surname, email, phone, business_name, website_link, client_question, discovery_medium, onboard) VALUES (?, ?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $name, $surname, $email, $phone, $business_name, $website_link, $client_question, $discovery_medium, $onboard);
    
        if ($stmt->execute()) {
            $_SESSION['insertion_success'] = true;


            // Create the Transport
            $transport = (new Swift_SmtpTransport('mail.smxafrika.co.za', 587, 'tls'))
                ->setUsername('info@smxafrika.co.za')
                ->setPassword('password');
            
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            
            // Create a message
            $message = (new Swift_Message('New Potential Client from SMX website'))
                ->setFrom(['info@smxafrika.co.za' => 'SMX Afrika Enterprises'])
                ->setTo(['sm.ced.xulu@gmail.com'])
                ->setBody('There was a new analysis request from a potential client Name:'.$name. ' Email: '.$email);
            
            // Send the message
            $result = $mailer->send($message);
            if ($result) {
                
            } else {
                
            }
                
        } else {
            $_SESSION['insertion_success'] = false;
            
        }
        $stmt->close();
    }
}

// Redirect to analysis page after processing
header("Location: ../analysis.php");
exit();
?>
