<?php

namespace App\Views;

require __DIR__ . '../../../vendor/autoload.php';
require __DIR__ . '../../controllers/TaskController.php';

use App\Controllers\TaskController;

$taskController = new TaskController();
$tasks = $taskController->index();
if (isset($_POST['id'])) {
    if (isset($_POST['completed'])) {
        $taskController->updateProgress();
    } else {
        $taskController->update();
    }
} else {
    $taskController->create();

}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $taskController->delete();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/46cac75c44.js" crossorigin="anonymous"></script>


    <title>To Do List</title>
</head>

<body>
    <main id="to-do">

        <h1>Things To Do</h1>

        <form action="" class="to-do-form" method="POST">
            <input type="text" name="description" placeholder="Write your task here" required />

            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <div id="tasks">
            <?php if (is_array($tasks) && !empty($tasks)) : ?>
            <?php foreach ($tasks as $task) : ?>

            <div class="task" id="drag" draggable="true" data-task-id="<?= $task['id'] ?>">
                <input type="checkbox" name="progress" class="progress visually-hidden" id="checkbox_<?= $task['id'] ?>"
                    <?= $task['completed'] ? 'checked' : '' ?> />
                <label for="checkbox_<?= $task['id'] ?>" class="task-check"></label>
                <p class="task-description"><?= $task['task']; ?></p>
                <div class="task-actions">
                    <a class="action-button edit-button"><i class="fa-regular fa-pen-to-square"></i></a>

                    <a href="?action=delete&id=<?= $task['id'] ?>" class="action-button delete-button"><i
                            class="fa-regular fa-trash-can"></i></a>
                </div>

                <form action="" class="to-do-form edit-task hidden" method="POST">
                    <input type="text" class="hidden" name="id" value="<?= $task['id'] ?>">
                    <input type="text" name="description" placeholder="edit your task here"
                        value="<?= $task['task'] ?>">
                    <button type="submit" class="form-button confirm-button">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
            </div>

            <?php endforeach; ?>
            <?php else : ?>
            <p class="no-tasks-available">No tasks available.</p>
            <?php endif; ?>

            </<div>
    </main>
    <script src="../../public/script/dragDiv.js"></script>
</body>

</html>