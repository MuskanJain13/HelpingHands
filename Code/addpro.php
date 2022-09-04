<?php
require_once('dbcs.php');
global $conn;

$id = $_POST['id'];
$qty = $_POST['qty'];
$uname = $_POST['username'];
$price = $_POST['price'];
$name = $_POST['name'];

if(!empty($id) && !empty($qty))
{
$query ="INSERT into cart (pro_id, qty, username, proname, price) VALUES ('$id','$qty', '$uname', '$name', '$price')";

if (mysqli_query($conn, $query)) {
  	echo "New record created successfully";
	header('location:household.php');
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
}