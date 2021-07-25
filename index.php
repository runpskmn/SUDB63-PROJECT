<?php
  error_reporting(0);
  include("connection.php");
  @session_start();
  $sql = "SELECT * FROM account JOIN member ON account.Member_id = member.Member_id WHERE Username ='$_SESSION[login_true]' ";
  $result = $conn->query($sql) or die ("Err Can not to result");
  $dbarr = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php 
    error_reporting(E_ERROR | E_PARSE);
    if($_GET['p'] == "register" ) {
        echo '<title>Register</title>';
      }else if($_GET['p'] == "login" ) {
        echo '<title>Login</title>';
      }else if($_GET['p'] == "login" ) {
        echo '<title>Login</title>';
      }else if($_GET['p'] == "reserv" || $_GET['p'] == "reservdetail" || $_GET['p'] == "reservconfirm") {
        echo '<title>Reservation</title>';
      }else if($_GET['p'] == "profile" ) {
        echo '<title>Profile</title>';
      }else if($_GET['p'] == "history" ) {
        echo '<title>History</title>';
      }
    else{
      echo '<title>Home</title>';
    } ?>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.0.1
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="?p=home"><span>Hotment</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto <?php if($_GET['p'] == "home"){ echo 'active';} ?>" href="?p=home">Home</a></li>
            <?php if (!isset($_SESSION['login_true'])) { ?>
            <li><a class="nav-link scrollto" <?php if($_GET['p'] == "login"){ echo 'active';} ?>  href="?p=login">Login</a></li>
            <li><a class="getstarted scrollto" href="?p=register">Reister</a></li>
            <?php }else {?>
              <li><a class="nav-link scrollto <?php if($_GET['p'] == "reserv"  or $_GET['p'] == "reservdetail" or $_GET['p'] == "reservconfirm"){ echo 'active';} ?>" href="?p=reserv">Reserv Room</a></li>
              <li class="dropdown"><a href=""><i class="bi bi-person"> </i>  <?php echo $dbarr["Username"]; ?><i class="bi bi-chevron-down"></i><?php echo ' '; ?></a>
              <ul>
                <li><a href="?p=profile" class="bi bi-person-lines-fill">Profile</a></li>
                <li><a href="?p=history" class="bi bi-layout-text-window">Reserv History</a></li>
                <?php if($dbarr["status"]=="ADM"){
                  echo '<li><a href="./admin" class="bi bi-file-earmark-binary-fill">Admin Page</a></li>';
                } ?>
                <li><a href="?p=logout" class="bi bi-box-arrow-right">Logout</a></li>
              </ul>
										</li>
            <?php } ?>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
          
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->
  <?php 
    error_reporting(E_ERROR | E_PARSE);
    if($_GET['p'] == "register" ) {
    include("register.php");
    }else if($_GET['p'] == "login" ) {
    include("login.php");
	  }else if($_GET['p'] == "logout" ) {
      include("logout.php");
    }else if($_GET['p'] == "reserv" ) {
      include("reserv.php");
    }else if($_GET['p'] == "reservdetail" ) {
      include("reserv_detail.php");
    }else if($_GET['p'] == "reservconfirm" ) {
      include("con_reserv.php");
    }else if($_GET['p'] == "history" ) {
      include("history.php");
    }else if($_GET['p'] == "profile" ) {
      include("profile.php");
    }else if($_GET['p'] == "payment" ) {
      include("payment.php");
    }else if($_GET['p'] == "booksdetail" ) {
      include("books_detail.php");
    }else{
      include("home.php");
    } ?>
  

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
     
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Hotment</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">CS Student</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>