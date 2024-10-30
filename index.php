<?php
require_once __DIR__ .'/vendor/autoload.php';
$entityManager = require_once __DIR__.'/config/bootstrap.php';

$route=$_GET['route'] ?? 'accueil';
switch ($route){
    case "accueil":
        $accueilController = new \App\Controller\AccueilController();
        $accueilController->accueil();
        break;
    case "inscription":
        if (!isset($_SESSION["utilisateur"])) {
            $utilisateurController = new \App\Controller\UtilisateurController($entityManager);
            $utilisateurController->addUtilisateur();
            break;
        }
    case "connexion":
        if (!isset($_SESSION["utilisateur"])){
            $utilisateurController = new \App\Controller\UtilisateurController($entityManager);
            $utilisateurController->connectUtilisateur();
            break;
        }
    case "deconnexion":
            $utilisateurController= new \App\Controller\UtilisateurController($entityManager);
            $utilisateurController->deconnectUtilisateur();
            break;
    default:
        echo "Page non trouvée";
        break;
}