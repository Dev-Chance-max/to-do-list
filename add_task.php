<?php 
    include './config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){ // se existir algum dados (for verdadedeiro)
        $task = trim($_POST["task"]);//obtem o dado de task(formulario)
            if(!empty($task)){
                $sql = "INSERT INTO tasks (task) values (?)"; //inserido no banco de dados
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $task);//O primeiro argumento 's' indica que o valor que será vinculado é do tipo string.
            }if($stmt->execute()){
                header("Location: index.php");
                exit();
            }
            else{   
                echo "erro ao adicionar tarefa.";
            }
            $stmt->close();
        }else{
            echo "A tarefa nao pode estar Vazia!";
        }    
    $conn->close();
?>