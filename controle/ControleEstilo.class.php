<?php
include $_SERVER['DOCUMENT_ROOT']."/cds/modelo/Estilo.class.php";

class ControleEstilo{
	
	public function inserir($dados){
		$estilo = new Estilo(null,$dados['nome'],$dados['numero']);
		$estilo->inserir();
		header("location: /cds");
	}
	
	public function listarTodos(){
		$estilo = new Estilo();
		$estilos = $estilo->listarTodos();
		return $estilos;
	}
	
	
}

?>