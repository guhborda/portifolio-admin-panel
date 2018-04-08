<?php 
require_once '../config.php';
if(isset($_GET['page']) && $_GET['page'] != ""){
	$page = $_GET['page'];
	if(file_exists($path.'admin/view/'.$page.'.php')){
		echo $page.'.php';
	}else{
		echo '404.php';
		//echo $page;
	}
	
}else{
	echo $page;
}


 ?>