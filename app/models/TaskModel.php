<?php

namespace App\Models;

require_once __DIR__ . '/../../database/DatabaseConnection.php';
use PDOException;
use PDO;
use Database\DatabaseConnection;

class TaskModel {
    private $pdo;

    public function __construct() {
        $databaseConnection = new DatabaseConnection();
        $this->pdo = $databaseConnection->getPDO();
    }

    public function getTasks() {
        $tasks = [];       
            $sql = $this->pdo->query("SELECT * FROM todolist");
            if ($sql->rowCount() > 0) {
                $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
        } 
        return $tasks;
    }

    public function createTask($description)
     {
        try {
            $sql = $this->pdo->prepare("INSERT INTO todolist (task) VALUES (:description)");
            $sql->bindValue(':description', $description, PDO::PARAM_STR);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Falha ao inserir a tarefa.";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function updateTask($description, $id)   
      {
        try {
            $sql = $this->pdo->prepare("UPDATE todolist SET task = :description WHERE id = :id");
            $sql->bindValue(':description', $description, PDO::PARAM_STR);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function updateProgressTask($completed, $id)   
      {
        try {
            $sql = $this->pdo->prepare("UPDATE todolist SET completed = :completed WHERE id = :id");
            $sql->bindValue(':completed', $completed, PDO::PARAM_BOOL);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->execute();

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function deleteTask($id) {
        try {
             
            $sql = $this->pdo->prepare("DELETE FROM todolist WHERE id=:id");
            $sql->bindValue(':id', $id);
            $sql->execute();
    
        
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false; 
        }
    }
}
?>