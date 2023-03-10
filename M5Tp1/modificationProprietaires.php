<?php
session_start();

require_once '../M5Tp1/connexion.php';

$id=$_SESSION['id'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$adresse = $_SESSION['adresse'];
$cp = $_SESSION['cp'];
$ville = $_SESSION['ville'];


if(isset($_REQUEST['modification'])) {
    $nom = htmlspecialchars($_REQUEST['nom']);
    $prenom = htmlspecialchars($_REQUEST['prenom']);
    $adresse = htmlspecialchars($_REQUEST['adresse']);
    $cp = htmlspecialchars($_REQUEST['cp']);
    $ville = htmlspecialchars($_REQUEST['ville']);

    $query = 'UPDATE  proprietaires  SET adresse=:adresse,ville=:ville,codepostal=:cp where id_pers=:id';

    $prep = $pdo->prepare($query);

    $prep->bindValue(':adresse', $adresse);
    $prep->bindValue(':ville', $ville);
    $prep->bindValue(':cp', $cp);
    $prep->bindValue(':id', $id);


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

</head>
<body>

<form action="modificationProprietaires.php" method="post">
    <fieldset>
        <legend>Modifications de vos informations</legend>

        <label for="nom">Nom de Famille :</label>
        <input type="text" name="nom" id="nom" value="<?=$nom ?>" >
        <br>
        <br>

        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>" >
        <br>
        <br>

        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse" value="<?= $adresse ?>" >
        <br>
        <br>

        <label for="cp">Code Postal :</label>
        <input type="text" name="cp" id="cp" value="<?= $cp ?>" >
        <br>
        <br>

        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" value="<?= $ville ?>" >
        <br>
        <br>

        <button type="submit" name="modification" >Modification</button>

    </fieldset>
</form>
</body>
</html>
