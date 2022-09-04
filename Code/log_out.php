<?php
	session_start();

	$url = $_SERVER['HTTP_REFERER'];

	unset($_SESSION['username']);
	unset($_SESSION['password']);
	echo $_SERVER['HTTP_REFERER'];
	echo "YOU have cleaned up the session";
	
	if(isset($url) && $url != 'http://localhost/WebDesign/admin.php' && $url != 'http://localhost/WebDesign/whole_history.php' && $url != 'http://localhost/WebDesign/user_history.php' && $url != 'http://localhost/WebDesign/product_admin.php' && $url != 'http://localhost/WebDesign/staff_admin.php') {
		
		 header('Location:'. $url);  
	
	}else{
		 header('Location: index.php');  
	}

?>