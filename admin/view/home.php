<?php 
include '../../autoload.php';
use functions\Painel;
include '../../config.php';
include ''.$path.'functions/Logged.func.php';
$usersOnline= Painel::listarUsersOnline();
if(logged() == true){ ?>
<div class="row">
	<div class="col-md-4"><h3>Usuários Online</h3>
	<?php echo count($usersOnline); ?> 
	</div>
	<div class="col-md-4"><h3>Visitas Hoje</h3>
		</div>
	<div class="col-md-4"><h3>Visitas Totais</h3></div>
	<div class="col-md-12">
		<h3>Usuários Online</h3>
		<table>
			<thead>
				<tr>
					<th>IP</th>
					<th>Ultima Ação</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>299.199.1.99</th>
					<th>20/15/2018 18:55</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php }else{
	header('location: ../login.php');
} ?>