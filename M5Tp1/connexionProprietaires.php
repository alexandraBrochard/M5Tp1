<?php
// Démarrer la session
session_start();
require_once '../M5Tp1/connexion.php';

$id='';
$nom = '';
$prenom = '';
$adresse = '';
$ville = '';
$cp = '';

if(isset($_REQUEST['connexion'])) {
    $id = htmlspecialchars($_REQUEST['id']);
    $nom = htmlspecialchars($_REQUEST['nom']);


    $query = 'SELECT nom,prenom,adresse,ville,codepostal  FROM proprietaires WHERE id_pers=' . $id;

    $verif = $pdo->query($query)->fetch();
    var_dump($verif);
    if($verif['nom']!=$nom):
        $erreur=true;

    else:// Stocker le nom d'utilisateur dans la session
        $_SESSION['id']=$id;
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$verif['prenom'];
        $_SESSION['adresse']=$verif['adresse'];
        $_SESSION['ville']=$verif['ville'];
        $_SESSION['cp']=$verif['codepostal'];


        (header('Location: modificationProprietaires.php') );
    endif;


    $prep = $pdo->prepare($query);


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

<form action="connexionproprietaires.php" method="post">
    <fieldset>
        <legend>Acceder à vos informations</legend>

        <label for="id">Identifiant :</label>
        <input type="number" name="id" id="id" value="<?php echo $id ?>" >
        <br>
        <br>

        <label for="nom">Nom de Famille :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom ?>" required>
        <br>

        <br>
        <button type="submit" name="connexion" >Connexion</button>

    </fieldset>
    <br>
    <br>
    <br>
    <br>


    <?=isset($erreur)?'<script>alert("pas de correspondance entre l\'identifiant et le nom")</script>':''?>




</form>
</body>
</html>
