<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur ce super site !</h1>
    <div><?=  (!empty($_SESSION["utilisateur"])) ? "Vous êtes connecté en tant que ".$_SESSION["utilisateur"]["pseudo"] : "" ?> </div>
</body>
</html>