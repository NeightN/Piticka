<!DOCTYPE html>
<html lang="cz">

<head>
    <meta charset="utf-8">
    <title>Piticka</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body id="color-text">

    <!-- Header -->
    <?php
    session_start();
    include("headers/header_not_logged.php");
    ?>

    <main class="background" onmousedown='return false;' onselectstart='return false;'>

        <div class="container mt-2">
            <!-- CONTENT TADI!!!!!  -->

            <?php include("headers/notification.php") ?>

        </div>



        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <div class="horizontal-centred">
            <h1 class="text-center">Piticka</h1>
        </div>
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />

    </main>


    <!-- Footer -->
    <?php include("footer/footer.php") ?>


</body>

</html>