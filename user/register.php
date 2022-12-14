<?php

include("../inc/connection.php");


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Invalid request";
}


// collect value of input field
$name = $_POST['uname'];
$userAddress = $_POST['mail'];
$pswd = trim($_POST["pswd"]);
$repeat_pswd = trim($_POST["repeat_pswd"]);

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

                // USER EXISTS, GO BACC
                session_start();
                $_SESSION['errUserIsExist'] = true;
                $_SESSION['err'] = "Username is already taken.";

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
                // EMAIL TAKEN
                session_start();
                $_SESSION['errEmailIsExist'] = true;
                $_SESSION['err'] = "Email is already taken.";
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

//kontrola shody hesel
if ($pswd !== $repeat_pswd) {

    session_start();
    $_SESSION['err'] = "Passwords do not match: " . $pswd . " / " . $repeat_pswd;
    //--------------------
    header("location: ../index.php");
    die();
}


// zápis do databáze
$sql = "INSERT INTO people (name, email, password, admin) VALUES (?, ?, ?, 0)";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sss", $param_username, $param_mail, $param_pswd);

    $param_username = $name;
    $param_mail = $userAddress;
    $param_pswd = password_hash($pswd, PASSWORD_DEFAULT);


    // IF SQL QUERY WENT FINE
    if ($stmt->execute()) {
    } else {

        echo "Something went wrong.";
        session_start();
        $_SESSION['err'] = "An error occured during database write. User was not logged.";
        header("location: ../index.php");
    }
    $stmt->close();
}


// VERIFICATION AREA

$ver_key = serialize(bin2hex(random_bytes(18)));
$dateTomorrow = date("Y-m-d", strtotime("+1 day"));

// SEND MAIL
/*
$mailee->From = "no-reply@scp-isolation.com";
$mailee->FromName = "Piticker";

$mailee->addAddress($userAddress, $username);

$mailee->isHTML(true);

$mailee->Subject = "Piticker! - Verification";
$mailee->Body = "<i>Generated at: </i>" . date("h:i:sa") . "<br> Verification link: " . "http://piticka.scp-isolation.com/autorization_tx_mail.php?user=" . $name . "&key=" . $ver_key . "<br>Code expires: " . $dateTomorrow;
$mailee->AltBody = "<i>Generated at: </i>" . date("h:i:sa") . "<br> Verification link: " . "http://piticka.scp-isolation.com/autorization_tx_mail.php?user=" . $name . "&key=" . $ver_key . "<br>Code expires: " . $dateTomorrow;

try {
    $mailee->send();

} catch (Exception $e) {

    echo "Mailer Error: " . $mailee->ErrorInfo;
}
*/

// Get user ID
$user_ID = 0;
$sql = "SELECT ID FROM people WHERE name = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", trim($_POST["uname"]));

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($result->num_rows == 1) {
            //--------------------
            $user_ID = $row['ID'];
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
$conn->close();

header("location: ../autorization_tx_mail.php");
