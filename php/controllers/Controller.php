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

    function addTask() {
        if (isset($_POST['submit']) && !empty($_POST['task'])) {
            // Validation des données d'entrée utilisateur
            $task = $_POST['task'];
            // Création d'une instance de BddConnect
            $bdd = new BddConnect();
            // Appel de la fonction insertTask avec la tâche validée
            $bdd->insertTask($task);
        }
    }

    function deleteTasks(){
        if(isset($_POST['delete_task']) && !empty($_POST['task_id'])) {
            $conn = new BddConnect;
            $conn->deleteTask($_POST['task_id']);
            echo "Tâche supprimée avec succès";
        }
    }

    function updateTask(){
        if(isset($_POST['update_task']) && !empty($_POST['task_id']) && !empty($_POST['new_task_name'])) {
            $conn = new BddConnect;
            $conn->updateTask($_POST['task_id'], $_POST['new_task_name']);
            echo "Tâche mise à jour avec succès";
        }
    }

    
    
}


?>