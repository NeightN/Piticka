<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    $q = intval($_GET['q']);

    include("inc/connection.php"); //pripojeni k databazi

    $sql = "select people.name, types.typ, count(drinks.ID) as pocet, month(date) as mesic, year(date) as rok
    from drinks inner join people on drinks.id_people = people.ID 
    inner join types on drinks.id_types = types.ID
    where people.ID = '" . $q . "'
    group by people.name, types.typ, mesic, rok;";

    $result = mysqli_query($conn, $sql);
    echo "<table class='accordion-body m-0 table table-hover'>
            <tr>
                <th>Typ</th>
                <th>Počet</th>
                <th>Měsíc</th>
                <th>Rok</th>
            </tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['typ'] . "</td>";
        echo "<td>" . $row['pocet'] . "</td>";
        echo "<td>" . $row['mesic'] . "</td>";
        echo "<td>" . $row['rok'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
    ?>
</body>

</html>