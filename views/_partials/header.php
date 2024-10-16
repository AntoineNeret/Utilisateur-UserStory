<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 fw-bold" href="/index.php">User Stories</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class='nav-item'>
                    <a class='nav-link' href=<?= __DIR__.'/../Accueil/accueil.php'?>>Accueil</a>
                </li>
                <?php
                if (isset($_SESSION["pseudo"])) {echo"
                    <li class='nav-item'>
                        <a class='nav-link' href=''>Se déconnecter</a>
                    </li>
                ";}else{
                echo "
                <li class='nav-item '>
                    <a class='nav-link' href=".__DIR__.'/../Utilisateur/connexionUtilisateur.php'.">Se connecter</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link'  href=".__DIR__.'/../Utilisateur/creerUtilisateur.php'.">S'inscrire</a>
                </li>";}
                ?>
            </ul>
        </div>
</nav>