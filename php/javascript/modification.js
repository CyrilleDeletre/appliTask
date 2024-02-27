document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-task');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const taskId = button.getAttribute('data-task-id');
            const taskElement = document.querySelector('.task[data-task-id="' + taskId + '"]');
            const editInput = document.querySelector('.edit-input[data-task-id="' + taskId + '"]');

            taskElement.style.display = 'none';
            editInput.style.display = 'inline-block';
            editInput.focus();

            editInput.addEventListener('blur', function() {
                const newTaskName = editInput.value.trim();
                if (newTaskName !== '') {
                    const taskId = editInput.getAttribute('data-task-id');
                    const formData = new FormData();
                    formData.append('update_task', true);
                    formData.append('task_id', taskId);
                    formData.append('new_task_name', newTaskName);
            
                    fetch('index.php?page=task', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erreur lors de la mise à jour de la tâche');
                        }
                        // Mettre à jour l'affichage côté client si nécessaire
                        taskElement.textContent = newTaskName;
                        taskElement.style.display = 'inline-block';
                        editInput.style.display = 'none';
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                    });
                } else {
                    // Réinitialiser l'affichage si le champ est vide
                    taskElement.style.display = 'inline-block';
                    editInput.style.display = 'none';
                }
            });
        });
    });
});
