<?php
$host = 'localhost';
$user = 'root'; 
$password = ''; 
$dbname = 'todolist'; 

try {
   
    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    $stmt = $pdo->query("SHOW DATABASES LIKE '$dbname'");
    $dbExists = $stmt->fetch();

    
    if (!$dbExists) {
        $pdo->exec("CREATE DATABASE $dbname");
        $mensagem = "Banco de dados '$dbname' criado com sucesso!";
        echo "<script type='text/javascript'>alert(" . json_encode($mensagem) . ");</script>";

    }

    
    $pdo->exec("USE $dbname");

    
    $table = "
        CREATE TABLE IF NOT EXISTS tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            task VARCHAR(255) NOT NULL,
            due_date VARCHAR(50) NOT NULL
        );
    ";
    $pdo->exec($table);

} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>
