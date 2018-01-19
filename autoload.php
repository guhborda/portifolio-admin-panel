<?php 
spl_autoload_register(function($class){
	$file = explode('\\',$class);
	if($file[0] == 'sys'){
		$sys = str_replace('\\','/',__DIR__."/$class".'.class.php');
	
		include($sys);
	}else if( $file[0] == 'classes'){

		$classes = str_replace('\\','/',__DIR__.'/'.'model/'."$class".'.class.php');
		
		include($classes);
	}else if( $file[0] == 'functions'){
		$functions = str_replace('\\','/',__DIR__.'/'."$class".'.func.php');
		include($functions);
	}

});
 ?>