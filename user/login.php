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

    $sql = "select ID, name, password from people where name = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        if($stmt->execute()){
            $stmt->store_result();

            if($stmt->num_rows() >= 1){
                $stmt->bind_result($id, $username, $hashed_password);
                if($stmt->fetch()){
                    if(password_verify($password, $hashed_password)){
                        session_start();
                        $_SESSION["logged"] = true;
                        $_SESSION["ID"] = $id;
                        $_SESSION["uname"] = $username;

                        header("location: ../index2.php");
                    } else{
                        session_start();
                        $_SESSION['errNameOrPswd'] = true;
                        header("location: ../index.php");
                        die();
                    }
                }
            }
            else{
                session_start();
                $_SESSION['errNameOrPswd'] = true;
                header("location: ../index.php");
                die();
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>