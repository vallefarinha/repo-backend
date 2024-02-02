<?php

require_once 'DatabaseConnection.php';

use Database\DatabaseConnection;

$databaseConnection = new DatabaseConnection();

$pdo = $databaseConnection->getPDO();

try {
    $sql = $pdo->query("SELECT task FROM todolist");
    $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($tasks) {
        echo "<pre>";
        print_r($tasks);
        echo "</pre>";
    } else {
        echo "Nenhuma tarefa encontrada.";
    }
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
}

?>