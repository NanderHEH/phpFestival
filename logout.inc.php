<?php 

    if(isset($_POST['logout-submit']))
    {
        session_start();
        session_destroy();
        
        echo "U bent uitgelogd";
        header("refresh:1; url=home.php");
        
    }
?>