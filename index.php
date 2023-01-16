<!DOCTYPE html>
<html lang="cz">

<head>
    <meta charset="utf-8">
    <title>Piticka</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body id="color-text" class="background-gradient">

            <div style="position: relative;">
                <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
                <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
            </div>


<div id="wrapper">

        <?php
        session_start();
        include("headers/header_not_logged.php");
        ?>

        <main class="background">
            <!-- Header -->
            <div class="container mt-2">
                <?php include("headers/notification.php") ?>
            </div>
        </main>

        <div class="content">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h1>Piticka</h1>

                <p>Pro pokračování se přihlaště. </p>
                <button class="btn bg-pale-taupe text-dark-coffee" type="button" data-bs-toggle="offcanvas" data-bs-target="#login">
                    Log in
                </button>

            </div>
        </div>
        <!-- Footer -->
        <?php include("footer/footer.php") ?>
    </div>

</body>

</html>