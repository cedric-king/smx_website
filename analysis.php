<?php
session_start(); // Start session to access session variables
$show_modal_email_registered = false;
$show_modal_insert_success = false;

// Check if the session variable is set, indicating success for already registered email
if (isset($_SESSION['email_registered']) && $_SESSION['email_registered'] === true) {
    $show_modal_email_registered = true;
    unset($_SESSION['email_registered']); // Clear session variable
}

// Check if the session variable is set, indicating success for successful data insertion
if (isset($_SESSION['insertion_success']) && $_SESSION['insertion_success'] === true) {
  $show_modal_insert_success = true;
  unset($_SESSION['insertion_success']); // Clear session variable
}else{
  $show_modal_insert_success = false;
  unset($_SESSION['insertion_success']);
}

?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <script src="js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sandile Mbuso Xulu, Founder & CEO of SMX AFRIKA ENTERPRISES">
    <meta name="generator" content="smx_afrika_enterprises">

    <title>SMX AE - Digital Marketing and Technology Solutions</title>
    <link rel="icon" type="image/x-icon" href="img/smx_logo.png" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.cdnfonts.com/css/opificio" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/heroes/">
    <link href="css/sign-in.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroes.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/jumbotron/">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }
      .myfont{
            font-family: 'Open Sans', sans-serif;
        }
      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
  </head>
  
      <!-- Google tag (gtag.js), this is for link to google analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NYGFR2EEFE"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-NYGFR2EEFE');
    </script>
    
<body>
    
  <?php include 'top_navigation.php'; ?>
<main>
  
  <div class="container py-4">
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Receive A Free Tailored Solution Analysis</h1><br>
        <p class="col-md-8 fs-4">Would you like to know what we can do for you? <br>Fill out the form below and we will contact you within 48 hours for a free analysis. <br>No costs, no obligations, no annoying sales pitch. Guaranteed..</p>
      </div>
    </div>
    <br>
  <div>

  <div class="container">
   <form action="php/analysis_form.php" method="POST">
      <div class="input-group mb-3">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="Enter Your Name" name="client-name" required>
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="Enter Your Surname" name="client-surname" required>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" placeholder="Enter Your Email" name="client-email" required>
        <span class="input-group-text">@</span>
        <input type="number" class="form-control" placeholder="Enter Your Phone Number" name="client-phone" required>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Enter Your Business Name" name="business-name" aria-describedby="basic-addon1" required>
      </div>

      <div class="mb-3">
        <label for="basic-url" class="form-label">Your Business Website (If available)</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon3">https://company-website.com/</span>
          <input type="text" class="form-control"name="website-address" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
        </div>
      </div>

      <div class="mb-3">
        <label for="basic-url" class="form-label">How Can We Help You?</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon3">@</span>
          <textarea class="form-control" name="user-query" aria-label="With textarea" required></textarea>
        </div>
      </div>

      <div class="mb-3">
        <label for="basic-url" class="form-label">How Did You Find Us?</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon3">@</span>
          <input type="text" class="form-control" name="discovery" id="basic-url" aria-describedby="basic-addon3 basic-addon4" required>
        </div>
      </div>

      <div class="d-grid gap-2 mb-3">
        <button class="btn btn-lg btn-primary" type="submit" value="submit">Send</button>
      </div>
    </form>

  </div>


  <!-- Bootstrap Modal For Already Registered Email -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalTitle">This email is already registered.</h5>
              </div>
              <div class="modal-body">
                  Try to give us a call if its urgent
              </div>
          </div>
      </div>
  </div>

    <!-- Bootstrap Modal For Data Inserted Successfully -->
    <div class="modal fade" id="formSentModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalTitle">Form Successfully Sent to Us</h5>
              </div>
              <div class="modal-body">
                  We will get back to you shortly
              </div>
          </div>
      </div>
  </div>


<?php include 'bottom_navigation.php'; ?>

</main>
    
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
      // Show the modal if PHP flag $show_modal_email_registered is true
      <?php if ($show_modal_email_registered): ?>
          $(document).ready(function() {
              $('#successModal').modal('show');
              
              // Close the modal after 5 seconds (5000 milliseconds)
              setTimeout(function() {
                  $('#successModal').modal('hide');
              }, 5000);

              $('#successModal').on('hidden.bs.modal', function () {
                  location.reload();
              });
          });
      <?php endif; ?>
    </script>

   <script>
      // Show the modal if PHP flag $show_modal_insert_success is true
      <?php if ($show_modal_insert_success): ?>
          $(document).ready(function() {
              $('#formSentModal').modal('show');
              
              // Close the modal after 5 seconds (5000 milliseconds)
              setTimeout(function() {
                  $('#formSentModal').modal('hide');
              }, 5000);

              $('#formSentModal').on('hidden.bs.modal', function () {
                  location.reload();
              });
          });
      <?php endif; ?>
    </script>
</body>
</html>
