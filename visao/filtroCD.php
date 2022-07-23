<?php
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleGravadora.class.php";
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleEstilo.class.php";

$controleGravadora = new ControleGravadora();
$listaGravadoras =  $controleGravadora->listarTodos();

$controleEstilo = new ControleEstilo();
$listaEstilos =  $controleEstilo->listarTodos();


?>
<html lang='pt-br'>
<head>
<meta charset='utf-8'>
<title>Pesquisar CDs</title>
</head>
<body>
<form method='post' action='filtroCD.php'>
    Nome do Artista: <input type='text'  name='artista'>
    <br>
	Título: <input type='text' name='titulo'>
	<br>
    Ano: <input type='number'  name='ano'>

	<br>

	<label for="idGravadora">Escolha a gravadora:</label>
	<select  name="idGravadora">
		<option></option>
		<?php
		foreach ($listaGravadoras as $gravadora) {
			
			echo "<option value='".$gravadora->getIdGravadora()."' >".$gravadora->getIdentificacao()."</option>";
		} 
		?>

	</select>

	<br>

	<label for="idEstilo">Escolha o estilo:</label>
	<select  name="idEstilo">
		<option></option>
		<?php
		foreach ($listaEstilos as $estilo) {
			
			echo "<option value='".$estilo->getIdEstilo()."' >".$estilo->getIdentificacao()."</option>";
		} 
		?>

	</select>

	<br>

	<input type='submit' name='botao' value='Pesquisar'>
</form>
</body>
</html>

<?php
    if(isset($_POST['botao']) && $_POST['botao']=="Pesquisar"){
        include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleCD.class.php";
        $cControle = new ControleCD();

        $sql = $cControle->criarQuery($_POST);
        $cds = $cControle->listarTodos();
    
    }
?>

<a href='../index.html'>Voltar</a>