<?php
  error_reporting(0);
   include("connection.php");
  @session_start();
  $sql = "SELECT * FROM account JOIN member ON account.Member_id = member.Member_id WHERE Username ='$_SESSION[login_true]' ";
  $result = $conn->query($sql) or die ("Err Can not to result");
  $dbarr = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">
<head>
  <?php 
        error_reporting(E_ERROR | E_PARSE);
        if($_GET['p'] == "member" ) {
          echo '<title>Member</title>';
        }else if($_GET['p'] == "account" ){
          echo '<title>Account</title>';
        }else if($_GET['p'] == "room" ){
          echo '<title>Room</title>';
        }else if($_GET['p'] == "payment" ){
          echo '<title>Payment</title>';
        }else if($_GET['p'] == "books" ){
          echo '<title>Books</title>';
        }else{
          echo '<title>Member</title>';
        }
  ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <a href="./" class="simple-text logo-normal">
          Hotel Reseration PJ
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <?php if ($dbarr["status"] != "ADM"){
        }
        else{ ?>

        <?php 
          if($_GET['p'] == "member" ) {
              echo '<li class="nav-item active  ">';
          }
        ?>
            <a class="nav-link" href="?p=member">
              <i class="material-icons">person</i>
              <p>Member</p>
            </a>
          </li>
          <?php 
          if($_GET['p'] == "account" ) {
              echo '<li class="nav-item active  ">';
          }
        ?>
            <a class="nav-link" href="?p=account">
              <i class="material-icons">people</i>
              <p>Account</p>
            </a>
          </li>
          <?php 
          if($_GET['p'] == "room" ) {
              echo '<li class="nav-item active  ">';
          }
        ?>
            <a class="nav-link" href="?p=room">
              <i class="material-icons">domain</i>
              <p>Room</p>
            </a>
          </li>
          <?php 
          if($_GET['p'] == "books" ) {
              echo '<li class="nav-item active  ">';
          }
        ?>
            <a class="nav-link" href="?p=books">
              <i class="material-icons">touch_app</i>
              <p>Books</p>
            </a>
          </li>
          <?php 
          if($_GET['p'] == "books_detail" ) {
              echo '<li class="nav-item active  ">';
          }
        ?>
            <a class="nav-link" href="?p=books_detail">
              <i class="material-icons">touch_app</i>
              <p>Books Detail</p>
            </a>
          </li>
          <?php 
          if($_GET['p'] == "payment" ) {
              echo '<li class="nav-item active  ">';
          }
        ?>
            <a class="nav-link" href="?p=payment">
              <i class="material-icons">payment</i>
              <p>Payment</p>
            </a>
          </li>
          <?php } ?>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <?php 
      error_reporting(E_ERROR | E_PARSE);
      if($_GET['p'] == "member" ) {
      include("member.php");
      }else if($_GET['p'] == "account" ) {    
      include("account.php");   //if you add page add code in code.txt below here.
      }else if($_GET['p'] == "books" ) {    
        include("books.php");   //if you add page add code in code.txt below here.
      }else if($_GET['p'] == "payment" ) {    
        include("payment.php");   //if you add page add code in code.txt below here.
      }else if($_GET['p'] == "room" ) {    
        include("room.php");   //if you add page add code in code.txt below here.
      }else if($_GET['p'] == "books_detail" ) {    
        include("BookD.php");   //if you add page add code in code.txt below here.
      }else{
      include("home.php");
      } ?>
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="./">
                  Hotel Reservation Project | 520221-2560  	DATABASE SYSTEMS
                </a>
              </li>
            </ul>
          </nav>
          
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
</body>

</html>