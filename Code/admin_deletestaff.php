<?php

	include('dbcs.php');
	global $conn;

	$id = $_POST['id'];

	if(empty($id)){
		die();
	}

	// sql query to delete a record from cart table
	$sql = "DELETE FROM staff WHERE staff_id=".$id;

	if(mysqli_query($conn, $sql)) {
	  	echo "Record deleted successfully";
	} else {
	  	echo "Error deleting record: " . mysqli_error($conn);
	}

	mysqli_close($conn);

?>