<?php
include $_SERVER['DOCUMENT_ROOT']."/modelo/Estilo.class.php";

class ControleEstilo{
	
	public function inserir($dados){
		$estilo = new Estilo(null,$dados['nome'],$dados['numero']);
		$estilo->inserir();
		header("location: /");
	}
	
	public function listarTodos(){
		$estilo = new Estilo();
		$estilos = $estilo->listarTodos();
		return $estilos;
	}
	
	public function listarUm($id){
		$estilo = new Estilo($id,null,null);
		$estilo->listarUm();
		return $estilo;
	}
	
	public function excluir($id){
		$estilo = new Estilo($id,null,null);
		$estilo->excluir();
	}
	
	public function alterar($dados){
		$estilo = new Estilo($dados['id'],$dados['nome'],$dados['numero']);
		$estilo->alterar();
		header("location: lstEstilo.php");
	}
	
	
}

?>