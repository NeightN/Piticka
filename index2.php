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

<?php
include 'inc/connection.php';
session_start();
if (isset($_SESSION['uname']) != null) {
    $name = $_SESSION['uname'];
}
if (isset($_SESSION['admin']) != null) {
    $admin = $_SESSION['admin'];
}
?>

<body id="color-button">

    <div id="color-text">
        <div>
            <!-- Header -->
            <?php include("headers/header_logged.php"); ?>

            <!-- Navigation -->
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Buttons with icons and search bar -->
                    <div class="collapse navbar-collapse" id="mynavbar">

                        <ul class="navbar-nav me-auto" id="navIcons">
                            <!-- Button for "Home"/"index.php" -->
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php" title="Domů">
                                    Domů
                                </a>
                            </li>
                        </ul>
                        <!-- Search bar -->
                        <div id="search-icon">
                            <form class="d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search">
                                <button class="btn btn-primary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </nav>

            <!-- Main -->
            <main class="main-height background-main">
                <!-- Přehledný výpis toho, co který člověk vypil.  -->
                <?php
                include("inc/connection.php"); //pripojeni k databazi
                $sql = "select people.name, types.typ, count(drinks.ID) as pocet
                from drinks inner join people on drinks.id_people = people.ID 
                left join types on drinks.id_types = types.ID
                group by people.name, types.typ;";
                $result = $conn->query($sql); //fetch data from db to result
                ?>

                <div class="container my-4">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Výpis vypitých pitíček:
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <table class="accordion-body table table-hover m-0">
                                    <tr>
                                        <th>Jméno osoby</th>
                                        <th>Typ pitíčka</th>
                                        <th>Počet pitíček</th>
                                    </tr>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row["name"]; ?></td>
                                                <td><?php echo $row["typ"]; ?></td>
                                                <td><?php echo $row["pocet"]; ?></td>
                                            </tr>
                                    <?php
                                        } //konec while
                                    }  //konec podminky if
                                    else {
                                        echo "0 results";
                                    }
                                    ?>
                                </table>
                                <?php $conn->close(); ?>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Výpis dle měsíců:
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <script>
                                    function showUser(str) {
                                        if (str == "") {
                                            document.getElementById("txtHint").innerHTML = "";
                                            return;
                                        }
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("txtHint").innerHTML = this.responseText;
                                            }
                                        }
                                        xmlhttp.open("GET", "getDrinksM.php?q=" + str, true);
                                        xmlhttp.send();
                                    }
                                </script>
                                <form>
                                    <?php
                                    include("inc/connection.php");

                                    $sql = "select ID, name from people"; //select
                                    $result = $conn->query($sql); //fetch data from db to result

                                    $person = "<select class='' name='users' onchange='showUser(this.value)'>"; //zacatek dropdownl listu (select-option)
                                    if ($result->num_rows > 0) //kontrola zda jsme neco nacetli
                                    {
                                        while ($row = $result->fetch_assoc()) {
                                            $person .= "<option value='" . $row["ID"] . "'>" . $row["name"] . "</option>";
                                        }
                                    } else {
                                        echo "0 result";
                                    }
                                    $person .= "</select>";
                                    $conn->close(); //uzavreni pripojeni    
                                    ?>
                                </form>

                                <?php echo $person; ?>
                                <div id="txtHint"></div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Výpis kolik za nápoj zaplatí:
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <script>
                                    function showTypes(str) {
                                        if (str == "") {
                                            document.getElementById("txtHint2").innerHTML = "";
                                            return;
                                        }
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("txtHint2").innerHTML = this.responseText;
                                            }
                                        }
                                        xmlhttp.open("GET", "getDrinksP.php?q=" + str, true);
                                        xmlhttp.send();
                                    }
                                </script>

                                <?php
                                include("inc/connection.php"); //pripojeni k databazi

                                $sql = "select ID, name from people"; //select
                                $result = $conn->query($sql); //fetch data from db to result

                                $person = "<select class='dropdownForPeople' name='users' onchange='showTypes(this.value)'>"; //zacatek dropdownl listu (select-option)
                                if ($result->num_rows > 0) //kontrola zda jsme neco nacetli
                                {
                                    while ($row = $result->fetch_assoc()) {
                                        $person .= "<option value='" . $row["ID"] . "'>" . $row["name"] . "</option>";
                                    }
                                } else {
                                    echo "0 result";
                                }
                                $person .= "</select>";
                                $conn->close();
                                ?>
                                <form>
                                    <!-- Přehledný výpis toho, co který člověk vypil.  -->
                                    <?php echo $person; ?>
                                    <div id="txtHint2"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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