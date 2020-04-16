<?php include_once('header.php');?>


<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#festival" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">FESTIVAL</a>
  <a href="#tickets" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">TICKETS</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MERCH</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="images/Travis_Scott.jpg" style="width:60%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>TRAVIS SCOTT</h3>
      <p><b>Gevaarlijk vlammen bij de rapper uit Houston!</b></p>   
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="images/kensington.jpg" style="width:60%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>KENSINGTON</h3>
      <p><b>In een paar jaar tijd is Kensington uitgegroeid tot een band waar je U tegen zegt!</b></p>    
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="images/mac_demarco.webp" style="width:60%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>MAC DEMARCO</h3>
      <p><b>De vader van de indie muziek die we nu kennen.</b></p>    
    </div>
  </div>

  <!-- Festival Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="festival">
    <h2 class="w3-wide">GRAAFSCHAP FESTIVAL</h2>
    <p class="w3-opacity"><i>~ We love music ~</i></p>
    <p class="w3-justify">Bij het Graafschapcollege staat onderwijs op #1, maar natuurlijk moet je af en toe ook gods gruwelijk uit je dak kunnen gaan. 
        Maak het allemaal mee op het vetste MBO festival van Nederland!<br> Kom jij ook?
    </p>
    <div class="w3-row w3-padding-32">
    </div>
  </div>

    <!-- The Ticket Section -->
    <div class="w3-black" id="tickets">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
          <h2 class="w3-wide w3-center">TICKETS</h2>
          <p class="w3-opacity w3-center"><i>Remember to book your tickets!</i></p><br>
    
          <ul class="w3-ul w3-border w3-white w3-text-grey">
            <li class="w3-padding">Basic <span class="w3-badge w3-right w3-margin-right">10.000</span></li>
            <li class="w3-padding">Premium <span class="w3-badge w3-right w3-margin-right">500</span></li>
            <li class="w3-padding">Vips <span class="w3-badge w3-right w3-margin-right">250</span></li>
          </ul>
    
          <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
          <?php
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

              $sql = "SELECT * FROM tickets";

              $result = $conn->query($sql);
                  //print_r($result);
                  if($result->num_rows > 0)
                  {
                      while($row = $result->fetch_assoc()) {
                          ?>
                          <!-- Start ticket -->
                          <div class="w3-third w3-margin-bottom">
                            <div class="w3-container w3-white">
                              <p><b><?php echo $row['naam']; ?></b></p>
                              <p class="w3-opacity">Fri 26 Juni 2020</p>
                              <p>€<?php echo $row['prijs'];?>,-</p>
                              <!-- formulier maken met input type submit met value ticketid -->
                              <form action="ticket.php" method="POST">
                                <input type="text" value="<?php echo $row['naam']; ?>" name="naam" hidden>
                                <button class="w3-button w3-black w3-margin-bottom" name="ticketid" value="<?php echo $row['ticketID']; ?>">Buy Tickets</button>               
                              </form>
                            </div>
                          </div>
                        <!-- einde ticket -->
                          <?php
                      }    
                  }

          ?>
          </div>
        </div>
      </div>

  <!-- Ticket Modal -->
  <div id="ticketModal1" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal w3-center w3-padding-32"> 
        <span onclick="document.getElementById('ticketModal1').style.display='none'" 
       class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
      </header>
      <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, €40 per persoon</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Hoeveel stuks?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal1').style.display='none'">Close <i class="fa fa-remove"></i></button>
        <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
      </div>
    </div>
  </div>

  <div id="ticketModal2" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal w3-center w3-padding-32"> 
        <span onclick="document.getElementById('ticketModal2').style.display='none'" 
       class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
      </header>
      <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, €60 per persoon</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Hoeveel stuks?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal2').style.display='none'">Close <i class="fa fa-remove"></i></button>
        <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
      </div>
    </div>
  </div>

  <div id="ticketModal3" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal w3-center w3-padding-32"> 
        <span onclick="document.getElementById('ticketModal3').style.display='none'" 
       class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
      </header>
      <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, €100 per persoon</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Hoeveel stuks?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal3').style.display='none'">Close <i class="fa fa-remove"></i></button>
        <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
      </div>
    </div>
  </div>

  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> J.F. Kennedylaan 49<br>
        <i class="fa fa-phone" style="width:30px"></i> Telefoon: 0314 353 500<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: info@graafschapcollege.nl<br>
      </div>
      <div class="w3-col m6">
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Naam" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="E-mail" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Bericht" required name="Message">
          <button class="w3-button w3-black w3-section w3-right" type="submit">VERSTUUR</button>
        </form>
      </div>
    </div>
  </div>
  
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
