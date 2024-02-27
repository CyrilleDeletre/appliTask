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
            $conn = new BddConnect();
            $conn->insertTask($_POST['task']);
            echo "Tâche ajoutée avec succès";
        }

    function deleteTasks(){

            $conn = new BddConnect;
            $conn->deleteTask($_POST['task_id']);
            echo "Tâche supprimée avec succès";
        }


    function updateTasks(){

            $conn = new BddConnect;
            $conn->updateTask($_POST['task_id'], $_POST['new_task_name']);
            echo "Tâche mise à jour avec succès";
        }
}

?>