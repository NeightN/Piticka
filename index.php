<!DOCTYPE html>
<html lang="cz">

<head>
    <meta charset="utf-8">
    <title>Piticka</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body>
    <?php
    include("inc/connection.php");
    session_start();
    // SEND MAIL

    /*
        $mail->From = "no-reply@scp-isolation.com";
        $mail->FromName = "Piticker";

        $mail->addAddress("prokop.svacina@gmail.com", "Prokop");

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
        */

    if (isset($_SESSION['errUserIsExist']) == true or isset($_SESSION['errEmailIsExist']) == true) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Chyba!</strong> Jméno nebo email jsou již používány!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
        </div>';
        $_SESSION['errUserIsExist'] = false;
        $_SESSION['errEmailIsExist'] = false;
    }
    if (isset($_SESSION['errPswdNotMatch']) == true) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Chyba!</strong> Hesla se neshodují!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
        </div>';
        $_SESSION['errPswdNotMatch'] = false;
    }

    if (isset($_SESSION['errNameOrPswd']) == true) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Chyba!</strong> Jméno nebo heslo není správné!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
        </div>';
        $_SESSION['errNameOrPswd'] = false;
    }
    ?>

    <div id="color-text">
        <div id="form-radius">
            <!-- Header -->
            <?php include("headers/header_not_logged.php"); ?>

            <!-- Main -->
            <main>
                <div class="background" onmousedown='return false;' onselectstart='return false;'>
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                </div>
            </main>
            <!-- Footer -->
            <?php include("footer/footer.php") ?>
        </div>
    </div>
</body>

</html>