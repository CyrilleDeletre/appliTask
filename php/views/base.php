<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de tâche</title>
    <script src="../javascript/modification.js"></script>
</head>

<body>
    <?php
    include 'header.php';

    if (isset($_GET['page']) && $_GET['page'] == "task") {
        
        // Create
    ?>
        <h1>Mes Tâches</h1>

        <form method="POST">
            <input type="text" name="task_name">
            <input type="submit" name="add_task" value="Ajouter une tâche">
        </form>

    <?php

        $controller = new Controller;
        $tasks = $controller->getTasks();

        foreach ($tasks as $value) {
            // Task container
            echo '<div class="task-container">';
            
            // Read
            echo '<p class="task" data-task-id="' . $value['id_task'] . '">' . $value['name_task'] . '</p>';

            // Delete
            echo '<form method="POST" style="display:inline;">';
            echo '<input type="hidden" name="task_id" value="' . $value['id_task'] . '">';
            echo '<input type="submit" name="delete_task" value="Supprimer">';
            echo '</form><br>';

            // Modify
            echo '<button class="edit-task" data-task-id="' . $value['id_task'] . '">Modifier</button>';
            echo '<input type="text" class="edit-input" style="display: none;" data-task-id="' . $value['id_task'] . '" value="' . $value['name_task'] . '">';
            
            echo '</div>';
        }
    }
    ?>
</body>

</html>