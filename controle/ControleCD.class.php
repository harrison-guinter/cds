<?php
include $_SERVER['DOCUMENT_ROOT']."/cds/modelo/CD.class.php";
include $_SERVER['DOCUMENT_ROOT']."/cds/controle/ControleArtista.class.php";

class ControleCD{

	public function criarQuery($dados) {
		$sql = "SELECT * FROM cd WHERE ";
		if($dados['titulo']) {
			$sql = $sql." titulo LIKE '%".$dados['titulo']."%' AND";
		}
		if($dados['ano']) {
			$sql = $sql." ano = '".$dados['ano']."' AND";
		}
		if($dados['idGravadora']) {
			$sql = $sql." gravadora_idGravadora = ".$dados['idGravadora']." AND";
		}
		if($dados['idEstilo']) {
			$sql = $sql." estilo_idEstilo = ".$dados['idEstilo'];
		}
		if($dados['artista']) {
			$controleArtista = new ControleArtista();
			$listaIdsArtistas = $controleArtista->buscarIdsPeloNome($dados['artista']);
			$idsArtistas = '';
			foreach ($listaIdsArtistas as $artista) {
				if($artista == $listaIdsArtistas[0]) {
					$idsArtistas = $idsArtistas."".$artista->getIdArtista();
				}
				else {
					$idsArtistas = $idsArtistas.", ".$artista->getIdArtista();
				}
			}

			$sql = $sql." artista_idArtista in (".$idsArtistas.")";
		} else {
			$sql = $sql." TRUE";
		}

		echo $sql;
	} 
	
	public function inserir($dados){
		$cd = new CD(null, $dados['titulo'], $dados['ano'], $dados['idGravadora'], $dados['idArtista'], $dados['idEstilo']);
		$cd->inserir();
		header("location: /cds");
	}
	
	
}

?>