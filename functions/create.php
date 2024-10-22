<?php

require $_SERVER['DOCUMENT_ROOT'] . '/to_do_list_app/db/conn.php'; 

function createTask($pdo, $task, $due_date) {
    try {
        
        $stmt = $pdo->prepare("INSERT INTO tasks (task, due_date) VALUES (:task, :due_date)");
        $stmt->execute([
            ':task' => $task,
            ':due_date' => $due_date
        ]);
    } catch (PDOException $e) {
        die("Erro ao criar tarefa: " . $e->getMessage());
    }
}
?>