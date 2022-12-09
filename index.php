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

<body id="color-text" class="background-gradient">
    <div id="wrapper">

    <?php
    session_start();
    include("headers/header_not_logged.php");
    ?>

    <main class="background" onmousedown='return false;' onselectstart='return false;'>

    <!-- Header -->
        <div class="container mt-2">
            <!-- CONTENT TADI!!!!!  -->

            <?php include("headers/notification.php") ?>

        </div>

        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />
        <img class="svg_animation filter-default" src="img/bean.svg" alt="bean.svg" />

    </main>

    <div class="content">
        <div class="d-flex justify-content-center align-items-baseline ">
            <h1>Piticka</h1>


    <?php
    

        include("../inc/connection.php");

        $sql = "SELECT ID, name, email FROM people";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["ID"] . " - Name: " . $row["name"] . " " . $row["email"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();

    
    ?>


        </div>

    </div>
            
    
    <!-- Footer -->
    <?php include("footer/footer.php") ?>
    </div>
    
</body>

</html>