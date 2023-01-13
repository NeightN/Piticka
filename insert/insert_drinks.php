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
$type = $_POST['types'];

$sql = "select ID from types where typ = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $type);
    if($stmt->execute()){
        $stmt->store_result();
        if($stmt->num_rows() >= 1){
            $stmt->bind_result($type_id);
            if($stmt->fetch()){
                    $_SESSION["type_id"] = $type_id;
                } else{
                    header("location: ../index2.php");
                    die();
                }
            }
        }
        else{
            header("location: ../index2.php");
            die();
        }
        $stmt->close();
    }
$sql = "INSERT INTO drinks (date, id_people, id_types) VALUES (?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sss", date("Y-m-d"), $id, $_SESSION["type_id"]);
}

for($i = 0; $i < $number_drinks; $i++){
    if ($stmt->execute()) {
    }    
}


$conn->close();

header("location: ../index2.php");
?>