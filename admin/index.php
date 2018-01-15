<?php 
include '../config.php'; 
include '../functions/Logged.func.php';

if(logged() == true){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<div class="body row">
	<section class="sidenav">
		<ul>
			<a href="sair"><li><i class="fa fa-close"></i>Sair</li></a>
			<a href="home"><li><i class="fa fa-home"></i>Dashboard</li></a>
			<a href=""><li><i class="fa fa-database"></i>Cadastro</li></a>
			<a href=""><li><i class="fa fa-wrench"></i>Gestão</li></a>
			<a href=""><li><i class="fa fa-users"></i>Usuários</li></a>
			<a href=""><li><i class="fa fa-cogs"></i>Editar Site</li></a>
		</ul>
	</section>
	<section class="content" id="conteudo">
		
	</section>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/painel.js"></script>
</body>
</html>

<?php
}else{
	header('location: login.php');
}
?>