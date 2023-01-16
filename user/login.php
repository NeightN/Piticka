<?php
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    header("location: ../index.php");
    exit;
}

include("../inc/connection.php");

$username = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["uname"] !== "") {
        $username = trim($_POST["uname"]);
    }
    if ($_POST["pswd2"] !== "") {
        $password = trim($_POST["pswd2"]);
    }

    //$sql = "select people.ID, name, password, admin, user_fk from people inner join awaitingverification on people.user_fk  where name = ?";
    $sql = "
    SELECT people.ID, people.name, people.password, people.admin FROM people WHERE people.ID NOT IN (SELECT user_fk FROM awaitingVerification) and people.name = ?;";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        if($stmt->execute()){
            $stmt->store_result();

            if($stmt->num_rows() >= 1){
                $stmt->bind_result($id, $username, $hashed_password, $admin);
                if($stmt->fetch()){
                    if(password_verify($password, $hashed_password)){
                        session_start();
                        $_SESSION["logged"] = true;
                        $_SESSION["ID"] = $id;
                        $_SESSION["uname"] = $username;
                        $_SESSION["admin"] = $admin;

                        header("location: ../index2.php");
                    } else{
                        session_start();
                        $_SESSION['err'] = "Username or password invalid.";
                        header("location: ../index.php");
                        die();
                    }
                }
            }
            else{
                session_start();
                $_SESSION['err'] = "Username or password invalid.";
                header("location: ../index.php");
                die();
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>