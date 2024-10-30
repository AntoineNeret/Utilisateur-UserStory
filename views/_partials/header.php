<nav>
    <?php
    session_start();
    if (isset($_SESSION["utilisateur"])){
        echo"</li>
            <li class='nav-item'>
            <a class='nav-link' href='/index.php?route=deconnexion'>Se déconnecter</a>
        </li>";
    }else{
        echo"
            <li class='nav-item '>
                <a class='nav-link' href='/index.php?route=connexion'>Se connecter</a>
            </li>
             <li class='nav-item'>
                <a class='nav-link'  href='/index.php?route=inscription'>S'inscrire</a>
             </li>";
    }
    ?>
</nav>