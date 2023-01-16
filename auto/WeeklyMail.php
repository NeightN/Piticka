<?php

/* call internally only !!! */


include("../inc/connection.php");

// Get all users from the database
$query = "SELECT * FROM people";
$stmt = $conn->prepare($query);
$stmt->execute();
$resultUsr = $stmt->get_result();

$conn->close();

// Loop through each user and send an email
while ($user = $resultUsr->fetch_assoc()) {

    echo "<h2>".$user['name']."</h2>";

    /* Get drinkn for user */
    $sql = "select types.typ, count(drinks.ID) as pocet, types.davky
    from drinks inner join people on drinks.id_people = people.ID 
    left join types on drinks.id_types = types.ID
    where people.ID = '" . $user['ID'] . "'
    group by types.typ, types.davky;";

    
    include("../inc/connection.php");

    
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo mysqli_error($conn);
    }

    $email_content = "";

    $email_content.= "<table class='accordion-body m-0 table table-hover'>
            <tr>
                <th>Typ</th>
                <th>Počet</th>
                <th>Objem (g)</th>
                <th>K úhradě</th>
            </tr>";

    $array_celkem_cena = array();
    $array_celkem_pocet = array();
    while ($row = mysqli_fetch_array($result)) {
        $email_content.= "<tr>";
        $email_content.= "<td>" . $row['typ'] . "</td>";
        $email_content.= "<td>" . $row['pocet'] . "</td>";
        $email_content.= "<td>" . $row['davky'] . "</td>";
        $davka = $row["davky"];
        $pocet = $row["pocet"];
        $celkem = $davka * $pocet * 300;
        $array_celkem_pocet[] = $pocet;
        $array_celkem_cena[] = $celkem;
        $email_content.= "<td>" . $celkem . " Kč</td>";
    }


    $email_content.= "<tr><td>Vše</td><td>". array_sum($array_celkem_pocet) ."</td><td></td><td>". array_sum($array_celkem_cena) ." Kč</td></tr>";
    $email_content.= "</table>";

    $to = $user['email'];
    echo $user['email'];
    $subject = 'Piticker - Týdenní Přehled';
    $message = $email_content;

    $headers = 'From: piticker@scp-isolation.com' . "\r\n" .
               'Reply-To: piticker@scp-isolation.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    
    
               echo mail($to, $subject, $message, $headers);
    
               echo 'Content:';
               echo $email_content;
               

    }

// Close the database connection


?>