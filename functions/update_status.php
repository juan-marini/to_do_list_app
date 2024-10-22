<?php
require $_SERVER['DOCUMENT_ROOT'] . '/to_do_list_app/db/conn.php'; 

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['task_id']) && isset($data['status'])) {
    $taskId = $data['task_id'];
    $status = $data['status'];

    $sql = "UPDATE tasks SET status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['status' => $status, 'id' => $taskId]);

    if ($stmt->rowCount()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
}
