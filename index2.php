<!DOCTYPE html>
<html lang="cz">

<head>
    <meta charset="utf-8">
    <title>Piticka</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

<body id="color-text" class="background-gradient">
    <div id="wrapper">



        <!-- Header -->
        <?php include("headers/header_logged.php"); ?>

        <!-- Main -->
        <main class="main-height background-main">
            <div class="container mt-2">
                <?php include("headers/notification.php") ?>
                <!-- CONTENT TADI!!!!!  -->

            </div>
        </main>


        <div class="content">

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
                    <div class="accordion-item border-accordin-own">
                            <button class="accordion-button collapsed bg-coffee text-desert-sand" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Výpis vypitých pitíček:
                            </button>
                        <div id="flush-collapseOne" class="accordion-collapse collapse bg-pale-taupe" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
                    <div class="accordion-item border-accordin-own">
                            <button class="accordion-button collapsed bg-coffee text-desert-sand" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Výpis dle měsíců:
                            </button>

                        <div id="flush-collapseTwo" class="accordion-collapse collapse bg-pale-taupe" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
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

                                $person = "<select class='form-select' aria-label='Default select example' name='users' onchange='showUser(this.value)'>"; //zacatek dropdownl listu (select-option)
                                $person .= "<option selected>Zvolte uživatele:</option>";
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
                            <button class="accordion-button collapsed bg-coffee text-desert-sand" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Výpis kolik za nápoj zaplatí:
                            </button>

                        <div id="flush-collapseThree" class="accordion-collapse collapse bg-pale-taupe" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
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

                            $person = "<select class='form-select' aria-label='Default select example' name='users' onchange='showTypes(this.value)'>"; //zacatek dropdownl listu (select-option)
                            $person .= "<option selected>Zvolte uživatele:</option>";
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

                <!-- inputs  -->

                <form class="mt-5" action="" method="POST">
                    <div class="input-group mb-3">
                        <input placeholder="Napište, kolik jste toho vypil a čeho..." type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div>
                            <script>
                                function showUser(str) {
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
                                    xmlhttp.open("GET", "getDrinksM.php?q=" + str, true);
                                    xmlhttp.send();
                                }
                            </script>
                            <form>
                                <?php
                                include("inc/connection.php");

                                $sql = "select ID, typ from types"; //select
                                $result = $conn->query($sql); //fetch data from db to result

                                $person = "<select type='button' class='form-select btn bg-coffee dropdown-toggle text-white' aria-label='Default select example' name='types' onchange='showUser(this.value)'>"; //zacatek dropdownl listu (select-option)
                                $person .= "<option selected>Zvolte uživatele:</option>";
                                if ($result->num_rows > 0) //kontrola zda jsme neco nacetli
                                {

                                    while ($row = $result->fetch_assoc()) {
                                        $person .= "<option value='" . $row["ID"] . "'>" . $row["typ"] . "</option>";
                                    }
                                } else {
                                    echo "0 result";
                                }
                                $person .= "</select>";
                                $conn->close(); //uzavreni pripojeni    
                                ?>
                            </form>

                            <?php echo $person; ?>
                            <div id="txtHint2"></div>
                        </div>
                        <button class="btn bg-dark-coffee text-white" type="button" id="button-addon1">Potvrdit</button>
                    </div>
                </form>





            </div>
        </div>

                    <!-- Footer -->
                    <?php include("footer/footer.php") ?>

    </div>

</body>

</html>