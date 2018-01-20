<?php  
session_start();
	include 'autoload.php'; 
	use sys\Conexao;
	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_SESSION['online'])){
		$token = $_SESSION['online'];

		$currentTime = date('Y-m-d H:i:s');
		$con = new Conexao;
		$check = $con->query("SELECT * FROM online WHERE token = ?",array($token));

		if($check->rowCount() == 1){
			$con->query("UPDATE `online` SET ultima_acao = ? WHERE token = ?",array($currentTime,$token));
		}else{
			$token = $_SESSION['online'];
			$currentTime = date('Y-m-d H:i:s');
			$con = new Conexao;
			$con->query("INSERT INTO `online` VALUES (?,?,?)",array($token,$currentTime,$ip));
		}
		
	}else{
		$_SESSION['online'] = uniqid();
		$token = $_SESSION['online'];
		$currentTime = date('Y-m-d H:i:s');
		$con = new Conexao;
		$con->query("INSERT INTO `online` VALUES (?,?,?)",array($token,$currentTime,$ip));
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Gustavo Borda">
	<meta name="description" content="Portifólio pessoal de Gustavo Borda">
	<meta name="keywords" content="Portifólio, Dev Web, programador, PHP, Web Design, Web Developer">
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body >
	<header>
		<nav>
			<a class="navbar-toggle"></a>
			<ul class="navbar">
				<li class="active"><a href="#about">Sobre</a></li>
				<li><a href="#skills">Portifólio</a></li>
				<li><a href="">Contato</a></li>
			</ul><!--END UL -->
		</nav><!-- END NAV -->
	</header>
	<div class="container">
		<section class="box box-page-1 about" data-anime="bottom" id="resume">
			<div class="box-inner row">
				<div class="col-md-6 top-pic inner-box"></div>
				<div class="col-md-6 inner-box top-about">

					<h3></h3>
					<div class="social"><ul>
						
					
						</ul>
					</div>
					<div class="top-text">
						<p></p>
					</div>
					<div class="group-btn">
						<a class="btn contact">Ver Mais</a>
						<a class="btn hire">Contato</a>
					</div>
					<div class="pattern" style="opacity: .7; z-index: 3; width: 200%;
    height: 200%;"><img src="img/pattern/pattern.png"></div>
					<div class="pattern" style="opacity: .1; z-index: 2;"><img src="img/pattern/concrete-texture.png"></div>
					<div class="pattern" style="opacity: .2; z-index: 1;"><img src="img/pattern/vintage-concrete.png"></div>
					<div class="top-svg"><img src="img/pattern/svg.png"></div>
				</div>
			</div>
		</section>
		<section class="box box-page-2" data-anime="bottom" id="about">
			<div class="box-inner row">
				<h3>About Me</h3><div class="col-md-6 inner-box"><p></p></div><div class="col-md-6 inner-box sec2pic"></div>
			</div>
		</section>

		<section class="box box-page-3" data-anime="bottom" id="skills">
			<div class="box-inner row">
				<h3>Skills</h3>
				<div class="col-md-6 inner-box">
					<div class="school row">
						
					</div>
				</div>
				<div class="col-md-6 inner-box">
					<div class="skills row">
						
					</div>
				</div>
			</div>
		</section>
		<section class="box box-page-4" data-anime="bottom" id="portifolio">
			<h3>Projetos</h3>
			<div class="box-inner">
				<div class="filter">
					<span>Filter by:</span>
					<div class="filter-item"><input type="submit" name=""></div>
					<div class="filter-item"><input type="submit" name=""></div>
				</div>
				<div class="conteudo">
					<div class="previous"><p> <i class="fa fa-angle-left"></i> </p></div>
					<div class="slider">
					  
					  <div class="content_slider">
					    <div class="item"></div>
					    <div class="item"></div>
					    <div class="item"></div>
					    <div class="item"></div>
					    <div class="item"></div>
					    <div class="item"></div>
					    <div class="item"></div>
					    <div class="item"></div>
					    <div class="item"></div>
					     
					  </div>

					</div>
					    <div class="next"><p><i class="fa fa-angle-right"></i></p></div>
				</div>
			</div>
		</section>
	</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/loadIndex.js"></script>
</body>
</html>