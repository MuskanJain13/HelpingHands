<?php
include('dbcs.php');
global $conn;



$s_name = $_POST['sname'];
$s_id = $_POST['sid'];
$s_cont = $_POST['scont'];
$s_add = $_POST['sadd'];
$s_vno = $_POST['sv_no'];



if(!empty($s_name) && !empty($s_id) && !empty($s_cont) && !empty($s_add) && !empty($s_vno)){
	
	$sql = "INSERT INTO `staff`(`staff_name`, `staff_id`, `staff_cont`, `staff_add`, `vehicle_no`) VALUES ('$s_name', '$s_id', '$s_cont', '$s_add', '$s_vno')";
	
	
	if (mysqli_query($conn, $sql)) {
	  	echo "New record created successfully";
	}else {
	  	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}