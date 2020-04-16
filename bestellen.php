<?php require('header.php'); ?>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
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

    // Query opbouwen INSER INTO bestellingen
    
    $ticketID = $_POST['ticketid'];
    $aantal = $_POST['aantal'];
    $datum = date('Y-m-d H:i:s');

    $sql = "INSERT INTO bestellingen (klantID, ticketID, aantal, datum) VALUES ('".$_SESSION['id']."', '$ticketID', '$aantal', '$datum')";
    $conn -> query($sql);
    $conn -> close();

    echo "<br>" . $_SESSION['id'];
}

else
{
    echo 'U bent niet ingelogd';
    header("refresh:1'url=register.php");
}
?>