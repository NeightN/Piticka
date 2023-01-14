<?php
include("../inc/connection.php");

session_start();
if (isset($_SESSION['uname']) != null) {
    $name = $_SESSION['uname'];
}
if (isset($_SESSION['ID']) != null) {
    $id = $_SESSION['ID'];
}

$type_id = 0;

$number_drinks = $_POST['number_drinks'];
$type = $_POST['types'];

$sql = "select ID from types where typ = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $type);
    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows() >= 1) {
            $stmt->bind_result($type_id);
            if ($stmt->fetch()) {
                $type_id;
            } else {
                $conn->close();
                header("location: ../index2.php");
                die();
            }
        }
    } else {
        $conn->close();
        header("location: ../index2.php");
        die();
    }
    $stmt->close();
}

$sql = "INSERT INTO drinks (date, id_people, id_types) VALUES (?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
    if ($type_id == null || $type_id == '') {
        $conn->close();
        header("location: ../index2.php");
        die();
    }
    $stmt->bind_param("sii", date("Y-m-d"), $id, $type_id);
    for ($i = 0; $i < $number_drinks; $i++) {
        if ($stmt->execute()) {
        }
    }
    $stmt->close();
}

$conn->close();
header("location: ../index2.php");
?>