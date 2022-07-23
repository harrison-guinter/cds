<?php
require_once $_SERVER['DOCUMENT_ROOT']."/cds/modelo/Artista.class.php";

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
	
	public function listarUm($id){
		$artista = new Artista($id,null,null);
		$artista->listarUm($id);
		return $artista;
	}
	
	
	public function buscarIdsPeloNome($nome) {
		$artista = new Artista(null, $nome);
		return $artista->buscarIdsPeloNome($nome);

	}
}

?>