<?php

require __DIR__ .'/database/database.php';
require __DIR__ . '/database/security.php';

$currentUser = isloggedin();
$articleDB = require_once __DIR__ . '/database/models/ArticleDB.php';
$articles = $articleDB->fetchAll();
$categories = [];


$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
$selectedCat = $_GET['cat'] ?? '';



if (count($articles)) {

    $cattmp = array_map(fn ($a) => $a['category'], $articles);
    // echo "<pre>";
    // print_r($cattmp);
    // echo "</pre>";
    $categories = array_reduce($cattmp, function ($acc, $cat) {


        if (isset($acc[$cat])) {
            $acc[$cat]++;
        } else {
            $acc[$cat] = 1;
        }
        return $acc;
    }, []);
    // echo "<pre>";
    // print_r($categories);
    // echo "</pre>";

    $articlePerCategories = array_reduce($articles, function ($acc, $articles) {

        if (isset($acc[$articles['category']])) {
            $acc[$articles['category']] = [...$acc[$articles['category']], $articles];
        } else {
            $acc[$articles['category']] = [$articles];
        }
        return $acc;
    }, []);

    // echo "<pre>";
    // print_r($articlePerCategories);
    // echo "</pre>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'includes/head.php' ?>
    <link rel="stylesheet" href="public/css/index.css">
    <title>blog-futur</title>
</head>

<body>
    <div class="container">
        <?php require_once 'includes/header.php' ?>
        <div class="content">
            <div class="newsfeed-container">
                <div class="category-container">
                    <ul class="category-container">
                        <li class=<?= $selectedCat ? '' : 'cat-active' ?>>
                            <a href="/">Tous les articles <span class="small">(<?= count($articles) ?>)</span></a>
                        </li>
                        <?php foreach ($categories as $catName => $catNum) : ?>
                            <li class=<?= $selectedCat ===  $catName ? 'cat-active' : '' ?>>
                                <a href="/?cat=<?= $catName ?>"> <?= $catName ?><span class="small">(<?= $catNum ?>)</span> </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="newsfeed-content">
                    <?php if (!$selectedCat) : ?>
                        <?php foreach ($categories as $cat => $num) : ?>
                            <h2><?= $cat ?></h2>
                            <div class="articles-container">
                                <?php foreach ($articlePerCategories[$cat] as $a) : ?>

                                    <a href="/show-article.php?id=<?= $a['id'] ?>" class="article block">
                                        <div class="overflow">
                                            <div class="img-container" style="background-image:url(<?= $a['image'] ?>"></div>
                                        </div>
                                        <h3><?= $a['title'] ?></h3>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h2><?= $selectedCat ?></h2>
                        <div class="articles-container">
                            <?php foreach ($articlePerCategories[$selectedCat] as $a) : ?>
                                <a href="/show-article.php?id=<?= $a['id'] ?>" class="article block">
                                    <div class="overflow">
                                        <div class="img-container" style="background-image:url(<?= $a['image'] ?>"></div>
                                    </div>
                                    <h3><?= $a['title'] ?></h3>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php require_once 'includes/footer.php' ?>
    </div>

</body>

</html>