<?php 
require_once '../config.php';
if(isset($_GET['page']) && $_GET['page'] != ''){
	$page = $_GET['page'];
	if(file_exists($path.'/'.'view/'.$page.'.php')){
		die($page);
	}else{
		die('home');
	}
	
}else{
	die('home');
}


 ?>