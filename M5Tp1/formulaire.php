<?php


require_once '../M5Tp1/connexion.php';

$id_modele='';
$marque='';
$modele='';
$carburant='';

if(isset($_REQUEST['validation'])) {
    $id_modele = htmlspecialchars($_REQUEST['id']);
    $marque = htmlspecialchars($_REQUEST['marque']);
    $modele = htmlspecialchars($_REQUEST['modele']);
    $carburant = htmlspecialchars($_REQUEST['carburant']);

    $query = 'INSERT INTO modeles(id_modele,marque,modele,carburant)VALUE (:id_modele,:marque,:modele,:carburant)';

    $prep = $pdo->prepare($query);

    $prep->bindValue(':id_modele', $id_modele);
    $prep->bindValue(':marque', $marque);
    $prep->bindValue(':modele', $modele);
    $prep->bindValue(':carburant', $carburant);

    $prep->execute();
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

        tr, th {

            border: 1px solid black;
        }
    </style>
</head>
<body>

<form action="formulaire.php" method="post">
    <fieldset>
        <legend>s'abonner</legend>

        <label for="id">Identifiant :</label>
        <input type="id" name="id" id="id" value="<?php echo $id_modele ?>">
        <br>
        <br>

        <label for="marque">Marque :</label>
        <input type="marque" name="marque" id="marque" value="<?php echo $marque ?>">
        <br>
        <br>

        <label for="modele">Modele :</label>
        <input type="modele" name="modele" id="modele" value="<?php echo $modele ?>">
        <br>
        <br>

        <input type="radio" id="essence" name="carburant" value="essence"checked>
        <label for="essence">Essence</label>
        <br>
        <input type="radio" id="diesel" name="carburant" value="diesel">
        <label for="diesel">Diesel</label>
        <br>
        <input type="radio" id="GPL" name="carburant" value="GPL">
        <label for="GPL">GPL</label>
        <br>
        <input type="radio" id="electrique" name="carburant" value="electrique">
        <label for="electrique">Diesel</label>
        <br>
        <br>
        <button type="submit" name="validation">Envoyer</button>

    </fieldset>
</form>
</body>
</html>