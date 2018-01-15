<?php 
session_start();
function logged()
{
	if(isset($_SESSION['admin'])){
		return true;
	}else{
		return false;
	}
}


 ?>