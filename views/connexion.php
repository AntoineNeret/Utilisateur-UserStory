<?php
if (isset($_SESSION['mail'])){
    header("Location: /index.php");
    exit();
}else{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $erreurs = "";
        try {
            $utilisateur->execute($_POST["mail"],$_POST["mdp"]);
        }catch(Exception $e){
            $erreurs = $e->getMessage();
        }
        if ($erreurs==""){
            header("Location: /index.php");
            exit();
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
    <title>Connectez-vous</title>
</head>
<body>
<form action="" method="post">
    <div class="mb-3">
        <label for="InputMail" >Votre adresse mail*</label>
        <input type="text" name="mail" placeholder="phongcroissant@gmail.com" id="InputMail">
    </div>

    <div class="mb-3">
        <label for="InputPassword">Votre mot de passe*</label>
        <input type="password" name="mdp" id="InputPassword">
    </div>

    <button type="submit" >Se Connecter</button>
    <div id="InputTitle">* Ce champ est obligatoire</div>

    <?=  (!empty($erreurs) && $erreurs != "") ? $erreurs : "" ?>
</form>

</body>
</html>
<?php } ?>