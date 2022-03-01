<?php

namespace App\Database;

error_reporting(E_ALL);
ini_set("display_errors", true);

use PDO;

class DatabaseConnection
{
    public $host = 'localhost';
    public $user = 'root';
    public $password = 'root';
    public $dbname = 'repository';
    public $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
    }

     public function getConnection(): PDO
     {
         return $this->connection;
     }
}

