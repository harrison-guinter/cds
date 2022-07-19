<?php
if(isset($_POST['botao']) && $_POST['botao']=="Adicionar"){
	include $_SERVER['DOCUMENT_ROOT']."/controle/ControleArtista.class.php";
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
<form method='post' action='cadArtista.php'>
	Nome: <input type='text' name='nome'>
	<br>
	<input type='submit' name='botao' value='Adicionar'>
</form>
<a href='../index.html'>Voltar</a>
</body>
</html>