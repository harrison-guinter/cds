<?php
require_once  $_SERVER['DOCUMENT_ROOT']."/cds/db/MySQL.class.php";

	class Artista{
		private $idArtista;
		private $nome;
		
		
		public function __construct($idArtista = null, $nome = null){
			$this->idArtista = $idArtista;
			$this->nome = $nome;
			
		}
		
		public function getIdArtista(){
			return $this->idArtista;
		}
		
		public function setIdArtista($idArtista){
			$this->idArtista = $idArtista;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		
		public function inserir(){
			$con = new MySQL();
			$sql = "INSERT INTO artista (nome) VALUES ('$this->nome')";
			$con->executa($sql);
		}
		
		public function listarTodos(){
			$con = new MySQL();
			$sql = "SELECT * FROM artista";
			$resultados = $con->consulta($sql);
			if(!empty($resultados)){
				$artistas = array();
				foreach($resultados as $resultado){
					$artista = new Artista();
					$artista->setIdArtista($resultado['idArtista']);
					$artista->setNome($resultado['nome']);
					$artistas[] = $artista;
				}
				return $artistas;
			}else{
				return false;
			}
		}

		public function buscarIdsPeloNome($nome) {
			$con = new MySQL();
			$sql = "SELECT idArtista FROM artista WHERE nome LIKE '%".$nome."%'";
			$result = $con->executa($sql);
			if(!empty($result)){
				$ids = array();
				foreach($result as $resultado){
					$artista = new Artista();
					$artista->setIdArtista($resultado['idArtista']);
					$artistas[] = $artista;
				}
				return $artistas;
				
			
			} else {
				return false;
			}
		}
		
		
	}
?>