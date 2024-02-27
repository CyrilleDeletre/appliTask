<?php 

class BddConnect{
    public $connexion;
    public function __construct() {
        $utilisateur = "admin";
        $motdepasse = "admin";
        $bdd = "bdd-task";
        $serveur = "mysql:host=mysql;dbname=$bdd";

        $this->connexion = new PDO($serveur, $utilisateur, $motdepasse);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function insertTask($task) {
        try {
            $sql_insert = "INSERT INTO `task` (`name_task`) VALUES (:task)";
            $stmt_insert = $this->connexion->prepare($sql_insert);
            $stmt_insert->bindParam(':task', $task);
            $stmt_insert->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion de la tâche : " . $e->getMessage();
        }
    }

    function readTask(){
        $sql_read = "SELECT * FROM `task`";
        $request = $this->connexion->query($sql_read);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteTask($task_id){
            $sql_delete = "DELETE FROM `task` WHERE `id_task` = :task_id";
            $stmt_delete = $this->connexion->prepare($sql_delete);
            $stmt_delete->bindParam(':task_id', $task_id);
            $stmt_delete->execute();
    }

    function updateTask($task_id, $new_task_name){
        $sql_update = "UPDATE `task` SET `name_task` = :new_task_name WHERE `id_task` = :task_id";
        $stmt_update = $this->connexion->prepare($sql_update);
        $stmt_update->bindParam(':task_id', $task_id);
        $stmt_update->bindParam(':new_task_name', $new_task_name);
        $stmt_update->execute();
    }
}

?>
