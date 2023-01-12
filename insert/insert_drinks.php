<?php
include("../inc/connection.php");

session_start();
if (isset($_SESSION['uname']) != null) {
    $name = $_SESSION['uname'];
}
if (isset($_SESSION['ID']) != null) {
    $id = $_SESSION['ID'];
}

$number_drinks = $_POST['number_drinks'];
$type = $_POST['typ'];
$drink_id = $_POST['drink_id'];

$sql = "INSERT INTO drinks (date, id_people, id_types) VALUES (?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
$stmt->bind_param("sss", date("Y-m-d"), $id, $drink_id);
}

if ($stmt->execute()) {
}
$conn->close();

header("location: ../index2.php");
?>