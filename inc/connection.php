<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
set_include_path('inc\\');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'Mailer\Exception.php';
require_once 'Mailer\PHPMailer.php';
require_once 'Mailer\SMTP.php';
*/

// SQL 

$servername = "localhost";
$username = "root";
$password = ""; //"student"
$db = "coffe_lmsoft_cz";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Mailer (Local config, do not enable TLS or change IP unless deplyed)


/*
$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name                          
$mail->Host = "scp-isolation.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "piticka@scp-isolation.com";                 
$mail->Password = "piticka123";                           

//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";          

// Only on local, remove later
$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;


//Set TCP port to connect to
$mail->Port = 25;              
*/




?>