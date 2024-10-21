<?php
require 'db/create_db.php'; 
require 'db/conn.php'; 
require 'functions/*'; 



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_task'])) {
    
    createTask($pdo, $_POST['task'], $_POST['due_date']);

    header("Location: index.php");
    exit;
}

$tasks = readTasks($pdo); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid main-container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="task-header text-center mb-5">
                    <h1>To Do List</h1>
                    <p>Organize suas tarefas</p>
                </div>
                <div class="mb-4">
                    <form method="POST" action="index.php" class="input-group shadow-sm">
                        <input type="text" name="task" class="form-control" placeholder="Adicione uma tarefa" required>
                        <input type="text" name="due_date" class="form-control" placeholder="Prazo (ex: 2 dias)" required>
                        <button class="btn btn-outline-primary" type="submit" name="new_task">+ Adicionar</button>
                    </form>
                </div>
                <div>
                    <?php foreach ($tasks as $task): ?>
                        <div class="task-card shadow-sm mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="task-title"><?php echo htmlspecialchars($task['task']); ?></h5>
                                <div>                                    
                                    <a href="index.php?delete_task=<?php echo $task['id']; ?>" class="btn btn-sm btn-outline-danger">Deletar</a>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $task['id']; ?>">Editar</button>
                                </div>
                            </div>
                            <p>Prazo: <?php echo htmlspecialchars($task['due_date']); ?></p>
                        </div>
                        <div class="modal fade" id="editModal<?php echo $task['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Tarefa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="functions/update.php">
                                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                            <div class="mb-3">
                                                <label for="task" class="form-label">Nome da Tarefa</label>
                                                <input type="text" name="task" class="form-control" value="<?php echo htmlspecialchars($task['task']); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="due_date" class="form-label">Prazo</label>
                                                <input type="text" name="due_date" class="form-control" value="<?php echo htmlspecialchars($task['due_date']); ?>" required>
                                            </div>
                                            <button type="submit" name="update_task" class="btn btn-primary">Atualizar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
