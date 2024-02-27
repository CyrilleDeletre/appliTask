<?php

require_once "controllers/Controller.php";

$controller = new Controller;

$controller->index();

if (!isset($_GET['page'])) {
        echo "<h1>Bienvenue sur mon site</h1>";
}

if (isset($_POST['submit']) && !empty($_POST['task'])) {
        $controller->addTask();
}
if (isset($_POST['delete_task'])) {
        $controller->deleteTasks();
}

if (isset($_POST['update_task'])) {
        $controller->updateTask();
}

?>