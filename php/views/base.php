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

// Génération du jeton CSRF
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_GET['page']) && $_GET['page'] == "task") {
    // Création de tâche
?>
    <h1>Mes Tâches</h1>

    <form method="POST">
        <input type="text" name="task_name">
        <input type="submit" name="add_task" value="Ajouter une tâche">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    </form>

<?php
    $controller = new Controller;
    $tasks = $controller->getTasks();

    foreach ($tasks as $value) {
        // Tâche container
        echo '<div class="task-container">';
        
        // Lecture de la tâche
        echo '<p class="task" data-task-id="' . htmlspecialchars($value['id_task']) . '">' . htmlspecialchars($value['name_task']) . '</p>';

        // Suppression de la tâche
        echo '<form method="POST" style="display:inline;">';
        echo '<input type="hidden" name="task_id" value="' . htmlspecialchars($value['id_task']) . '">';
        echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
        echo '<input type="submit" name="delete_task" value="Supprimer">';
        echo '</form><br>';

        // Modification de la tâche
        echo '<button class="edit-task" data-task-id="' . htmlspecialchars($value['id_task']) . '">Modifier</button>';
        echo '<input type="text" class="edit-input" style="display: none;" data-task-id="' . htmlspecialchars($value['id_task']) . '" value="' . htmlspecialchars($value['name_task']) . '">';
        
        echo '</div>';
    }
}
?>

</body>

</html>