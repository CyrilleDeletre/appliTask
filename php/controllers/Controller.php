<?php 

require_once "models/BddConnect.php";

class Controller {

    function index(){
        require_once "views/base.php";
    }

    function getTasks(){
        $conn = new BddConnect;
        return $conn->readTask();
    }

    function addTasks() {
        if (isset($_POST['add_task']) && !empty($_POST['task'])) {
            $conn = new BddConnect();
            $conn->insertTask($_POST['task']);
            echo "Tâche ajoutée avec succès";
        }
    }

    function deleteTasks(){
        if(isset($_POST['delete_task'])) {
            $conn = new BddConnect;
            $conn->deleteTask($_POST['task_id']);
            echo "Tâche supprimée avec succès";
        }
    }

    function updateTasks(){
        if(isset($_POST['update_task']) && !empty($_POST['new_task_name'])) {
            $conn = new BddConnect;
            $conn->updateTask($_POST['task_id'], $_POST['new_task_name']);
            echo "Tâche mise à jour avec succès";
        }
    }
}

?>