<?php

require_once __DIR__ . '/database/database.php';
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
    <?php require_once 'includes/head.php' ?>
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
                <div class="action">
                    <!-- Mettez l'URL de suppression directement dans l'attribut "href" du lien -->
                    <a class="btn btn-secondary" id="deleteButton" data-id="<?= $article['id'] ?>" href="/delete-article.php?id=<?= $article['id'] ?>" type="button">Supprimé</a>

                    <a class="btn btn-primary" href="/form-article.php?id=<?= $article['id'] ?>">Editer l'article</a>
                </div>
            </div>

        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>


    <div id="deleteModal" class="delete-modal">
        <div class="modal-content">
            <h2>Confirmation</h2>
            <p>Êtes-vous sûr de vouloir supprimer votre article?</p>
            <button id="confirmDelete">Confirmer</button>
            <button id="cancelDelete">Annuler</button>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');
            const deleteModal = document.getElementById('deleteModal');
            const confirmDelete = document.getElementById('confirmDelete');
            const cancelDelete = document.getElementById('cancelDelete');

            deleteButton.addEventListener('click', function(event) {
                event.preventDefault();
                deleteModal.style.display = 'block';
            });

            confirmDelete.addEventListener('click', function() {
                const articleId = deleteButton.getAttribute('data-id');
                window.location.href = '/delete-article.php?id=' + articleId;
            });

            cancelDelete.addEventListener('click', function() {
                deleteModal.style.display = 'none';
            });
        });
    </script>
</body>



</html>