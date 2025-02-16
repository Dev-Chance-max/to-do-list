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

            // Verifica se há tarefas no banco de dados
            if ($result->num_rows > 0) {
                // Usa um array para evitar exibir tarefas duplicadas
                $tarefas_exibidas = [];

                while ($row = $result->fetch_assoc()) {
                    if (!in_array($row['task'], $tarefas_exibidas)) {
                        echo "<li>
                                {$row['task']}  
                                <a href='edit_task.php?id={$row['id']}' class='edit'>✏️ Editar</a>  
                                <a href='delete_task.php?id={$row['id']}' class='delete'>❌ Excluir</a>
                              </li>";

                        $tarefas_exibidas[] = $row['task']; // Adiciona ao array para evitar repetição
                    }
                }
            } else {
                echo "<li>Nenhuma tarefa encontrada.</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
