<?php
if(isset($_POST['botao']) && $_POST['botao']=="Adicionar"){
	include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleEstilo.class.php";
	$cControle = new ControleEstilo();
	$cControle->inserir($_POST);
}
?>
<html lang='pt-br'>
<head>
<meta charset='utf-8'>
<title>Meus CDs</title>
</head>
<body>
<form method='post' action='cadEstilo.php'>
	Nome: <input required type='text' name='nome'>
	<br>
	<input type='submit' name='botao' value='Adicionar'>
</form>
<a href='../index.html'><button class="botao-voltar">Voltar</button></a>
</body>
</html>