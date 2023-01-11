<?php

/* call internally only !!! */


include("../inc/connection.php");

// Get all users from the database
$query = "SELECT * FROM people";
$stmt = $conn->prepare($query);
$stmt->execute();
$resultUsr = $stmt->get_result();

echo "<h2>cs</h2>"

// Loop through each user and send an email
while ($user = $resultUsr->fetch_assoc()) {

    

    /* Get drinkn for user */
    $sql = "select types.typ, count(drinks.ID) as pocet, types.davky
    from drinks inner join people on drinks.id_people = people.ID 
    left join types on drinks.id_types = types.ID
    where people.ID = '" . $user['ID'] . "'
    group by people.name, types.typ;";

    $result = mysqli_query($conn, $sql);
    echo "<table class='accordion-body m-0 table table-hover'>
            <tr>
                <th>Typ pitíčka</th>
                <th>Počet pitíček</th>
                <th>Dávka</th>
                <th>Celkem k úhradě</th>
            </tr>";

    $array_celkem_cena = array();
    $array_celkem_pocet = array();
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['typ'] . "</td>";
        echo "<td>" . $row['pocet'] . "</td>";
        echo "<td>" . $row['davky'] . "</td>";
        $davka = $row["davky"];
        $pocet = $row["pocet"];
        $celkem = $davka * $pocet * 300;
        $array_celkem_pocet[] = $pocet;
        $array_celkem_cena[] = $celkem;
        echo "<td>" . $celkem . " Kč</td>";
    }
    echo "<tr><td>Vše</td><td>". array_sum($array_celkem_pocet) ."</td><td></td><td>". array_sum($array_celkem_cena) ." Kč</td></tr>";
    echo "</table>";




    $to = $user['email'];
    $subject = 'Piticker - Týdenní Přehled';
    $message = '
    
    ';
    $headers = 'From: piticker@scp-isolation.com' . "\r\n" .
               'Reply-To: piticker@scp-isolation.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}

// Close the database connection
$conn->close();
?>