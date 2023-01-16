<!DOCTYPE html>
<html lang="cz">

<head>
    <meta charset="utf-8">
    <title>Piticka</title>
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<?php
include '../inc/connection.php';
session_start();
if (isset($_SESSION['uname']) != null) {
    $name = $_SESSION['uname'];
}
if (isset($_SESSION['admin']) != null) {
    $admin = $_SESSION['admin'];
}
if (isset($_SESSION['ID']) != null) {
    $id = $_SESSION['ID'];
}
?>

<body id="color-text" class="background-gradient">
    <div id="wrapper">

        <!-- Header -->
        <?php
        $page = $_SESSION['page'] = "profile.php";
        include("../headers/header_logged.php");
        ?>

        <!-- Main -->
        <main class="main-height background-main content">
            <div class="container mt-2">
                <?php include("../headers/notification.php") ?>
                <!-- CONTENT TADI!!!!!  -->

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item border-accordin-own">
                        <button class="accordion-button collapsed bg-coffee text-desert-sand" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Výpis vypitých pitíček:
                        </button>
                        <div id="flush-collapseOne" class="accordion-collapse collapse bg-pale-taupe" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                            <?php
                            include("../inc/connection.php"); //pripojeni k databazi

                            $sql = "select people.name, types.typ, count(drinks.ID) as pocet, types.davky, month(date) as mesic, year(date) as rok
                                    from drinks inner join people on drinks.id_people = people.ID
                                    inner join types on drinks.id_types = types.ID
                                    where people.name = '" . $name . "'
                                    group by people.name, types.typ, month(date)
                                    order by rok DESC, mesic DESC;";
                            $result = mysqli_query($conn, $sql);
                            echo "<table class='accordion-body m-0 table table-hover'>
                                    <tr>
                                        <th>Typ</th>
                                        <th>Počet</th>
                                        <th>Měsíc</th>
                                        <th>Rok</th>
                                        <th>Cena</th>
                                    </tr>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['typ'] . "</td>";
                                echo "<td>" . $row['pocet'] . "</td>";
                                echo "<td>" . $row['mesic'] . "</td>";
                                echo "<td>" . $row['rok'] . "</td>";
                                $davka = $row["davky"];
                                $pocet = $row["pocet"];
                                $celkem = $davka * $pocet * 300;
                                $array_celkem_pocet[] = $pocet;
                                $array_celkem_cena[] = $celkem;
                                echo "<td>" . $celkem . " Kč</td>";
                            }
                            echo "</table>";
                            mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>

                <?php
                if ($admin == 1) {
                    include("../inc/connection.php"); //pripojeni k databazi
                    $sql = "select typ from types;";
                    $result = mysqli_query($conn, $sql);
                    while ($row_2 = mysqli_fetch_array($result)) {
                        $prev_month = date("Y-m-d", strtotime("first day of previous month"));
                        $prev_month_end = date("Y-m-d", strtotime("last day of previous month"));
                        $sql = "SELECT people.name, types.typ, COUNT(drinks.ID) as pocet, types.davky, MONTH(date) as mesic, year(date) as rok
                            FROM drinks 
                            INNER JOIN people ON drinks.id_people = people.ID
                            INNER JOIN types ON drinks.id_types = types.ID
                            WHERE date >= '2022-12-01' AND date <= '2022-12-31' AND types.typ = '" . $row_2['typ'] . "'
                            GROUP BY people.name, types.typ, MONTH(date)
                            ORDER BY pocet DESC, people.name
                            limit 1
                            ;";
                        $result_2 = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result_2)) {
                            echo '
                        <div class="mt-5">
                            <div class="alert bg-desert-sand" role="alert">
                                <h4 class="alert-heading text-brandy"><b>' . $row['name'] . '</b> má tento měsíc nakoupit <b>' . $row['typ'] . '</b>!</h4>
                                <p class="text-dark-coffee">Předchozí měsíc vypil ze všech nejvíce <b>(' . $row['pocet'] . ')</b>!</p>
                                <hr>
                                <p class="mb-0 text-dark-coffee">Určitě chce udělat radost svým kolegům a koupit pro tento měsíc další ' . $row['typ'] . '!</p>
                            </div>
                        </div>';
                        }
                    }
                    mysqli_close($conn);
                }
                ?>

                <?php
                include("../inc/connection.php"); //pripojeni k databazi
                $sql = "select typ from types;";
                $result = mysqli_query($conn, $sql);
                while ($row_2 = mysqli_fetch_array($result)) {
                    $prev_month = date("Y-m-d", strtotime("first day of previous month"));
                    $prev_month_end = date("Y-m-d", strtotime("last day of previous month"));
                    $sql = "SELECT people.name, types.typ, COUNT(drinks.ID) as pocet, types.davky, MONTH(date) as mesic, year(date) as rok
                            FROM drinks 
                            INNER JOIN people ON drinks.id_people = people.ID
                            INNER JOIN types ON drinks.id_types = types.ID
                            WHERE date >= '2022-12-01' AND date <= '2022-12-31' AND types.typ = '" . $row_2['typ'] . "'
                            GROUP BY people.name, types.typ, MONTH(date)
                            ORDER BY pocet DESC, people.name
                            limit 1
                            ;";
                    $result_2 = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result_2)) {
                        if ($row['name'] == $name) {
                            echo '
                        <div class="mt-5 mb-5">
                            <div class="alert bg-desert-sand" role="alert">
                                <h4 class="alert-heading text-brandy">Nové upozornění!</h4>
                                <p class="text-dark-coffee">Předchozí měsíc jste vypili nejvíce <b>'.$row['typ'].'</b> <b>('.$row['pocet'].')</b>.</p>
                                <hr>
                                <p class="mb-0 text-dark-coffee">Udělejte svým kolegům radost a kupte pro tento měsíc další!</p>
                            </div>
                        </div>';
                        }
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
        </main>

        <!-- Footer -->
        <?php include("../footer/footer.php") ?>

    </div>

</body>

</html>