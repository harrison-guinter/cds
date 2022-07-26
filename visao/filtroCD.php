<?php
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleGravadora.class.php";
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleEstilo.class.php";
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleArtista.class.php";
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleCD.class.php";

$controleGravadora = new ControleGravadora();
$listaGravadoras =  $controleGravadora->listarTodos();

$controleEstilo = new ControleEstilo();
$listaEstilos =  $controleEstilo->listarTodos();

$controleArtista = new ControleArtista();


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

	<input type='submit' name='botao' value='Filtrar'>
</form>
</body>
</html>

<?php
    if(isset($_POST['botao']) && $_POST['botao']=="Filtrar"){
        $cdObject = new CD();

        $cControle = new ControleCD();

        $sql = $cControle->criarQuery($_POST);

        $cds = $cdObject->pesquisar($sql);

        ?>

        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ano</th>
                    <th>Gravadora</th>
                    <th>Artista</th>
                    <th>Estilo</th>
                </tr>
        </thead>

        <?php 
    
            //  echo "<pre>"; print_r($cds); "</pre>";
             if($cds) {
                foreach ($cds as $cd) {

                // echo "<pre>"; print_r($cd); "</pre>";
                echo "<tr>";
                echo "   <td>".$cd['titulo']."</td>";
                echo "   <td>".$cd['ano']."</td>";
                echo "   <td>".$controleGravadora->listarUm($cd['idGravadora'])->getIdentificacao()."</td>";
                echo "   <td>".$controleArtista->listarUm($cd['idArtista'])->getNome()."</td>";
                echo "   <td>".$controleEstilo->listarUm($cd['idEstilo'])->getIdentificacao()."</td>";
                echo "</tr>";
                // echo $controleGravadora->listarUm($cd['idGravadora']);
             }
            } else {
                echo '<tr> <td>Não há CDs para os filtros correspondentes!</td><td></td><td></td><td></td><td></td> </tr>';
            }
            
             ?>
    
        </table>
        <a href='../index.html'><button class="botao-voltar">Voltar</button></a>
        
        <?php
    }
?>

<style>
       

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    
</style>