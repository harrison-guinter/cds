<?php
include $_SERVER['DOCUMENT_ROOT']."/cds/modelo/Gravadora.class.php";

class ControleGravadora{
	
	public function inserir($dados){
		$gravadora = new Gravadora(null,$dados['nome'],$dados['numero']);
		$gravadora->inserir();
		header("location: /cds");
	}
	
	public function listarTodos(){
		$gravadora = new Gravadora();
		$gravadoras = $gravadora->listarTodos();
		return $gravadoras;
	}
	
	public function listarUm($id){
		$gravadora = new Gravadora($id,null,null);
		$gravadora->listarUm($id);
		return $gravadora;
	}
	

	
}

?>