<?php
include 'config.php';

// Verifica se foi passado um ID na URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Busca a tarefa no banco de dados
    $sql = "SELECT task FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Se encontrar a tarefa, exibe o formulário para edição
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $task = $row["task"];
    } else {
        echo "Tarefa não encontrada!";
        exit();
    }
} else {
    echo "ID inválido!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarefa</h1>
        <form action="update_task.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="task" value="<?php echo htmlspecialchars($task); ?>" required>
            <button type="submit">Atualizar</button>
        </form>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>
