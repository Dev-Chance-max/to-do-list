<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta SQL para excluir a tarefa com base no ID
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redireciona para a página principal após a exclusão
        exit();
    } else {
        echo "Erro ao excluir a tarefa.";
    }

    $stmt->close();
}

$conn->close();
?>
