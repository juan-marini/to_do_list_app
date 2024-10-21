<?php
require $_SERVER['DOCUMENT_ROOT'] . '/to_do_list_app/db/conn.php'; 

$pdo->exec("USE todolist");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_task'])) {
    $task_id = $_POST['task_id'];
    $task = $_POST['task'];
    $due_date = $_POST['due_date'];

    if (!empty($task)) {
        $stmt = $pdo->prepare("UPDATE tasks SET task = :task, due_date = :due_date WHERE id = :id");
        $stmt->execute(['task' => $task, 'due_date' => $due_date, 'id' => $task_id]);
        
        header('Location: ../index.php'); 
        exit(); 
    }
}

