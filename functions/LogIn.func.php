<?php  
namespace functions;
include '../autoload.php';

use classes\User;
	session_start();
	if(isset($_POST['form']) && ($_POST['form'] == 'logar') && (($_POST['username'] != '') && ($_POST['password'] != ''))){
		$response = array('success' => false);
		$username = $_POST['username'];
		$senha = $_POST['password'];
		$array = array($username,$senha);	
		

		function set($user,$array){
			$user->setUsername($array[0]);
			$user->setSenha($array[1]);
			return true;
		}

		$user = new User;
		$executeLogin = set($user,$array);
		
		if($executeLogin == true){
			$log = $user->login();
			$result = $log->rowCount();
			if($result == 1){
				$sessao = $log->fetch(\PDO::FETCH_ASSOC);
				$_SESSION['admin'] = $sessao;
				$response = array("success" => true, "user" => $_SESSION['admin']);
				
				die(json_encode($response));		
			}else{
				
				die(json_encode($response));	
			}
		}
		//$getLogin = array($user->getUsername(),$user->getSenha());
	}
?>