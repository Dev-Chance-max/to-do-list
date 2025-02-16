<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Tarefas</h1>
        
        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="Digite sua tarefa..." required>
            <button type="submit">Adicionar</button>
        </form>

        <ul class="task-list">
            <?php
            include 'config.php';
            $sql = "SELECT * FROM tasks ORDER BY id DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $taskStatus = $row['status'] == 'pendente' ? '✔️ Concluir' : '↩️ Reabrir';
                $taskStyle = $row['status'] == 'concluido' ? 'style="text-decoration: line-through; color: gray;"' : '';

                echo "<li $taskStyle>
                        {$row['task']} 
                        <a href='update_status.php?id={$row['id']}' class='status-btn'>$taskStatus</a> 
                        <a href='edit_task.php?id={$row['id']}' class='edit'>✏️Editar</a> 
                        <a href='delete_task.php?id={$row['id']}' class='delete'>❌Excluir</a>
                      </li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
