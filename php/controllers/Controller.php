<?php 

require_once "models/BddConnect.php";

class Controller {


    function index(){
        require_once "views/base.php";
    }

    function affichageTasks(){
        $conn = new BddConnect;
        $data = $conn->readTask();
        
        foreach ($data as $value) {
            echo '<p class="id' . $value['id_task'] . '">' . $value['name_task'] . '</p>';
            echo '<form method="POST" style="display:inline;">';
            echo '<input type="hidden" name="task_id" value="' . $value['id_task'] . '">';
            echo '<input type="submit" name="delete_task" value="Supprimer">';
            echo '</form><br>';
        }
    }
    function addTask(){
            $conn = new BddConnect;
            $conn->insertTask($_POST['task']);
    }

    function deleteTasks(){
        if(isset($_POST['delete_task']) && !empty($_POST['task_id'])) {
            $conn = new BddConnect;
            $conn->deleteTask($_POST['task_id']);
            echo "Tâche supprimée avec succès";
        }
    }
}


?>