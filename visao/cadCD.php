<?php
if(isset($_POST['botao']) && $_POST['botao']=="Adicionar"){
	include $_SERVER['DOCUMENT_ROOT']."/controle/ControleCD.class.php";
	$cControle = new ControleCD();
	$cControle->inserir($_POST);
}
?>
<html lang='pt-br'>
<head>
<meta charset='utf-8'>
<title>Meus CDs</title>
</head>
<body>
<form method='post' action='cadCD.php'>
	Título: <input type='text' name='nome'>
	<br>
    Ano: <input type='number'  name='ano'>
	<input type='submit' name='botao' value='Adicionar'>
</form>
<a href='../index.html'>Voltar</a>
</body>
</html>