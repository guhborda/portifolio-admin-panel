<?php 

namespace classes;

use sys\Conexao;
use sys\Config;

class User{
	private $id;
	private $username;
	private $senha;

	public function __construct(){

	}


	public function setId($id){
		$this->id = $id;
	}

	public function setUsername($username){
		$this->username = $username;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getId(){
		return $this->id;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getSenha(){
		return $this->senha;
	}

	public function login(){
	$con = new Conexao;
	//WHERE username = ? and usersenha = ? 
	$sql = "SELECT * FROM usuario WHERE username = ? AND usersenha = ?";
		$query = $con->query($sql,array($this->username,$this->senha));
		if($query){
			return $query;
		}else{
			$error = "não foi possivel consultar";
			return $error;
		}

	}

}

 ?>