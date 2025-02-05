<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "chance";
    $db = "todo_list";

    //criar conexao
    $conn = new mysqli($host,$usuario,$senha,$db);

    //verificar conexao
    if($conn->connect_error){
        die("Erro de Conexao: " . $conn->connect_error);
    }

?>