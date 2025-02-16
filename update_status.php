<?php
include 'config.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Obtém o status atual da tarefa
    $sql = "SELECT status FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $newStatus = ($row["status"] == "pendente") ? "concluido" : "pendente";

        // Atualiza o status no banco de dados
        $updateSql = "UPDATE tasks SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("si", $newStatus, $id);
        $stmt->execute();
    }
}

$conn->close();
header("Location: index.php");
exit();
