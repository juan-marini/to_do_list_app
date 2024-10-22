<?php

require $_SERVER['DOCUMENT_ROOT'] . '/to_do_list_app/db/conn.php'; 
function readTasks($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao ler tarefas: " . $e->getMessage());
    }
}
?>