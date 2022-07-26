<?php
if(isset($_POST['botao']) && $_POST['botao']=="Adicionar"){
	include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleArtista.class.php";
	$cControle = new ControleArtista();
	$cControle->inserir($_POST);
}
?>
<html lang='pt-br'>
<head>
<meta charset='utf-8'>
<title>Meus CDs</title>
</head>
<body>
	<div class="container">
		<h1 class="title">Cadastro de Artistas</h1>
		<form method='post' action='cadArtista.php'>
			<label>Nome:</label> <input required  type='text' name='nome'>
			<br>
			<div class="botoes">
				<a href='../index.html'>Voltar</a>
				<input type='submit' name='botao' value='Adicionar'>
			</div>
		</form>
		
	</div>
</body>
</html>


<style>
	body {
		background-color: antiquewhite;
		font-family: Verdana, Geneva, Tahoma, sans-serif;
	}

	a {
		margin: 1.2em 0.5em 0 0 !important;
	}

	input {
		border: none;
		border-radius: 4px;
		height: 2em;
	}

	input:focus-visible {
		border: none;
		border-radius: 4px;
	}

	input[type=submit] {
		margin: 1em 0 0 0;
	}

	input[type=submit], a {
		cursor: pointer;
		font-size: 1em;
		border: none;
		border-radius: 4px;
		background-color: #199319;
		color: white;
		text-decoration: none;
		padding: 0.4em;
	}

	.title {
		padding-left: 1em;
		text-align: center;
	}

	.container {
		display: flex;
		place-items: center;
		flex-direction: column;
	}

	.botoes {
		display: flex;
		place-items: end;
		justify-content: end;
		text-align: right;
	}
</style>