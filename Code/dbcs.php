<?php
	
// This is php mysql connectivity string!
	
	$username = 'root';
	$password = '';
	$db_name = 'covid_solution';
	$host = 'localhost';
	$conn = mysqli_connect($host, $username, $password, $db_name);
	
	if($conn == false){
		echo "Connection Failed";
	}else{
		//echo "Connection Success";
	}

?>