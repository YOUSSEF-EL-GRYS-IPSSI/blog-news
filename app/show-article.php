<?php

require_once __DIR__ . '/database/database.php';

$authDB = require_once __DIR__ . '/database/security.php';
$currentUser = $authDB->isloggedin();


$articleDB = require_once './database/models/ArticleDB.php';


$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';

if (!$id) {
    header('Location: /');
} else {
    $article = $articleDB->fetchOne($id);

    if (!$article) {
        header('Location: 404/404.php');
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once __DIR__ . '/includes/head.php' ?>
    <link rel="stylesheet" href="public/css/show-article.css">
    <title>Article</title>
</head>

<body>
    <div class="container">

        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <div class="article-container">
                <a href="/">Retour à la liste des articles</a>
                <div class="article-cover-img" style="background-image:url(<?= $article['image'] ?>"></div>
                <h1 class="article-title"> <?= $article['title'] ?></h1>
                <div class="separateur"></div>
                <p class="article-content"><?= $article['content'] ?></p>
                <div class="article-author">
                    <p><?= $article['firstname'] . ' ' . $article['lastname'] ?></p>
                </div>
                <?php if ($currentUser && $currentUser['id'] === $article['author']) : ?>
                    <div class="action">

                        <a class="btn btn-secondary" id="deleteButton" data-id="<?= $article['id'] ?>" href="/delete-article.php?id=<?= $article['id'] ?>" type="button">Supprimé</a>

                        <a class="btn btn-primary" href="/form-article.php?id=<?= $article['id'] ?>">Editer l'article</a>
                    </div>
                <?php endif; ?>

            </div>

        </div>
        <div id="deleteModal" class="delete-modal">
            <div class="modal-content">
                <div class="delete-message">
                    <img src="./public/img/deleteMessage.svg" alt="">
                </div>
                <h2>Confirmation</h2>
                <p>Êtes-vous sûr de vouloir supprimer votre article?</p>
                <button id="confirmDelete">Confirmer</button>
                <button id="cancelDelete">Annuler</button>
            </div>
        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>







</body>



</html>