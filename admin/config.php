<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "e_commerce"; 


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        echo '<script>alert("data base not connected")</script>';
        echo '<script>alert("data base not connected")</script>';
        echo '<script>alert("data base not connected")</script>';

    }
?>
