<?php

namespace Database;

use PDO;
use PDOException;

class DatabaseConnection {
    private $pdo;

    public function __construct() {
        try {
            $hostname = 'localhost';
            $database = 'list';
            $username = 'root';
            $password = '';

            $this->pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function getPDO() {
        return $this->pdo;
    }
}


?>