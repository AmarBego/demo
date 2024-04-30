<?php
require 'functions.php';
require 'vendor/autoload.php';
//require 'router.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection.
$dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'] . ';user=' . $_ENV['DB_USERNAME'] . ';password=' . $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn);

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll();

dd($posts);