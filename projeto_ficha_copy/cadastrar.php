<?php
    require_once("conexao.php");
    $nome = $_POST["nome"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $contato = $_POST["contato"];
    $estadocivil = $_POST["estadocivil"];
    $email = $_POST["email"];

    $banco = $_POST["banco"];
    $conta = $_POST["conta"];
    $agencia = $_POST["agencia"];

    $endereco = $_POST["endereco"];
    $valorAluguel = $_POST["valorAluguel"];
    $dataInicio = $_POST["dataInicio"];
    $perContrato = $_POST["periodoContrato"];
    $pagCaucao = $_POST["pagCaucao"];
    $pagLuz = $_POST["pagLuz"];
    $pagAgua = $_POST["pagAgua"];
    $pagIPTU = $_POST["pagIPTU"];

    
    $insertProp = "INSERT INTO proprietario VALUES('', '$nome', '$rg', '$cpf', '$contato', '$estadocivil', '$email');";
    $insertBanc = "INSERT INTO bancario VALUES('', '$banco', '$conta', '$agencia');";
    $insertLocal = "INSERT INTO localidade VALUES('', '$endereco', '$valorAluguel', '$dataInicio', '$perContrato', '$pagCaucao', '$pagLuz', '$pagAgua', '$pagIPTU');";

    $registroProp = mysqli_query($conexao, $insertProp);
    $registroBanc = mysqli_query($conexao, $insertBanc);
    $registroLocal = mysqli_query($conexao, $insertLocal);

    if($registroProp == true && $registroBanc == true) {
        if($registroLocal == true) {
            echo "<script>
                alert('Suas informações foram cadastradas com sucesso!');
                window.location.href='index.html';
            </script>";
        } else {
            die();
        }
    } else {
        echo "<script>
            alert('Falha ao cadastrar os seus dados! Tente novamente.');
            window.location.href='fichacadastral.php';
        </script>";
        die();
    }
?>