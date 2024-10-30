<?php

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManager;

require_once __DIR__.'/../vendor/autoload.php';
$entityManager = require_once __DIR__.'/../config/bootstrap.php';

$utilisateurDonneesPasPresentes = new \App\UserStory\createAccount($entityManager);
try {
    $utilisateurDonneesPasPresentes->execute("", "test@test.test", "CqriT1");
}catch (Exception $e){
    echo $e->getMessage()."\n\n";
}


$utilisateurFormatMailInvalide = new \App\UserStory\createAccount($entityManager);
try {
    $utilisateurFormatMailInvalide->execute("test", "test","CqriT2");
}catch (Exception $e){
    echo $e->getMessage()."\n\n";
}

$utilisateurValide = new \App\UserStory\createAccount($entityManager);
try {
    $utilisateurValide->execute("test", "test@test.test","CqriT2");
}catch (Exception $e){
    echo $e->getMessage()."\n\n";
}

$utilisateurMailExistant = new \App\UserStory\createAccount($entityManager);
try {
    $utilisateurMailExistant->execute("test", "test@test.test","CqriT2");
}catch (Exception $e){
    echo $e->getMessage()."\n\n";
}

$utilisateurMotDePassePasReglementaire = new \App\UserStory\createAccount($entityManager);
try {
    $utilisateurMotDePassePasReglementaire->execute("test", "test@test.com","AaaAAAAAAAAAAAAAAAAA1111111111111111111111111111111111111");
}catch (Exception $e){
    echo $e->getMessage()."\n\n";
}

$utilisateurMotDePassePasSecurise = new \App\UserStory\createAccount($entityManager);
try {
    $utilisateurMotDePassePasSecurise->execute("test", "test@test.com","aA");
}catch (Exception $e){
    echo $e->getMessage()."\n\n";
}