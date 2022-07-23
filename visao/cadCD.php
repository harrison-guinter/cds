<?php
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleGravadora.class.php";
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleArtista.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleEstilo.class.php";


if(isset($_POST['botao']) && $_POST['botao']=="Adicionar"){
	include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleCD.class.php";
	$cControle = new ControleCD();
	$cControle->inserir($_POST);

}


$controleGravadora = new ControleGravadora();
$listaGravadoras =  $controleGravadora->listarTodos();

$controleArtista = new ControleArtista();
$listaArtistas =  $controleArtista->listarTodos();

$controleEstilo = new ControleEstilo();
$listaEstilos =  $controleEstilo->listarTodos();


?>
<html lang='pt-br'>
<head>
<meta charset='utf-8'>
<title>Meus CDs</title>
</head>
<body>
<form method='post' action='cadCD.php'>
	Título: <input required type='text' name='titulo'>
	<br>
    Ano: <input required type='number'  name='ano'>

	<br>

	<label for="idGravadora">Escolha a gravadora:</label>
	<select required name="idGravadora">
		<option></option>
		<?php
		foreach ($listaGravadoras as $gravadora) {
			
			echo "<option value='".$gravadora->getIdGravadora()."' >".$gravadora->getIdentificacao()."</option>";
		} 
		?>

	</select>
	<br>

	<label for="idArtista">Escolha o artista:</label>
	<select required name="idArtista">
		<option></option>
		<?php
		foreach ($listaArtistas as $artista) {
			
			echo "<option value='".$artista->getIdArtista()."' >".$artista->getNome()."</option>";
		} 
		?>
	</select>

	<br>

	<label for="idEstilo">Escolha o estilo:</label>
	<select required name="idEstilo">
		<option></option>
		<?php
		foreach ($listaEstilos as $estilo) {
			
			echo "<option value='".$estilo->getIdEstilo()."' >".$estilo->getIdentificacao()."</option>";
		} 
		?>

	</select>

	<br>

	<input type='submit' name='botao' value='Adicionar'>
</form>
<a href='../index.html'>Voltar</a>
</body>
</html>