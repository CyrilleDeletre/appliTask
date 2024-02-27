<?php

require_once "controllers/Controller.php";

$controller = new Controller;

$controller->index();

if (!isset($_GET['page'])) {
        echo "<h1>Bienvenue sur mon site</h1>";
}

if (isset($_GET['page']) && $_GET['page'] == "task") {
?>

<h1>Mes Tâches</h1>

        <form method="POST">
                <input type="text" name="task">
                <input type="submit" name="submit">
        </form>
<?php
        $controller->affichageTasks();
}

if (isset($_POST['submit']) && !empty($_POST['task'])) {
        $controller->addTask();
}
if (isset($_POST['delete_task']) && !empty($_POST['task_id'])) {
        $controller->deleteTasks();
    }
    

?>