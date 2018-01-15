<?php 
include '../../config.php';
include ''.$path.'functions/Logged.func.php';
if(logged() == true){ ?>
<div class="row">
	<div class="">Estou na home bitch</div>
</div>
<?php }else{
	header('location: ../login.php');
} ?>