<?php

include("../inc/connection.php");

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require 'path/to/PHPMailer/src/Exception.php';
//require 'path/to/PHPMailer/src/PHPMailer.php';
//require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['uname'];
  $userAddress = $_POST['mail'];
  $pswd = $_POST['pswd'];
  $repeat_pswd = $_POST['repeat_pswd'];

  $name = strip_tags($name);
  $userAddress = strip_tags($userAddress);
  $pswd = strip_tags($pswd);
  $repeat_pswd = strip_tags($repeat_pswd);

  // SQL Email Checko
/*
  $stmt = $con->prepare("SELECT email from people where email = ':name'");
  $stmt->bindParam(":name", $userAddress);
  $stmt->execute();
  if($stmt->rowCount() > 0)
  {
      // Email již registrovan k jinemu uzivateli
  }

*/

//kontrola existujících jmen
if (trim($_POST["uname"]) !== "") {
    $sql = "SELECT ID FROM people WHERE name = ?";

    if ($stmt = $conn->prepare($sql)) {
        $param_username = trim($_POST["uname"]);
        $stmt->bind_param("s", $param_username);

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows() >= 1) {
                //--------------------
                session_start();
                $_SESSION['errUserIsExist'] = true;
                //--------------------
                header("location: ../index.php");
                die();
            } else {
                $name = trim($_POST["uname"]);
            }
        } else {
            echo "Something went wrong.";
            die();
        }
        $stmt->close();
    }
}

//kontrola existujících emailů
if (trim($_POST["mail"]) !== "") {
    $sql = "SELECT ID FROM people WHERE email = ?";

    if ($stmt = $conn->prepare($sql)) {
        $param_mail = trim($_POST["mail"]);
        $stmt->bind_param("s", $param_mail);

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows() >= 1) {
                //--------------------
                session_start();
                $_SESSION['errEmailIsExist'] = true;
                //--------------------
                header("location: ../index.php");
                die();
            } else {
                $userAddress = trim($_POST["mail"]);
            }
        } else {
            echo "Something went wrong.";
            die();
        }
        $stmt->close();
    }
}

//kontrola hesel
if (trim($_POST["pswd"]) !== "") {
    $password = trim($_POST["pswd"]);
}

//kontrola hesla
if (trim($_POST["repeat_pswd"]) !== "") {
    $repeat_pswd = trim($_POST["repeat_pswd"]);
}

//kontrola shody hesel a zápis do databáze
if ($password === $repeat_pswd) {
    $sql = "INSERT INTO people (name, email, password, admin) VALUES (?, ?, ?, 0)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $param_username, $param_mail, $param_pswd);

        $param_username = $name;
        $param_mail = $userAddress;
        $param_pswd = password_hash($pswd, PASSWORD_DEFAULT);
        

        if ($stmt->execute()) {
            // All ok

            // SEND MAIL

            
            $mail->From = "no-reply@scp-isolation.com";
            $mail->FromName = "Piticker";

            $mail->addAddress($userAddress, $username);

            $mail->isHTML(true);

            $mail->Subject = "CS! Piticker!";
            $mail->Body = "<i>AAAAAAAAAAAAAAAAAAAAAAA</i>";
            $mail->AltBody = "BBBBBBRRR NO HTML";

            try {
                $mail->send();
                echo "Message has been sent successfully";

                header("location: ../autorization_tx_mail.php");

            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        
        } else {
            echo "Something went wrong.";
        }
        $stmt->close();
    }
}
else{
    //--------------------
    session_start();
    $_SESSION['errPswdNotMatch'] = true;
    //--------------------
    header("location: ../index.php");
    die();
}



$conn->close();
}


?>