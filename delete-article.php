<?php
require_once __DIR__ . '/database/database.php';
$articleDB = require_once './database/models/ArticleDB.php';

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';

if (!$id) {
    header('Location: /');
} else {
   
   $articleDB->deleteOne($id);

        header('Location: /');
  
}
