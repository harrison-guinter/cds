<?php

require_once $_SERVER['DOCUMENT_ROOT']."/cds/db/MySQL.class.php";

	class CD{
		public $id;
		public $titulo;
		public $ano;
		public $idGravadora;
		public $idArtista;
		public $idEstilo;
		
		public function __construct($id = null, $titulo = null, $ano = null,  $idGravadora = null, $idArtista = null, $idEstilo = null){
			$this->id = $id;
			$this->titulo = $titulo;
			$this->ano = $ano;
			$this->idGravadora = $idGravadora;
			$this->idArtista = $idArtista;
			$this->idEstilo = $idEstilo;
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
			$sql = "INSERT INTO cd (titulo, ano, gravadora_idGravadora, artista_idArtista, estilo_idEstilo) VALUES ('$this->titulo','$this->ano', '$this->idGravadora', '$this->idArtista', '$this->idEstilo')";
			  
			$con->executa($sql);
		}

		public function pesquisar($selectQuery){
			$con = new MySQL(); 
			$resultados = $con->consulta($selectQuery);
			if(!empty($resultados)){
				$cds = array();
				foreach($resultados as $resultado){
					// echo "<pre>"; print_r($resultado); "</pre>";
					
					$cd['id'] = $resultado[0];
					$cd['titulo'] = $resultado[1];
					$cd['ano'] = $resultado[2];
					$cd['idArtista'] = $resultado[3];
					$cd['idGravadora'] = $resultado[4];
					$cd['idEstilo'] = $resultado[5];

					$cds[] = $cd;
				}
				return $cds;
			}else{
				return false;
			}
		}

	
	}
?>