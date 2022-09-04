<?php

	session_start();
	
	include('dbcs.php');
	global $conn;

	if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
?>

<html>
    <head>
        <title>Process payment</title>
        <style>
            <?php include('payment_style.css'); ?>
        </style>
    </head>
    <body>
		
		<?php 
			$sql = mysqli_query($conn, "Select wallet from user where username = '".$_SESSION['username']."'");
			
			if(!empty($sql)){
				while($row = mysqli_fetch_array($sql)){
		?>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <div id="bg">
            <div id="wallet">
                <p>Your wallet amount<br>Rs. <?php echo $row['wallet']; ?></p>
            </div>

			<?php
					
					$_SESSION['wallet'] = $row['wallet'];
					
				}
								
			}
																	
		?>
		
            <div id="heading">
                <h1>Process payment...</h1>
            </div>
            <div id="content">
                <p>Your cart subtotal is: <br> Rs. <?php echo $_SESSION['amount']; ?> </p>
            </div>
			
		<?php 	
			if($_SESSION['wallet'] > $_SESSION['amount']){
		?>	
				<button type="submit" name="p" id="pay">Make Payment</button>
		<?php
			}else{	
		?>
			<div id="msg">You don't have sufficient amount in your wallet...</div>
		<?php
				}
		?>
			
			
		</div>
			
			<input name="sub" id="sub_total" type="hidden" readonly value="<?php echo $_SESSION['amount']; ?>">
			<input name="us" id="user" type="hidden" readonly value="<?php echo $_SESSION['username']; ?>">
		</form>
		
		<?php
		
																
		//$date = DATEADD(day, 2, getdate());
																	
		//$user = $_SESSION['username'];
		
		if(isset($_POST['p']) && !empty($_POST['sub']) && !empty($_POST['us'])){
			
			$price = $_POST['sub'];
			$username = $_POST['us'];
			
			
			$query_insert = mysqli_query($conn, "INSERT INTO `order_summary`(`username`, `order_price`, `delivery_date`, `pay_option`) VALUES ('".$username."', '".$price."', now()+INTERVAL 3 DAY , 'wallet')");
			
			$new_wallet = $_SESSION['wallet'] - $_SESSION['amount'];
			
			$query_update = mysqli_query($conn, "UPDATE user set wallet = ".$new_wallet." where username = '".$_SESSION['username']."'");
			
			$run = mysqli_query($conn, "call delete_cart('".$_SESSION['username']."')");
			
			header('location: summary.php');

		}
																	
		
		
		?>
		
		
    </body>
</html>

<?php
		}
?>