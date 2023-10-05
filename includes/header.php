

<header>
    <a href="/" class="logo"><img src="../public/img/logo.svg" alt=""></a>
    <ul class="header-menu">
        <li class = <?= $_SERVER['REQUEST_URI'] === '/add-article.php' ? 'active' : '' ?>>
            <a href="/add-article.php">Ecrire un article</a>
        </li>

    </ul>
</header>