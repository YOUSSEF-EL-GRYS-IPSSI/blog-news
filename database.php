<?php


$dns = 'mysql:host=localhost;dbname=blog_news';
$user = getenv('DB_USER');
$pwd = getenv('DB_PWD');

// $user = 'root';
// $pwd = 'Momo78955';
// echo "User: " . getenv('DB_USER') . "<br>";
// echo "Pwd: " . getenv('DB_PWD') . "<br>";



try {
    $pdo = new PDO($dns, $user, $pwd,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
   echo 'error';
}

return $pdo;
?>