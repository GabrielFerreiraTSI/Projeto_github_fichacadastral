<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "fichacadastral";

    $conexao = new mysqli($host, $user, $password, $database);

    if($conexao->connect_errno) {
        echo "Falha na conexão com o banco de dados.";
    } else {
    }
?>