<?php
if (isset($_SESSION['mail'])){
    header("Location: /index.php");
    exit();
}else{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            $utilisateur->execute($_POST["pseudo"],$_POST["mail"],$_POST["mdp"]);
        }catch(Exception $e){
            $erreurs = "";
            $erreurs = $e->getMessage();
        }
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscrivez-vous</title>
</head>
<body>
<form action="" method="post">
    <div class="mb-3">
        <label for="InputPseudo">Votre pseudonyme*</label>
        <input type="text" placeholder="Eyce" name="pseudo" id="InputPseudo">

    </div>

    <div class="mb-3">
        <label for="InputMail" >Votre adresse mail*</label>
        <input type="text" name="mail" placeholder="phongcroissant@gmail.com" id="InputMail">
    </div>

    <div class="mb-3">
        <label for="InputPassword">Votre mot de passe*</label>
        <input type="password" name="mdp" id="InputPassword">
    </div>

    <button type="submit" >Créer</button>
    <div id="InputTitle">* Ce champ est obligatoire</div>
    <a href="/index.php?route=connexion">Connectez-vous</a>
    <?=  (!empty($erreurs) && $erreurs != "") ? $erreurs : "" ?>
</form>

</body>
</html>
<?php } ?>
