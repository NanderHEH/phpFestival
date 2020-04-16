<?php include_once('header.php');?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

<form action="register.inc.php" method="POST">
    <div class="container">
      <h1>Register</h1>
      <p>Vul uw gegevens in om een account te maken</p>
      <hr>
      <label for="voornaam"><b>Voornaam</b></label>
      <input type="text" placeholder="Vul uw voornaam in" name="voornaam" required>
  
      <label for="achternaam"><b>Achternaam</b></label>
      <input type="text" placeholder="Vul uw achternaam in" name="achternaam" required>
      
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Vul uw email in" name="email" required>
  
      <label  for="wachtwoord"><b>Wachtwoord</b></label>
      <input type="password" placeholder="Vul uw wachtwoord in" name="wachtwoord" required>
      
      <label  for="wachtwoord"><b>Bevestig wachtwoord</b></label>
      <input type="password" placeholder="Vul uw wachtwoord opnieuw in" name="wachtwoord-repeat" required>
      <hr>
      <p>Heeft u al een account? klik dan <a href="login.php">hier</a> om in te loggen.</p>
  
      <button type="submit" name="signup-submit" class="registerbtn">Register</button>
    </div>
  </form>

<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
