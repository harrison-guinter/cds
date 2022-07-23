<?php
require_once  $_SERVER['DOCUMENT_ROOT']."/cds/db/MySQL.class.php";

	class Estilo{
		private $idEstilo;
		private $identificacao;
		
		public function __construct($id = null, $identificacao = null){
			$this->id = $id;
			$this->identificacao = $identificacao;
		
		}
		
		public function getIdEstilo(){
			return $this->idEstilo;
		}
		
		public function setIdEstilo($idEstilo){
			$this->idEstilo = $idEstilo;
		}
		
		public function getIdentificacao(){
			return $this->identificacao;
		}
		
		public function setIdentificacao($identificacao){
			$this->identificacao = $identificacao;
		}
		
		
		public function inserir(){
			$con = new MySQL();
			$sql = "INSERT INTO estilo (identificacao) VALUES ('$this->identificacao')";
			$con->executa($sql);
		}
		
		public function listarTodos(){
			$con = new MySQL();
			$sql = "SELECT * FROM estilo";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$estilos = array();
				foreach($resultados as $resultado){
					$estilo = new Estilo();
					$estilo->setIdEstilo($resultado[0]);
					$estilo->setIdentificacao($resultado[1]);
					$estilos[] = $estilo;
				}
				return $estilos;
			}else{
				return false;
			}
		}
		
		public function listarUm($id){
			$con = new MySQL();
			$sql = "SELECT * FROM estilo WHERE id = $id";
			$resultado = $con->consulta($sql);
			if(!empty($resultado)){
					$this->identificacao = $resultado[0]['identificacao'];
					
			}else{
				return false;
			}
		}
		
	}
?>