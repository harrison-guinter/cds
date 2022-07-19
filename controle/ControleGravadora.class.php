<?php
include $_SERVER['DOCUMENT_ROOT']."/modelo/Gravadora.class.php";

class ControleGravadora{
	
	public function inserir($dados){
		$gravadora = new Gravadora(null,$dados['nome'],$dados['numero']);
		$gravadora->inserir();
		header("location: /");
	}
	
	public function listarTodos(){
		$gravadora = new Gravadora();
		$gravadoras = $gravadora->listarTodos();
		return $gravadoras;
	}
	
	public function listarUm($id){
		$gravadora = new Gravadora($id,null,null);
		$gravadora->listarUm();
		return $gravadora;
	}
	
	public function excluir($id){
		$gravadora = new Gravadora($id,null,null);
		$gravadora->excluir();
	}
	
	public function alterar($dados){
		$gravadora = new Gravadora($dados['id'],$dados['nome'],$dados['numero']);
		$gravadora->alterar();
		header("location: lstGravadora.php");
	}
	
	
}

?>