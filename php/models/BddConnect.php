<?php

class BddConnect{
    public $connexion;

    public function __construct() {
        $utilisateur = "admin";
        $motdepasse = "admin";
        $bdd = "bdd-task";
        $serveur = "mysql:host=mysql;dbname=$bdd";

    try {
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        $this->connexion = new PDO($serveur, $utilisateur, $motdepasse, $options);
    } catch (PDOException $e) {
        error_log("Erreur de connexion : " . $e->getMessage(), 0);
        throw new Exception("Erreur de connexion à la base de données.");
    }
}

    function insertTask($task) {
        try {
            $sql_insert = "INSERT INTO `task` (`name_task`) VALUES (:task)";
            $stmt_insert = $this->connexion->prepare($sql_insert);
            $stmt_insert->bindParam(':task', $task, PDO::PARAM_STR);
            $stmt_insert->execute();
        } 
        catch (PDOException $e) {
            error_log("Erreur lors de l'insertion de la tâche : " . $e->getMessage(), 0);
            throw new Exception("Erreur lors de l'insertion de la tâche.");
        }
    }

    public function readTask(){
        try {
            $sql_read = "SELECT * FROM `task`";
            $stmt_read = $this->connexion->query($sql_read);
            return $stmt_read->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            error_log("Erreur lors de la lecture des tâches : " . $e->getMessage(), 0);
            throw new Exception("Erreur lors de la lecture des tâches.");
        }
    }

    function deleteTask($task_id){
        try {
            $sql_delete = "DELETE FROM `task` WHERE `id_task` = :task_id";
            $stmt_delete = $this->connexion->prepare($sql_delete);
            $stmt_delete->bindParam(':task_id', $task_id, PDO::PARAM_INT);
            $stmt_delete->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la tâche : " . $e->getMessage();
            throw new Exception("Erreur lors de la suppression de la tâche.");
        }
    }

    function updateTask($task_id, $new_task_name){
        try {
            $sql_update = "UPDATE `task` SET `name_task` = :new_task_name WHERE `id_task` = :task_id";
            $stmt_update = $this->connexion->prepare($sql_update);
            $stmt_update->bindParam(':task_id', $task_id, PDO::PARAM_INT);
            $stmt_update->bindParam(':new_task_name', $new_task_name, PDO::PARAM_STR);
            $stmt_update->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la tâche : " . $e->getMessage();
            throw new Exception("Erreur lors de la mise à jour de la tâche.");
        }
    }
}

?>
