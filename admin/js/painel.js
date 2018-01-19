$(document).ready(function(){
	init();
	$('.sidenav ul a').click(function(e){
		e.preventDefault();
		var page = $(this).attr('href');
		getPage(page);
		return false;
	});

});

function init(){
	$("#conteudo").load('./view/home.php');
}
function getPage(page){

	if(page != 'sair'){
		$.ajax({
			method:'GET',
			url:'../functions/includePage.func.php',
			dataType:'text',
			data:{page:page},
			success: function(response){
				
				$("#conteudo").load('./view/'+response+'.php');
			}
		});
	}else if( page == 'sair'){
		$.ajax({
			method:'GET',
			url:'../functions/LogOut.func.php',
			dataType:'text',
			data:{page:page},
			success: function(response){
				
				location.reload();
			}
		});
	}
}