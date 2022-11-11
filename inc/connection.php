<?php
$servername = "localhost";
$username = "root";
$password = "student"; //"student"
$db = "coffe_lmsoft_cz";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>