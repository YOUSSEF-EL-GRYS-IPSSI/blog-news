<?php
$currentUser = $currentUser ?? false;

?>


<header>
    <a href="/" class="logo"><img src="../public/img/logo.svg" alt=""></a>

    <ul class="header-menu">
        <?php if ($currentUser) : ?>
            <li class=<?= $_SERVER['REQUEST_URI'] === '/form-article.php' ? 'active' : '' ?>>
                <a href="/form-article.php">Ecrire un article</a>
            </li>

            <li>
                <a href="/auth-logout.php">Déconnexion</a>
            </li>

            <li class=<?= $_SERVER['REQUEST_URI'] === '/profile.php' ? 'active' : '' ?>>
                <a href="profile.php">Profil</a>
            </li>
        <?php else : ?>
            <li class=<?= $_SERVER['REQUEST_URI'] === '/auth-register.php' ? 'active' : '' ?>>
                <a href="/auth-register.php">Inscription</a>
            </li>

            <li class=<?= $_SERVER['REQUEST_URI'] === '/auth-login.php' ? 'active' : '' ?>>
                <a href="/auth-login.php">Connexion</a>
            </li>
        <?php endif; ?>







    </ul>
</header>