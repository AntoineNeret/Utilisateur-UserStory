<?php

namespace App\Controller;

class AccueilController
{
    public function accueil(){
        require_once __DIR__.'/../../views/_partials/header.php';
        require_once __DIR__.'/../../views/accueil.php';
        require_once __DIR__.'/../../views/_partials/footer.php';
    }
}