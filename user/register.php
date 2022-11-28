<?php

include("../inc/connection.php");


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

    //kontrola shody hesel
    if ($password === $repeat_pswd) {

        // zápis do databáze
        $sql = "INSERT INTO people (name, email, password, admin) VALUES (?, ?, ?, 0)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sss", $param_username, $param_mail, $param_pswd);

            $param_username = $name;
            $param_mail = $userAddress;
            $param_pswd = password_hash($pswd, PASSWORD_DEFAULT);


            // IF SQL QUERY WENT FINE
            if ($stmt->execute()) {

                // SEND MAIL
                $ver_key = serialize(bin2hex(random_bytes(18)));
                $dateTomorrow = date("Y-m-d", strtotime("+1 day"));
                
                $mailee->From = "no-reply@scp-isolation.com";
                $mailee->FromName = "Piticker";

                $mailee->addAddress($userAddress, $username);

                $mailee->isHTML(true);

                $mailee->Subject = "Piticker! - Verification";
                $mailee->Body = "<i>Generated at: </i>" . date("h:i:sa") . "<br> Verification link: " . "http://piticka.scp-isolation.com/autorization_tx_mail.php?user=" . $name . "&key=" . $ver_key . "<br>Code expires: " . $dateTomorrow;
                $mailee->AltBody = "<i>Generated at: </i>" . date("h:i:sa") . "<br> Verification link: " . "http://piticka.scp-isolation.com/autorization_tx_mail.php?user=" . $name . "&key=" . $ver_key . "<br>Code expires: " . $dateTomorrow;

                try {
                    $mailee->send();
                    echo "Message has been sent successfully";

                    header("location: ../autorization_tx_mail.php");
                } catch (Exception $e) {
                    echo "Mailer Error: " . $mailee->ErrorInfo;
                }
            } else {
                echo "Something went wrong.";
            }
            $stmt->close();



            // Get user ID
            $user_ID = 0;
            $sql = "SELECT ID FROM people WHERE name = ?";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", trim($_POST["user"]));

                if ($stmt->execute()) {
                    $stmt->store_result();

                    if ($stmt->num_rows() == 1) {
                        //--------------------
                        $user_ID = $row[0];
                    }
                } else {
                    echo "Something went wrong.";
                    die();
                }
                $stmt->close();
            }





            // Write verKey
            $sql = "INSERT INTO awaitingVerification (user_fk, ver_code, expiry) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sss", $user_ID, $ver_key, $dateTomorrow);
            }
            // IF SQL QUERY WENT FINE
            if ($stmt->execute()) {
            }

            
        } else {
            //--------------------
            session_start();
            $_SESSION['errPswdNotMatch'] = true;
            //--------------------
            header("location: ../index.php");
            die();
        }
    }

    $conn->close();
}
