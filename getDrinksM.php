<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    $q = intval($_GET['q']);

    include("inc/connection.php"); //pripojeni k databazi

    $sql = "select people.name, types.typ, count(drinks.ID) as pocet, month(date) as mesic
    from drinks inner join people on drinks.id_people = people.ID 
    inner join types on drinks.id_types = types.ID
    where people.ID = '" . $q . "'
    group by people.name, types.typ, month(date);";

    $result = mysqli_query($conn, $sql);
    echo "<table class='table table-dark table-hover'>
            <tr>
                <th>Typ</th>
                <th>Počet</th>
                <th>Měsíc</th>
            </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['typ'] . "</td>";
        echo "<td>" . $row['pocet'] . "</td>";
        echo "<td>" . $row['mesic'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
    ?>
</body>

</html>