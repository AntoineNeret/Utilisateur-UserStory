<?php

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManager;

require_once __DIR__.'/../vendor/autoload.php';

$utilisateur = new Utilisateur();
$utilisateur->setMail("test@test.com");
$utilisateur->setPseudo("test");
$utilisateur->