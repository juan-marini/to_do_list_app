function toggleTaskStatus(checkbox) {
    const taskId = checkbox.getAttribute('data-task-id');
    const newStatus = checkbox.checked ? 'completado' : 'pendente'; // Novo status baseado no checkbox
    const taskCard = checkbox.closest('.task-card');
    const taskTitle = taskCard.querySelector('.task-title');

    // Atualiza a UI
    if (checkbox.checked) {
        taskTitle.classList.add('completed');
    } else {
        taskTitle.classList.remove('completed');
    }

    // Envia a atualização para o backend
    fetch('functions/update_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            task_id: taskId,
            status: newStatus
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Status atualizado com sucesso.');
        } else {
            console.error('Erro ao atualizar o status.');
        }
    })
    .catch(error => {
        console.error('Erro na requisição:', error);
    });
}
