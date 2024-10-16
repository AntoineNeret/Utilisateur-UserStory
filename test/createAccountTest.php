<?php

use App\Entity\Utilisateur;
use App\UserStory\createAccount;
use Doctrine\ORM\EntityManager;

/**
 * @var EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

require_once __DIR__.'/../vendor/autoload.php';

$utilisateur = new createAccount($entityManager);

//On vérifie qu'un exception est lancée lorsque le pseudo n'est composé que d'un caractère
try {
    $utilisateur->execute("a","oui@oui.fr","0123456789");
}catch (\Exception $e){
    echo $e->getMessage();
}

//On vérifie qu'une exception est lancée lorsque le format du mail n'est pas valide
try {
    $utilisateur->execute("OuiOuiOui","non","0123456789");
}catch (\Exception $e){
    echo $e->getMessage();
}

//On vérifie qu'une exception est lancée lorsqu'un compte existe déjà avec l'adresse mail saisie
try {
    $utilisateur->execute("OuiOuiOui","oui@oui.oui","0123456789");
}catch (\Exception $e){
    echo $e->getMessage();
}

//On vérifie qu'une exception est lancée lorsque le mot de passe est composé de moins de 8 caractères
try {
    $utilisateur->execute("OuiOuiOui","non@non.non","oui");
}catch (\Exception $e){
    echo $e->getMessage();
}

//On vérifie qu'une exception est lancée lorsqu'aucun champ n'est rempli
try {
    $utilisateur->execute("","","");
}catch (\Exception $e){
    echo $e->getMessage();
}

//On vérifie qu'un compte est créé lorsque tout est OK
try {
    $utilisateur->execute("Eventuellement", "hugotlbt@gmail.com", "0123456789");
} catch (Exception $e) {

}