<?php

namespace App\UserStory;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManager;

class connectAccount
{
    protected EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        //L'entityManager est injecté par dépendance
        $this->entityManager = $entityManager;
    }

    public function execute(string $mail,string $mdp)
    {
        session_start();
        $repository = $this->entityManager->getRepository(\App\Entity\Utilisateur::class);
        if ($mail==null || $mdp==null){
            throw new \Exception("Veuillez renseigner les champs obligatoires");
        }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            throw new \Exception("L'adresse mail saisie n'est pas au bon format");
        }
        if ($repository->findOneBy(['mail'=>"$mail"])==null || !password_verify($mdp,$repository->findOneBy(['mail'=>"$mail"])->getMotDePasse())){
            throw new \Exception("L'identifiant ou le mot de passe saisi est incorrect");
        }
        $_SESSION["utilisateur"]=[
        "mail" => $mail,
        "pseudo" => $repository->findOneBy(["mail"=>$mail])->getPseudo()
        ];
    }
}