<?php
require 'db/conn.php';

if (isset($_GET['delete_task'])) {
    $task_id = $_GET['delete_task'];
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $task_id]);
}

?>