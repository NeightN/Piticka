<!DOCTYPE html>
<html lang="cz">

<head>
    <meta charset="utf-8">
    <title>Piticka</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body id="color-button">

    <?php
        if($_POST['alert'];)
        {
            alert($_POST['alert'];)
        }
    ?>


    <div id="color-text">
        <div id="form-radius">
            <!-- Header -->
            <header>
                <!-- Sign up -->
                <div class="offcanvas offcanvas-end bg-dark text-white" id="signup">
                    <div class="offcanvas-header">
                        <h1 class="offcanvas-title">Vytvořit účet</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <div class="offcanvas-body">
                    <!--echo htmlspecialchars($_SERVER["PHP_SELF"]); -->
                        <form action="user/register.php" method="POST" class="was-validated">
                            <!-- Name -->
                            <div class="mb-3 mt-3">
                                <label for="uname" class="form-label">Jméno:</label>
                                <input type="text" class="form-control" id="uname1" placeholder="Jméno" name="uname" required>
                                <div class="valid-feedback">V pořádku.</div>
                                <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                            </div>
                            <!-- E-mail -->
                            <div class="mb-3">
                                <label for="mail" class="form-label">E-mail:</label>
                                <input type="email" class="form-control" id="mail" placeholder="E-mail" name="mail" required>
                                <div class="valid-feedback">V pořádku.</div>
                                <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="pswd" class="form-label">Heslo:</label>
                                <input type="password" class="form-control" id="pwd1" placeholder="Heslo" name="pswd" required>
                                <div class="valid-feedback">V pořádku.</div>
                                <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                            </div>
                            <!-- Check password -->
                            <div class="mb-3">
                                <label for="repeat_pswd" class="form-label">Znovu heslo:</label>
                                <input type="password" class="form-control" id="pwd2" placeholder="Heslo" name="repeat_pswd" required>
                                <div class="valid-feedback">V pořádku.</div>
                                <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                            </div>
                            <!-- Validation -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                                <label class="form-check-label" for="myCheck"><em>Přijímám podmínky Homura</em></label>
                                <div class="valid-feedback">V pořádku.</div>
                                <div class="invalid-feedback">Zaškrtněte toto políčko pro pokračování.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Potvrdit</button>
                        </form>
                    </div>
                </div>


                <!-- Log in -->
                <div class="offcanvas offcanvas-end bg-dark text-white" id="login">
                    <div class="offcanvas-header">
                        <h1 class="offcanvas-title">Přihlásit se</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="user/login.php" method="POST" class="was-validated">
                            <!-- Name -->
                            <div class="mb-3 mt-3">
                                <label for="uname2" class="form-label">Jméno:</label>
                                <input type="text" class="form-control" id="uname2" placeholder="Jméno" name="uname" required>
                                <div class="valid-feedback">V pořádku.</div>
                                <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="pwd2" class="form-label">Heslo:</label>
                                <input type="password" class="form-control" id="pwd2" placeholder="Heslo" name="pswd" required>
                                <div class="valid-feedback">V pořádku.</div>
                                <div class="invalid-feedback">Vyplňte prosím toto pole.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Potvrdit</button>
                        </form>
                    </div>
                </div>

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <div class="container-fluid">
                        <!-- Logo -->
                        <a class="navbar-brand" href="#">Homura</a>

                        <!-- Buttons for "sign up" and "log in" -->
                        <div>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#signup">
                                Sign up
                            </button>
                            <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#login">
                                Log in
                            </button>
                        </div>
                    </div>
                </nav>
                <!-- Header background -->
                <div class="wide">
                    <div class="col-sm-12">
                    </div>
                </div>

            </header>

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
                <div class="container p-5 my-4 bg-dark">

                    <h1>Výpis vypitých pitíček:</h1>
                    <table class="table table-dark table-hover">
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
                <!----------------------------------------------------------------->
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
                    include("inc/connection.php"); //pripojeni k databazi

                    $sql = "select ID, name from people"; //select
                    $result = $conn->query($sql); //fetch data from db to result

                    $person = "<select class='dropdownForPeople' name='users' onchange='showUser(this.value)'>"; //zacatek dropdownl listu (select-option)
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
                <br>
                <div class='container p-5 bg-dark'>
                    <h1>Výpis dle měsíců:</h1>
                    <?php echo $person; ?>
                    <div id="txtHint"><b>Person info will be listed here.</b></div>
                </div>
                <!----------------------------------------------------------------->
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
                $conn->close(); //uzavreni pripojeni    
                ?>

                <div class="container p-5 my-5 bg-dark">
                    <form>
                        <!-- Přehledný výpis toho, co který člověk vypil.  -->
                        <h1>Výpis kolik za nápoj zaplatí:</h1>
                        <?php echo $person; ?>
                        <div id="txtHint2"><b>Person info will be listed here.</b></div>
                    </form>
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