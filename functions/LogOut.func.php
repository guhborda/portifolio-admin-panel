<?php 

session_start();
if(isset($_GET['page']) && $_GET['page'] == 'sair'){
	session_destroy();
	session_unset();
}

 ?>