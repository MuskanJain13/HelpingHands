<?php
include('dbcs.php');
global $conn;


$p_id = $_POST['pid'];
$p_name = $_POST['pname'];
$p_qty = $_POST['pqty'];
$p_batch = $_POST['pbatch'];
$p_manf = $_POST['pmanf'];
$p_exp = $_POST['pexp'];
$p_price = $_POST['pprice'];
$p_desc = $_POST['pdesc'];
//$p_qty = $_POST['pimg'];


if(!empty($p_id) && !empty($p_name) && !empty($p_qty) && !empty($p_batch) && !empty($p_manf) && !empty($p_exp) && !empty($p_price) && !empty($p_desc)){
	
	$sql = "INSERT INTO `product`(`pro_id`, `pro_name`, `pro_quantity`, `batch_no`, `manf_date`, `exp_date`, `descrip`, `pro_price`) VALUES ('$p_id', '$p_name', '$p_qty', '$p_batch', '$p_manf', '$p_exp', '$p_desc', '$p_price')";
	
	
	if (mysqli_query($conn, $sql)) {
	  	echo "New record created successfully";
	}else {
	  	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}