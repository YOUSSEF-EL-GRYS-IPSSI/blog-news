<?php 

$articles = json_decode(file_get_contents('./articles.json'),true);

$dns = 'mysql:host=localhost;dbname=blog_news';
$user = 'root';
$pwd = 'Momo78955';
$pdo = new PDO($dns, $user, $pwd);

$statement = $pdo->prepare('INSERT INTO article (title,image,category,content) VALUE (:title,:image,:category,:content) ');

foreach ($articles as $article) {
    $statement->bindParam(':title',$article['title']);
    $statement->bindParam(':image',$article['image']);
    $statement->bindParam(':category',$article['category']);
    $statement->bindParam(':content',$article['content']);

    $statement->execute();
}


?>