<!doctype html>
<html lang="cz">

<head>
    <meta charset="utf-8">
    <title>Verification</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body class="background-body mt-5">

    <!-- waiting for email autorization -->
    <div class="container position-relative">
        <div class="row d-flex justify-content-center">
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                <div class="card bg-dark bg-opacity-50 text-white">
                    <div class="card-body">

                        <?php

include("../inc/connection.php");


                        $headMessage = "";
                        $contextMessage = "";

                        if (isset($_GET['user']) and isset($_GET['key'])) {

                            $userName = $_GET["user"];
                            $userPass = $_GET['key'];


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





                            echo ("Hello world.");

                            // SQL USER CHECK 
                            if ($stmt = $conn->prepare("select people.ID from people where name = ?")) {

                                echo ("Hello world. 2");

                                $stmt->bind_param("s", $userName);

                                echo ("Hello world. 4");

                                if ($stmt->execute()) {
                                    $stmt->store_result();

                                    echo "Hello Exec!";

                                    if ($stmt->num_rows() != 1) {
                                        // Issue
                                        $contextMessage = "Invalid key or username. Please check if you copied the link properly";
                                    } else {

                                        // GOTO BELOW
                                        echo "1 OK";
                                    }
                                } else {
                                    echo "<h1>Something went wrong.</h1>";
                                    die();
                                }
                                $stmt->close();
                            } else {
                                echo ("Guhh?");
                            }

                            echo ("GSAIGDHIAUSGDIAUGSD ?");

                            // SQL CODE
                            $sql = "SELECT id FROM awaitingVerification WHERE ver_code = ?";

                            if ($stmt = $conn->prepare($sql)) {
                                $stmt->bind_param("s", trim($userPass));

                                if ($stmt->execute()) {
                                    $stmt->store_result();

                                    if ($stmt->num_rows() != 1) {
                                        // Issue

                                        $contextMessage = "Invalid key or username. Please check if you copied the link properly";
                                    } else {

                                        // GOTO BELOW
                                        echo "2 OK";
                                    }
                                } else {
                                    echo "<h1>Something went wrong.</h1>";
                                    die();
                                }
                                $stmt->close();
                            }

                            // All above returned successfuly and user was authenticated.
                            if ($headMessage == "") {
                                // BELOW
                                $headMessage = "Email verified";
                                $contextMessage = "Thank you for verifying your account. You can now proceed to log in.";
                            }
                        } else {

                            $headMessage = "Awaiting confirmation";
                            $contextMessage = "Account confirmation email has been sent to your address.";
                        }

                        ?>


                        <h5 class="card-title"><?php echo $headMessage ?></h5>
                        <p class="card-text"><?php echo $contextMessage ?></p>

                        <a href="index.php" class="btn btn-secondary">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>