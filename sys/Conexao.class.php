<?php 
namespace sys;
define('HOST','localhost');
define('DBNAME','portifolio');
define('DBUSER','root');
define('DBPASS','');
define('DBTYPE','mysql');

/**
* 
*/
class Conexao{
	
	private $pdo;
	private $stmt;
	private $error;
	public function __construct(){
		$dns = "mysql:host=".HOST.";dbname=".DBNAME;
		
		try{

			$this->pdo = new \PDO($dns,DBUSER,DBPASS);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->pdo->exec("set names utf8");
			return $this->pdo;
			
		}catch(PDOException $e){
			$this->error = 'Erro ao conectar ao banco'.$e->getMessage();	
			return $this->error;
		}
	}


	public function query($sql,$params = null){
		try{
			$this->stmt = $this->pdo->prepare($sql);
			$this->stmt->execute($params);
			return $this->stmt;
		}catch(Exception $e){

			$this->error = "Erro ao comunicar com o banco".$e->getMessage();
			return $this->error;

		}
	}

}



 ?>