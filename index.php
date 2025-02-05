<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to-do-list</title>
    <link rel="stylesheet" href="./style.css">
    <meta http-equiv="refresh" content="3">
</head>
<body>
    <div class="container">
        <h1>Lista de Tarefas</h1>

        <form action="add_task.php" method="post">
            <input type="text" name="task" placeholder="Digite a tarefa">
            <button type="submit">Adicionar</button>
        </form>

        <ul class="task-list">
            <?php 
                include 'config.php';
                $sql =  "SELECT * FROM tasks ORDER BY id DESC";
                $result = $conn->query($sql);
                //usando while para pegar todos os dados do banco de dados
                while($row = $result->fetch_assoc()){
                    echo "{$row['task']} <a href='delete_task.php?id={row['id']}' class='delete'>❌</a>";
                }
            ?>
        </ul>
    </div>
</body>
</html>