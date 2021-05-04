<?php

$username = "root";
$password = "Sa0501525293";
$hostname = "localhost";

$conn = mysqli_connect($hostname, $username, $password,"web_project") or die("Unable to connect to MySQL");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


?>
