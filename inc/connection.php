<?php
$servername = "localhost";
$username = "root";
$password = ""; //"student"
$db = "coffe_lmsoft_cz";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>