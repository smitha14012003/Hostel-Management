<?php
    $dbuser = "root";
    $dbpass = "";
    $host = "localhost";
    $db = "hostelmsphp";
    
    // Establishing database connection
    $mysqli = new mysqli($host, $dbuser, $dbpass, $db);
    
    // Check for connection errors
    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }
?>
