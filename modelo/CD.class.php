<?php

require_once $_SERVER['DOCUMENT_ROOT']."/cds/db/MySQL.class.php";

	class CD{
		private $id;
		private $titulo;
		private $ano;
		private $idGravadora;
		private $idArtista;
		private $idEstilo;
		
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
			$con->executa($selectQuery);
		}
		
	}
?>