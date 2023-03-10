<?php

require_once '../M5Tp1/connexion.php';


$query = 'SELECT * FROM modeles ORDER BY marque ASC';

$tab = $pdo->query($query)->fetchAll();

foreach ($tab as $item) {
    $identifiant = $item['id_modele'];
    $marque = $item['marque'];
    $modele = $item['modele'];
    $carburant = $item['carburant'];

    //echo 'Voiture : identifiant   :' . $identifiant . '   marque   :  ' . $marque . '   modele   ' . $modele . ' carburant ' . $carburant . '<br>';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voitures</title>
    <style>
        caption {
            color: chocolate;
            font-size: 50px;
        }

        tr, th,td {

            border: 1px solid black;
            width: 20em;
        }
    </style>
</head>
<body>
<table>
    <caption>Les voitures</caption>
    <tr>
        <th>Identifiant</th>
        <th>Marque</th>
        <th>Modele</th>
        <th>Carburant</th>
    </tr>
    <?php
    foreach ($tab

    as $item) {
    ?>
    <tr>
        <td>
            <?php
            echo $item['id_modele'];
            ?>
        </td>
        <td>
            <?php
            echo $item['modele'];
            ?>
        </td>
        <td>
            <?php
            echo $item['marque'];
            ?>
        </td>
        <td>
            <?php
            echo $item['carburant'];
            }
            ?>
        </td>
    </tr>

</table>

</form>
</body>
</html>