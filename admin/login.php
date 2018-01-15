<?php  
include '../functions/Logged.func.php';
if(logged() != true){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Painel</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body class="login">
	<div class="box-login">
		<h4>Log In</h4>
		<a href="../index.php"><i class="fa fa-angle-left"></i></a>
		<form class="row">
			<div class="input-group col-md-12 username">
			  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
			  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" id="username" autocomplete="off">
			</div>
			<div class="input-group col-md-12 senha">
			  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
			  <input type="password" class="form-control" placeholder="Senha" aria-describedby="basic-addon1" id="password" autocomplete="off">
			</div>
			
			  <button class="btn btn-default"><span class="fa fa-sign-in" aria-hidden="true"></span>Entrar</button>
			  
			
		</form>
		<div class="loading">
			</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
	function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

// Usage!

	$('form').submit(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		var form = 'logar';
		if(username == '' && password == ''){
			$('.username, .senha').css({'border': '1px solid #00b388'});
			$('.username, .senha').css({'border': '1px solid red'});
			$('.username .input-group-addon,.senha .input-group-addon').css({'color': 'red'});
		}else if(username == '')
			{
				$('.username, .senha').css({'border': '1px solid #00b388'});
				$('.username .input-group-addon,.senha .input-group-addon').css({'color': '#00b388'});
				$('.username').css({'border': '1px solid red'});
				$('.username .input-group-addon').css({'color': 'red'});
				
			}else if(password == ''){
				
				$('.username, .senha').css({'border': '1px solid #00b388'});
				$('.username .input-group-addon,.senha .input-group-addon').css({'color': '#00b388'});
				$('.senha').css({'border': '1px solid red'});
				$('.senha .input-group-addon').css({'color': 'red'});
			}else{

				$('.username, .senha').css({'border': '1px solid #00b388'});
				$('.username .input-group-addon,.senha .input-group-addon').css({'color': '#00b388'});
				$('.loading').append('<div class="loading"><div class="anim-wrap"><div class="anim-inner"><span class="bubble"></span><span class="bubble"></span><span class="bubble"></span></div></div></div>');
				sleep(700).then(()=>{
				$.ajax({
					 	method:'POST',
					  	url:'../functions/Login.func.php',
					  	dataType:'JSON',
					 	data:{ 
					 		username: username,
					  		password: password,
					  		form: form
						},
						
						success: function(response){
							if(response.success == true){
								$(location).attr('href','index.php');
							}else{
								$('.username, .senha').css({'border': '1px solid #00b388'});
									$('.username, .senha').css({'border': '1px solid red'});
									$('.username .input-group-addon,.senha .input-group-addon').css({'color': 'red'});
								sleep(0).then(()=>{
									$('.loading').html('<div class="alert alert-danger"> Usuário ou senha incorretos</div>');
								});
								sleep(1500).then(() => {
									$('.loading').html('');
								});
								
							}
						}
			
					});
				});
			}
		return false;
	});
		
</script>
</body>
</html>
<?php
	}else{
		header('Location: index.php');
	}

?>