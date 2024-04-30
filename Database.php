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

        // to use your own database rename .env.example => .env and fill out accordingly
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $_ENV['DB_HOST'],
            $_ENV['DB_PORT'],
            $_ENV['DB_DBNAME'],
            $_ENV['DB_CHARSET']
        );

        $this->connection = new PDO(
            $dsn,
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}