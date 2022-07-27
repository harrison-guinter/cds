<?php
include_once "Configuracao.inc.php";

class MySQL{
	
	private $connection;
	
	public function __construct(){
		$this->connection = new mysqli(HOST,USUARIO,SENHA,BANCO);
		$this->connection->set_charset("utf8");
	}
	public function __destruct(){
		mysqli_close($this->connection);
	}
	public function executa($sql){
		$result = $this->connection->query($sql);
		return $result;
	}
	public function consulta($sql){
		$link = mysqli_connect("localhost", "root", "", "cds");
		$result = $this->connection->query($sql);
		$item = array();
		$data = array();
		if (mysqli_query($link, $sql)) {
			while($item = mysqli_fetch_array($result)){
				$data[] = $item;
			}
		}
		return $data;
		}
	}
?>
