<?php

namespace App\UserStory;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManager;
use http\Client\Curl\User;

class createAccount
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

    //Cette méthode permettre d'éxecuter la user story
    public function execute(string $pseudo, string $mail, string $mdp): Utilisateur{
        //Vérifier que les données sont présentes
        //Si tel n'est pas le cas, on va lancer une exception
//        if ($pseudo == null && $mail == null && $mdp == null){

//        }
        //Vérifier si le mail est valide
        //Vérifier l'unicité du mail
        //Si tel n'est pas le cas, on lance une exception

        //Vérifier si le pseudo est entre 2 et 50 caractères
        //Si tel n'est pas le cas, on lance une exception

        //Vérifier si le mot de passe est conforme aux normes de sécurité
        //Si tel n'est pas le cas, on lance une exception

        //Insérer dans la base de données
        //1) Hasher le mot de passe
        $mdp = password_hash($mdp,PASSWORD_ARGON2ID);
        //2)Créer une instance de la classe Utilisateur avec le mail, le pseudo et le mot de passe hashé
        $utilisateur= new Utilisateur(); //setters
        $utilisateur->setMail($mail);
        $utilisateur->setPseudo($pseudo);
        $utilisateur->setMotDePasse($mdp);
        //3)Je persist l'instance en utilisant l'entityManager
        $this->entityManager->persist($utilisateur);
        //4)Flush
        $this->entityManager->flush();

        //5)Envoie du mail de confirmation
        echo "Un mail de confirmation a été envoyé à l'utilisateur";

        return $utilisateur;
    }

}