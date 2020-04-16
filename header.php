<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="opmaak.css">
<link rel="stylesheet" type="text/css" href="profile.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="home.php#tickets" class="w3-bar-item w3-button w3-padding-large w3-hide-small">TICKETS</a>
    <a href="home.php#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
        <a href="#" class="w3-bar-item w3-button">Merchandise</a>
        <a href="#" class="w3-bar-item w3-button">Media</a>
      </div>
    </div>

      <div class="topnav">
        <div class="login-container">
          <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                { ?>
                  <form action="logout.inc.php" method="POST">
                    <button type="submit" name="logout-submit">Logout</button>
                  </form>
          <?php } 
                else
                { ?>
                  <form action="login.php" class="loginform" method="POST">
                    <button type="submit" name="login-submit">Login</button>
                  </form>
                  <form action="register.php" class="registerform">
                    <button type="submit">Register</button>
                  </form>
          <?php } ?>
        </div>
      </div> 
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#festival" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">FESTIVAL</a>
  <a href="#tickets" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">TICKETS</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MERCH</a>
</div>