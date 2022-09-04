<?php

	include('dbcs.php');
	global $conn;

	$s_id = $_POST['sid'];
	$s_name = $_POST['sname'];
	$s_cont = $_POST['scont'];
	$s_add = $_POST['sadd'];
	$s_vehicle = $_POST['svehivle'];



	if(!empty($s_id) && !empty($s_name) && !empty($s_cont) && !empty($s_add) && !empty($s_vehicle)){

		$query = "UPDATE `staff` SET `staff_name`= '$s_name', `staff_cont`= '$s_cont', `staff_add`= '$s_add' ,`vehicle_no`= '$s_vehicle' WHERE staff_id='$s_id'";
		
		if (!$result = mysqli_query($conn, $query)) {
			exit(mysqli_error($conn));
		}
		echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">1 Record updated!</div>';
	}else{
		echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-danger">error while updating record</div>';
	}

?>