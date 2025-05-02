<?php

$servername = "localhost";
$username = "smxafjpp";
$password = "Sx0791153@";
$database_name = "smxafjpp_clients";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database_name);

// Check connection errors
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

?>