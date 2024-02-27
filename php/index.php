<?php
session_start();
require_once "controllers/Controller.php";

$controller = new Controller;
$controller->index();

if (!isset($_GET['page'])) {
        echo "<h1>Bienvenue sur mon site de gestion des tâches</h1>";
}

if (isset($_POST['add_task']) && !empty($_POST['task_name'])) {
        $controller->addTasks();
}
if(isset($_POST['delete_task'])) {
        $controller->deleteTasks();
}

if(isset($_POST['update_task']) && !empty($_POST['new_task_name'])) {
        $controller->updateTasks();
}

?>