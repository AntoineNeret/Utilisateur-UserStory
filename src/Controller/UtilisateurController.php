<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\UserStory\connectAccount;
use App\UserStory\createAccount;
use App\UserStory\deconnectAccount;
use Doctrine\ORM\EntityManager;

class UtilisateurController
{
    private EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addUtilisateur(){
        $utilisateur = new createAccount($this->entityManager);
        require_once __DIR__.'/../../views/_partials/header.php';
        require_once __DIR__.'/../../views/inscription.php';
        require_once __DIR__.'/../../views/_partials/footer.php';

    }

    public function connectUtilisateur()
    {
        $utilisateur = new connectAccount($this->entityManager);
        require_once __DIR__.'/../../views/_partials/header.php';
        require_once __DIR__.'/../../views/connexion.php';
        require_once __DIR__.'/../../views/_partials/footer.php';
    }

    public function deconnectUtilisateur()
    {
        $utilisateur = new deconnectAccount();
        $utilisateur->execute();
    }

}