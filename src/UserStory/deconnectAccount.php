<?php

namespace App\UserStory;

class deconnectAccount
{
    public function execute()
    {
        session_start();
        if (empty($_SESSION)){
            header("Location: /views/connexion.php");
        }else{
            $_SESSION=[];
            header("Location: /index.php");
            exit;
        }
    }
}