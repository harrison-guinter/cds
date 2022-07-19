<?php
include $_SERVER['DOCUMENT_ROOT']."/modelo/CD.class.php";

class ControleCD{
	
	public function inserir($dados){
		$cd = new CD(null,$dados['nome'],$dados['numero']);
		$cd->inserir();
		header("location:../visao/lstCD.php");
	}
	
	public function listarTodos(){
		$cd = new CD();
		$cds = $cd->listarTodos();
		return $cds;
	}
	
	public function listarUm($id){
		$cd = new CD($id,null,null);
		$cd->listarUm();
		return $cd;
	}
	
	public function excluir($id){
		$cd = new CD($id,null,null);
		$cd->excluir();
	}
	
	public function alterar($dados){
		$cd = new CD($dados['id'],$dados['nome'],$dados['numero']);
		$cd->alterar();
		header("location: lstCD.php");
	}
	
	
}

?>