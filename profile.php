<?php include_once('header.php');?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">
<?php 

// Gegevens voor de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "festival";

// Connectie aanmaken
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer connectie
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  $id = $_SESSION['id'];

  $sql = "SELECT * FROM klanten WHERE id='" . $id . "'";

  $result = $conn->query($sql);
      if($result->num_rows > 0)
      {
          //Goed
          
          // $result is een object, maar je wil de resultaten uit de gevonden rijen van de database
          while($row = $result->fetch_assoc()) 
          {
              ?>
                <form action="register.inc.php" method="GET">
                    <div class="container">
                      <h1>Welkom <?php echo $row['voornaam'];?> <?php echo $row['achternaam'];?></h1>
                      <p>Hier ziet u uw Graafschap festival profiel</p>
                      <hr>

                      <label for="voornaam"><b>Voornaam</b></label>
                      <input type="text" value="<?php echo $row['voornaam']; ?>" placeholder="Vul uw voornaam in" name="voornaam" readonly>
                  
                      <label for="achternaam"><b>Achternaam</b></label>
                      <input type="text" value="<?php echo $row['achternaam']?>" name="achternaam" readonly>  
                      
                      <label for="email"><b>Email</b></label>
                      <input type="text" value="<?php echo $row['email']?>" name="email" readonly>
                  
                      <label for="wachtwoord"><b>Wachtwoord</b></label>
                      <input type="password" value="<?php echo $row['wachtwoord']?>" name="wachtwoord" readonly>
                      <hr>
                    </div>
                  </form>
              <?php
          }
          
      }
      else
      {
        header("url=home.html");
      }

}// einde if
else
{
  ?>
    <div class="container">
      <p>U bent niet ingelogd, om een account te maken klik <a href="register.php">hier<a>.</p>
    </div>
  <?php
}
?>


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
