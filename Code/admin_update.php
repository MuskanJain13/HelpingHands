<?php

	include('dbcs.php');
	global $conn;

	$id = $_POST['id'];
	$p_name = $_POST['pname'];
	$p_qty = $_POST['pqty'];
	$p_batch = $_POST['pbatch'];
	$p_manf = $_POST['pmanf'];
	$p_exp = $_POST['pexp'];
	$p_price = $_POST['pprice'];
	$p_desc = $_POST['pdesc'];
	//$p_qty = $_POST['pimg'];


	if(!empty($id) && !empty($p_name) && !empty($p_qty) && !empty($p_batch) && !empty($p_manf) && !empty($p_exp) && !empty($p_price) && !empty($p_desc)){

		$query = "UPDATE `product` SET `pro_name`= '$p_name', `pro_quantity`= '$p_qty', `batch_no`= '$p_batch' ,`manf_date`= '$p_manf' ,`exp_date`= '$p_exp' ,`descrip`= '$p_desc' ,`pro_price`= '$p_price' WHERE pro_id='$id'";
		
		if (!$result = mysqli_query($conn, $query)) {
			exit(mysqli_error($conn));
		}
		echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">1 Record updated!</div>';
	}else{
		echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-danger">error while updating record</div>';
	}

?>