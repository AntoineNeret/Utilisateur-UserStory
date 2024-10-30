<?php

namespace App\UserStory;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManager;


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

    //Cette méthode permettra d'éxecuter la user story
    public function execute(string $pseudo, string $mail, string $mdp): Utilisateur{
        $repository = $this->entityManager->getRepository(\App\Entity\Utilisateur::class);
        //Vérifier que les données sont présentes
        //Si tel n'est pas le cas, on va lancer une exception
        if ($pseudo == null || $mail==null || $mdp==null){
            throw new \Exception("Veuillez renseigner les champs obligatoires");
        }
        //Vérifier si le mail est valide
        //Vérifier l'unicité du mail
        //Si tel n'est pas le cas, on lance une exception
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            throw new \Exception("L'adresse mail saisie n'est pas au bon format");
        }
        if ($repository->findOneBy(['mail'=>"$mail"])){
            throw new \Exception("Un utilisateur utilisant cette adresse mail existe déjà");
        }
        //Vérifier si le pseudo est entre 2 et 50 caractères
        //Si tel n'est pas le cas, on lance une exception
        if (strlen($mdp)<2 || strlen($mdp)>50){
            throw new \Exception("Votre mot de passe n'est pas dans la fourchette de taille réglementaire");
        }
        //Vérifier si le mot de passe est conforme aux normes de sécurité
        //Si tel n'est pas le cas, on lance une exception
        $isMinuscule = false;
        $isMajuscule = false;
        $isNombre = false;
        for($i=1;$i<strlen($mdp);$i++) {
            if (ctype_lower($mdp[$i])){
                $isMinuscule = true;
            }
            if (ctype_upper($mdp[$i])){
                $isMajuscule = true;
            }
            if (is_numeric($mdp[$i])){
                $isNombre = true;
            }
        }
        if (!$isMajuscule || !$isNombre || !$isMinuscule){
            throw new \Exception("Votre mot de passe n'est pas conforme aux normes de sécurité, vérifiez qu'il contienne au moins une lettre minuscule, une lettre majuscule et un nombre");
        }
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
        echo "Un mail de confirmation a été envoyé à l'utilisateur\n";

        return $utilisateur;
    }

}