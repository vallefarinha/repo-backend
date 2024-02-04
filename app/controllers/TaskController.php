<?php

namespace App\Controllers;

use App\Models\TaskModel;

use PDOException;

require __DIR__ . '../../../vendor/autoload.php';
require __DIR__ . '../../models/TaskModel.php';


class TaskController
{
    public function index()
    {
        try {
            $taskModel = new TaskModel();
            $tasks = $taskModel->getTasks();
            return $tasks;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $description = filter_input(INPUT_POST, 'description');
            if ($description) {
                $taskModel = new TaskModel();
                $taskModel->createTask($description);
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $description = filter_input(INPUT_POST, 'description');
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            if ($description && $id) {
                $taskModel = new TaskModel();
                $taskModel->updateTask($description, $id);
            }
        }
    }

    public function updateProgress()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id');
            $completed = filter_input(INPUT_POST, 'completed');
            $completed = ($completed === '1') ? '0' : '1';
    
            if ($id !== null) {
                $taskModel = new TaskModel();
                $taskModel->updateProgressTask($completed, $id);
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                exit;
            }
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            if ($id !== null && $id !== false) {
                $taskModel = new TaskModel();
                $taskModel->deleteTask($id);
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit();
            }
        }
    }
}