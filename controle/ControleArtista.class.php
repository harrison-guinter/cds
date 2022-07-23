<?php
include $_SERVER['DOCUMENT_ROOT']."/cds/modelo/Artista.class.php";

class ControleArtista{
	
	public function inserir($dados){
		$artista = new Artista(null,$dados['nome'],$dados['numero']);
		$artista->inserir();
		header("location: /cds");
	}
	
	public function listarTodos(){
		$artista = new Artista();
		$artistas = $artista->listarTodos();
		return $artistas;
	}
	
	public function buscarIdsPeloNome($nome) {
		$artista = new Artista(null, $nome);
		return $artista->buscarIdsPeloNome($nome);

	}
}

?>