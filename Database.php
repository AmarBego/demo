<?php

require 'vendor/autoload.php';
use Dotenv\Dotenv;

// Connect to the database, and execute a query
class Database
{
    public $connection;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'] . ';user=' . $_ENV['DB_USERNAME'] . ';password=' . $_ENV['DB_PASSWORD'];
        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}