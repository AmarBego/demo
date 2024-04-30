<?php
require 'functions.php';
require 'router.php';

// Database connection.
$dsn = 'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_NAME') . ';charset=utf8mb4';
$pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'));

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll();

dd($posts);