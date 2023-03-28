<?php
    if(isset($_POST["submit"])) {
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


        $query = "SELECT * FROM ((proprietario INNER JOIN bancario ON bancario.id = proprietario.id) INNER JOIN localidade ON localidade.id = proprietario.id)";
        $select = mysqli_query($conexao, $query);

        if (mysqli_num_rows($select) != 0) {
            # code...
            header("Location: index.html");
        } else {
            die();
        }
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial_scale=1.0">
	<title>Ficha cadastral</title>
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
		}

		div[class=header] {
			background-color: black;
			width: 100%;
			margin-bottom: 2cm;
		}

		div[class=logo] {
			color: darkorange;
			font-size: 60px;
			margin-left: 6cm;
			padding-top: 1cm;
			padding-bottom: 1cm;
		}

		div[class=proprietario] {
			width: 50%;
			margin-left: 20%;
			margin-bottom: 3%;
			border-radius: 40px;
			background-color: #9400D3;
			padding-left: 6%;
			padding-right: 6%;
			padding-top: 1cm;
			padding-bottom: 1cm;
		}

		div[class=bancario] {
			width: 50%;
			margin-left: 20%;
			margin-bottom: 3%;
			border-radius: 40px;
			background-color: #9400D3;
			padding-left: 6%;
			padding-right: 6%;
			padding-top: 1cm;
			padding-bottom: 1cm;
		}

		div[class=local] {
			width: 50%;
			margin-left: 20%;
			margin-bottom: 3%;
			border-radius: 40px;
			background-color: #9400D3;
			padding-left: 6%;
			padding-right: 6%;
			padding-top: 1cm;
			padding-bottom: 1cm;
		}

		div[class=footer] {
			background-color: black;
			width: 100%;
			margin-top: 2cm;
		}

		div[class=direitos] {
			color: aliceblue;
			margin-left: 40%;
			padding-top: 1cm;
			padding-bottom: 1cm;
		}

		h2 {
			color: aliceblue;
		}

		label {
			color: aliceblue;
		}

		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin-bottom: 20px;
			margin-top: 10px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 15px;
			box-sizing: border-box;
			color:black;
		}

		input[type=email], select {
			width: 100%;
			padding: 12px 20px;
			margin-bottom: 20px;
			margin-top: 10px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 15px;
			box-sizing: border-box;
			color:black;
		}

		input[name=datainicio] {
			border-radius: 20px;
			color:black;
		}

		input[name=percontrato] {
			border-radius: 20px;
			color: black;
		}

		input[type=submit] {
			width: 62%;
			padding: 12px 20px;
			margin-left: 20%;
			margin-bottom: 10px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 15px;
			box-sizing: border-box;
			background-color: blue;
			color: aliceblue;
		}

		input[type=submit]:hover{
			width: 62%;
			padding: 12px 20px;
			margin-left: 20%;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 15px;
			box-sizing: border-box;
			background-color: cornflowerblue;
			color: aliceblue;
		}

		input[type=reset] {
			width: 62%;
			padding: 12px 20px;
			margin-left: 20%;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 15px;
			box-sizing: border-box;
			background-color: brown;
			color: aliceblue;
		}

		input[type=reset]:hover{
			width: 62%;
			padding: 12px 20px;
			margin-left: 20%;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 15px;
			box-sizing: border-box;
			background-color: crimson;
			color: aliceblue;
		}
	</style>
</head>
<body>
    <div class="header">
        <div class="logo"><b>Br</b>Imóveis</div>
    </div>
	<form action="cadastrar.php" method="POST" id="ficha">
		<div class="proprietario">
			<h2>DADOS DO PROPRIETÁRIO</h2>
			<label for="nome">Nome completo:</label>
			<input type="text" id="inome" name="nome">

			<label for="rg">Registro Geral(RG):</label>
			<input type="text" id="irg" name="rg" placeholder="9 dígitos">

			<label for="cpf">CPF:</label>
			<input type="text" id="icpf" name="cpf" placeholder="11 dígitos">

			<label for="estadocivil">Estado civil:</label>
			<select name="estadocivil" id="iestadocivil" form="ficha">
				<option value="Solteiro(a)">Solteiro(a)</option>
				<option value="Casaddo(a)">Casado(a)</option>
				<option value="Viúvo(a)">Viúvo(a)</option>
				<option value="Divorciado(a)">Divorciado(a)</option>
			</select>

			<label for="contato">Contato:</label>
			<input type="text" id="icontato" name="contato" placeholder="WhatsApp ou telefone">

			<label for="email">E-mail:</label>
			<input type="email" id="iemail" name="email" placeholder="example@gmail.com">
		</div>
		<div class="bancario">
			<h2>DADOS BANCÁRIOS</h2>
			<label for="banco">Banco:</label>
			<input type="text" id="ibanco" name="banco">

			<label for="conta">Conta:</label>
			<select name="conta" id="iconta" form="ficha">
				<option value="Investimento">Investimento</option>
				<option value="Corrente">Corrente</option>
				<option value="Poupança">Poupança</option>
			</select>

			<label for="agencia">Agência</label>
			<input type="text" id="iagencia" name="agencia">
		</div>
		<div class="local">
			<h2>LOCAL</h2>
			<label for="endereco">Endereço:</label>
			<input type="text" id="iendereco" name="endereco">

			<label for="valoraluguel">Valor do aluguel: R$</label>
			<input type="text" id="ivaloraluguel" name="valoraluguel">

			<label for="datainicio">Data de início:</label>
			<input type="date" id="idatainicio" name="datainicio">
			<label for="percontrato">Período de contrato:</label>
			<input type="date" id="ipercontrato" name="percontrato">

			<label for="pagcaucao">Pagamento de caução:</label>
			<select name="pagcaucao" id="ipagcaucao" form="ficha">
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
			</select>

			<label for="pagluz">Pagamento de luz:</label>
			<select name="pagluz" id="ipagluz" form="ficha">
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
			</select>

			<label for="pagagua">Pagamento de água:</label>
			<select name="pagagua" id="ipagua" form="ficha">
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
			</select>

			<label for="pagiptu">Pagamento de IPTU</label>
			<select name="pagiptu" id="ipagiptu" form="ficha">
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
			</select>
		</div>
        <div class="enviar">
		    <input type="submit" id="ienviar" name="enviar" value="Enviar">
        </div>
        <div class="limpar">
		    <input type="reset" id="ilimpar" name="limpar" value="Limpar">
        </div>
	</form>

	<div class="footer">
		<div class="direitos"><b>Br</b>Imóveis 100% dos direitos reservados.</div>
	</div>
</body>
</html>