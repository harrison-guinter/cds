<?php
include $_SERVER['DOCUMENT_ROOT']."/db/MySQL.class.php";

	class CD{
		private $id;
		private $titulo;
		private $ano;
		
		public function __construct($id = null, $titulo = null, $ano = null){
			$this->id = $id;
			$this->titulo = $titulo;
			$this->ano = $ano;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getTitulo(){
			return $this->titulo;
		}
		
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
		
		public function getAno(){
			return $this->ano;
		}
		
		public function setAno($ano){
			$this->ano = $ano;
		}
		
		public function inserir(){
			$con = new MySQL();
			$sql = "INSERT INTO cd (titulo,ano) VALUES ('$this->titulo','$this->ano')";
			$con->executa($sql);
		}
		
		public function listarTodos(){
			$con = new MySQL();
			$sql = "SELECT * FROM cd";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$cds = array();
				foreach($resultados as $resultado){
					$cd = new CD();
					$cd->setId($resultado['id']);
					$cd->setTitulo($resultado['titulo']);
					$cd->setAno($resultado['ano']);
					$cds[] = $cd;
				}
				return $cds;
			}else{
				return false;
			}
		}
		
		public function listarUm(){
			$con = new MySQL();
			$sql = "SELECT * FROM cd WHERE id = $this->id";
			$resultado = $con->consulta($sql);
			if(!empty($resultado)){
					$this->titulo = $resultado[0]['titulo'];
					$this->ano = $resultado[0]['ano'];
			}else{
				return false;
			}
		}
		
		public function excluir(){
			$con = new MySQL();
			$sql = "DELETE FROM cd WHERE id = $this->id";
			$con->executa($sql);
		}
		
		public function alterar(){
			$con = new MySQL();
			$sql = "UPDATE cd SET titulo = '$this->titulo', ano = '$this->ano' WHERE id = $this->id";
			$con->executa($sql);
		}
		
		
	}
?>