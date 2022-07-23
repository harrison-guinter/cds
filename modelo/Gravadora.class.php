<?php
require_once $_SERVER['DOCUMENT_ROOT']."/cds/db/MySQL.class.php";

	class Gravadora{
		private $idGravadora;
		private $identificacao;
		
		public function __construct($id = null, $identificacao = null){
			$this->id = $id;
			$this->identificacao = $identificacao;
		
		}
		
		public function getIdGravadora(){
			return $this->idGravadora;
		}
		
		public function setIdGravadora($idGravadora){
			$this->idGravadora = $idGravadora;
		}
		
		public function getIdentificacao(){
			return $this->identificacao;
		}
		
		public function setIdentificacao($identificacao){
			$this->identificacao = $identificacao;
		}
		
		
		public function inserir(){
			$con = new MySQL();
			$sql = "INSERT INTO gravadora (identificacao) VALUES ('$this->identificacao')";
			$con->executa($sql);
		}
		
		public function listarTodos(){
			$con = new MySQL();
			$sql = "SELECT * FROM gravadora";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$gravadoras = array();
				foreach($resultados as $resultado){
					$gravadora = new Gravadora();
					$gravadora->setIdGravadora($resultado[0]);
					$gravadora->setIdentificacao($resultado[1]);
					$gravadoras[] = $gravadora;
				}
				return $gravadoras;
			}else{
				return false;
			}
		}
		
		public function listarUm(){
			$con = new MySQL();
			$sql = "SELECT * FROM gravadora WHERE id = $this->id";
			$resultado = $con->consulta($sql);
			if(!empty($resultado)){
					$this->identificacao = $resultado[0]['identificacao'];
					
			}else{
				return false;
			}
		}
		
		public function excluir(){
			$con = new MySQL();
			$sql = "DELETE FROM gravadora WHERE id = $this->id";
			$con->executa($sql);
		}
		
		public function alterar(){
			$con = new MySQL();
			$sql = "UPDATE gravadora SET identificacao = '$this->identificacao', WHERE id = $this->id";
			$con->executa($sql);
		}
		
		
	}
?>