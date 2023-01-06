<?php

/* call internally only !!! */


include("../inc/connection.php");

// Get all users from the database
$query = "SELECT * FROM people";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

// Loop through each user and send an email
while ($user = $result->fetch_assoc()) {
    $to = $user['email'];
    $subject = 'Hello from PHP';
    $message = 'This is a test email from PHP';
    $headers = 'From: sender@example.com' . "\r\n" .
               'Reply-To: sender@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

// Close the database connection
$conn->close();
?>