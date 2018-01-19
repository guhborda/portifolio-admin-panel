<?php 
namespace functions;
use sys\Conexao;
class Painel
{
	public static function listarUsersOnline(){
		$con = new Conexao;
		self::limparUsersOnline($con);
		
		$online = $con->query("SELECT * FROM online");
		
		return $online->fetchAll();
		
	} 
	public static function limparUsersOnline($con){
		$data = date('Y-m-d H:i:s'); 
		$sql = "DELETE FROM online WHERE ultima_acao < '$data' - INTERVAL 1 MINUTE ";
		$con->query($sql);
			
			
		
	}
}

 ?>