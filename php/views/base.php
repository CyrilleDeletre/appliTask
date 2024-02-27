<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de tâche</title>
</head>

<body>
    <?php 
    include 'header.php';

    if (isset($_GET['page']) && $_GET['page'] == "task") {
        ?>
        
                <h1>Mes Tâches</h1>
        
                <form method="POST">
                        <input type="text" name="task">
                        <input type="submit" name="submit" value="Ajouter une tâche">
                </form>
        <?php
                $controller = new Controller;
                $tasks = $controller->getTasks();
                foreach ($tasks as $value) {
                    echo '<p class="id' . $value['id_task'] . '">' . $value['name_task'] . '</p>';
                    echo '<form method="POST" style="display:inline;">';
                    echo '<input type="hidden" name="task_id" value="' . $value['id_task'] . '">';
                    echo '<input type="submit" name="delete_task" value="Supprimer">';
                    echo '</form><br>';
            
                    echo '<form method="POST" style="display:inline;">';
                    echo '<input type="hidden" name="task_id" value="' . $value['id_task'] . '">';
                    echo '<input type="text" name="new_task_name" placeholder="Nouveau nom de la tâche">';
                    echo '<input type="submit" name="update_task" value="Modifier">';
                    echo '</form><br>';
                }
        }
        

    ?>
</body>
</html>

    <!-- <script>
        const modifier = document.querySelector('.test');
        modifier.addEventListener('click', (event) => {
            event.preventDefault();
            const id = document.querySelector('.id')
            id.style.display = "none";
        })
    </script> -->