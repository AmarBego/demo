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

        // to use your own server make a .env file and use these values
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $_ENV['DB_HOST'],
            $_ENV['DB_PORT'],
            $_ENV['DB_DBNAME'],
            $_ENV['DB_CHARSET']
        );

        $this->connection = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PSWD'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}