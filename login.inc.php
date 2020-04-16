<?php
//Check if path is valid
    if(isset($_POST['login-submit']))
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

        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        $sql = "SELECT * FROM klanten WHERE email='" . $email . "' AND wachtwoord='" . $wachtwoord . "'";

        $result = $conn->query($sql);
            //print_r($result);
            if($result->num_rows > 0)
            {
                //Goed
                session_start();
                // $result is een object, maar je wil de resultaten uit de gevonden rijen van de database
                while($row = $result->fetch_assoc()) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                }
                    
                echo 'U bent ingelogd als: <br>';
                echo $_SESSION['email'];
                $_SESSION['loggedin'] = true;
                
            }
            else
            {
                //Fout
                echo 'U bent niet ingelogd';
        
            }

            header("refresh:1; url=profile.php");
        
    }
    else
    {
        header("home.html");
    }

?>