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

    function insertTask($task){
            $sql_insert = "INSERT INTO `task` (`name_task`) VALUES (:task)";
            $stmt_insert = $this->connexion->prepare($sql_insert);
            $stmt_insert->bindParam(':task', $task);
            $stmt_insert->execute();

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
    
}
?>
