<?php
include $_SERVER['DOCUMENT_ROOT']."/modelo/Artista.class.php";

class ControleArtista{
	
	public function inserir($dados){
		$artista = new Artista(null,$dados['nome'],$dados['numero']);
		$artista->inserir();
		header("location: /");
	}
	
	public function listarTodos(){
		$artista = new Artista();
		$artistas = $artista->listarTodos();
		return $artistas;
	}
	
	public function listarUm($id){
		$artista = new Artista($id,null,null);
		$artista->listarUm();
		return $artista;
	}
	
	public function excluir($id){
		$artista = new Artista($id,null,null);
		$artista->excluir();
	}
	
	public function alterar($dados){
		$artista = new Artista($dados['id'],$dados['nome'],$dados['numero']);
		$artista->alterar();
		header("location: lstArtista.php");
	}
	
	
}

?>