<?php
   $dbHost = "db";
    $dbUser = "wordpress";
    $dbPassword = "wordpress";
    $dbName = "wordpress";
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    
    if ($conn->connect_error) 
    {
     die("Connection failed: " . $conn->connect_error);
    }
    
?>

