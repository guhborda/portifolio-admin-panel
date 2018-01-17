$(function(){

	$.ajax({
		url:'controller/indexController.php',
		dataType:'JSON',
		success:function(response){

			//site configs
			$('head title').append(response.site_title);
			//puting section 1

				//profile image
				$('.box-page-1 .top-pic').append('<img src="uploads/'+response.sec1_pic+'">');
				//name top
				$('.top-about h3').append(response.sec1_name1+'<span>'+response.sec1_name2+'</span>');
				//sec1 social icons
				for( var i=0; i < response.sec1_social.length;i++){
					var social = response.sec1_social;
					$('.box-page-1 .top-about .social ul').append('<a href="'+social[i]['social_url']+'"><li><i class="fa fa-'+social[i]['social_name']+'"></i></li></a>');
				}

				//sec1 resume
				$('.top-about .top-text p').append(response.sec1_txt);

				//sec2 

				$('.box-page-2 p').append(response.sec2_nametxt);
				$('.box-page-2 .pic').append('<img src="uploads/'+response.sec2_pic+'">');
		}
	});
});