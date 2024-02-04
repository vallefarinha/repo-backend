document.addEventListener('DOMContentLoaded', function () {
    const tasksContainer = document.getElementById('tasks');
    let draggedTask = null;

    tasksContainer.addEventListener('dragstart', function (e) {
        const targetTask = e.target.closest('.task');
        if (targetTask) {
            draggedTask = targetTask;
            draggedTask.classList.add('dragging');
        }
    });

    tasksContainer.addEventListener('dragenter', function (e) {
        e.preventDefault();
        if (draggedTask) {
            document.body.style.cursor = 'grab';
        }
    });

    tasksContainer.addEventListener('dragleave', function (e) {
        e.preventDefault();
        if (draggedTask) {
            document.body.style.cursor = 'auto';
        }
    });

    tasksContainer.addEventListener('dragover', function (e) {
        e.preventDefault();
        const targetTask = e.target.closest('.task');
        if (targetTask && targetTask !== draggedTask) {
            const rect = targetTask.getBoundingClientRect();
            const next = (e.clientY - rect.top) / (rect.bottom - rect.top) > 0.5;
            tasksContainer.insertBefore(draggedTask, next ? targetTask.nextElementSibling : targetTask);
        }
    });

    tasksContainer.addEventListener('dragend', function () {
        if (draggedTask) {
            draggedTask.classList.remove('dragging');
            document.body.style.cursor = 'auto';
        }
        draggedTask = null;
    });

    // function updateTaskOrder() {
    //     const tasks = document.querySelectorAll('.task');
    //     const taskIds = Array.from(tasks).map(task => task.getAttribute('data-task-id'));
    //     // Implement logic to update the order of tasks in your data structure or backend
    //     console.log('Task order updated:', taskIds);
    // }
});
