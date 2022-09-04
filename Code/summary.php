<?php
session_start();
include('dbcs.php');
global $conn;

if (isset($_SESSION['username']) && $_SESSION['username'] != ''){

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Summary</title>
        <style>
			<?php
				include('summary_style.css');
			?>
		</style>
    </head>
    <body>
         <?php
			include('header.php');
		 ?>
		
        <div id="image1">
            <img src="simg1.jpg" style="width: 1070px; height: 511px; position: absolute; opacity: 0.6">
        </div>
        <div id="txt1">
            Hello <?php echo $_SESSION['username']; ?>,<br>
            Thanks for shopping with us. We hope that your experience with us has been great and we hope that 
            you will become our regular customer. We apologise for any inconvinience. Stay safe... Stay at home!
        </div>
		
		<?php
				$sql = mysqli_query($conn, "Select order_id, delivery_date, address from order_summary o, user u where o.username = u.username and o.username = '".$_SESSION['username']."'");
				
				if(!empty($sql)){
					
					while($row = mysqli_fetch_array($sql)){
		?>
								
        <div id="txt2">
            ORDER CONFIRMATION
            <br><br>
            order id - <?php echo $row['order_id']; ?>
        </div>
        <div id="hr1">
        </div>
        <div id="bg">
        </div>
        <div id="txt3">
            Your order has been shipped
            <br><br>
            Your estimated delivery date is: <br>
            <?php echo $row['delivery_date']; ?>
			<br><br>
            Your shipping speed - 
            Standard shipping.
        </div>
        <div id="txt4">
            Your order will be sent to -  <br>
			<?php echo $row['address']; ?>
        </div>
		
		
		<?php
				}
			}
		?>
						
        <div id = "bu1">
            <button class="b1" type="button" style="height: 30px; width: 135px; position: absolute">Track your order</button>
        </div>
        <div id = "bu2">
            <button class="b2" type="button" style="height: 30px; width: 115px; position: absolute">Replace order</button>
        </div>
        <div id = "bu3">
            <button class="b3" type="button" style="height: 30px; width: 115px; position: absolute">Cancel order</button>
        </div>
        <div id="hr2">
        </div>
		
        <div id="sub_total">
            Sub Total: <?php echo $_SESSION['amount']; ?>
        </div>
    </body>
</html>
	
<?php
		}else{
			header('location: index.php');
		}
?>