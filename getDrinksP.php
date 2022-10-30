<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    $q = intval($_GET['q']);

    include("inc/connection.php"); //pripojeni k databazi

    $sql = "select people.name, types.typ, count(drinks.ID) as pocet, types.davky
    from drinks inner join people on drinks.id_people = people.ID 
    left join types on drinks.id_types = types.ID
    where people.ID = '" . $q . "'
    group by people.name, types.typ;";

    $result = mysqli_query($conn, $sql);
    echo "<table class='table table-dark table-hover'>
            <tr>
                <th>Typ pitíčka</th>
                <th>Počet pitíček</th>
                <th>Dávka</th>
                <th>Celkem k úhradě</th>
            </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['typ'] . "</td>";
        echo "<td>" . $row['pocet'] . "</td>";
        echo "<td>" . $row['davky'] . "</td>";
        $davka = $row["davky"];
        $pocet = $row["pocet"];
        $celkem = $davka * $pocet * 300;
        echo "<td>" . $celkem . " Kč</td>";
    }
    echo "</table>";
    mysqli_close($conn);
    ?>

</body>

</html>