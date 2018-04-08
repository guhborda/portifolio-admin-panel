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

	if((page != 'sair') && (page != "")){
		$.ajax({
			method:'GET',
			url:'../functions/includePage.func.php',
			data:{page:page},
			success: function(response){
				//console.log(response);
				//console.log('./view/'+response+'.php');
				$("#conteudo").load('./view/'+response);
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