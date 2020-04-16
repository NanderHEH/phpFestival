<?php
    if(isset($_POST['signup-submit'])) 
    {
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

            // Query opbouwen INSERT INTO
            $voornaam = $_POST['voornaam'];
            $achternaam = $_POST['achternaam'];
            $email = $_POST['email'];
            $wachtwoord = $_POST['wachtwoord'];

            // Controleren of form goed is ingevuld    
            $wachtwoord = $_POST['wachtwoord'];
            $wachtwoordRepeat = $_POST['wachtwoord-repeat'];

            if($wachtwoord != $wachtwoordRepeat)
            {
            echo 'Vul juiste wachtwoorden in.';
            header("refresh:2; url=register.php");
            }

            else
            {            
            $sql = "INSERT INTO klanten (voornaam, achternaam, email, wachtwoord) VALUES ('$voornaam', '$achternaam', '$email', '$wachtwoord')";

            if(!mysqli_query($conn, $sql))
            {
                echo 'Registratie niet gelukt';
            }

            else
            {
                echo 'Registratie gelukt';
            }

            header("refresh:1; url=login.php");
            }
    }
?>