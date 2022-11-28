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
                <div class="background">
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                </div>
                <!--
                <div class="area">
                    <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        
                    <img class="svg_animation filter-default" src="img/bean.svg" alt="Bean" />
                    <img class="svg_animation" src="img/bean.svg" alt="Bean" />
                    <img class="svg_animation" src="img/bean.svg" alt="Bean" />
                    <img class="svg_animation" src="img/bean.svg" alt="Bean" />
                    <img class="svg_animation" src="img/bean.svg" alt="Bean" />
                    <img class="svg_animation" src="img/bean.svg" alt="Bean" />

                    </ul>
                </div>
                                    -->
            </main>
            <!-- Footer -->
            <footer class="footer-height bg-dark navbar-dark">
                <div class="container-fluid row" id="list-s-t">
                    <h3>Podívejte se na:</h3>
                    <div class="col">
                        <ul id="ul-padding">
                            <li class="nav-item"><a class="nav-link" href="index.html">Domů</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Autor</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Kontakty</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Zpět</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="#">Spolupráce</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Pomoc</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Kariéra</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Podpora</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="#">Speciální</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Nové produkty</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Reklamace</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Ochrana osobních údajů</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h3>Najdete nás na:</h3>
                        <ul class="nav nav-pills" id="social">
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Discord">
                                    <i class="bi bi-discord"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>