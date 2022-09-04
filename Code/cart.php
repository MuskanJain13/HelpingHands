<?php
session_start();
include('dbcs.php');
global $conn;

if (isset($_SESSION['username']) && $_SESSION['username'] != ''){

?>

<html>
    <head>
        <title>Cart</title>
		<style>
			<?php 
				include('cart_style.css');
			?>
		</style>
    </head>
    <body>

		<?php
			include('header.php');
		?>
		
		<div style="height: 55px; border: 1px solid black;">
		
		</div>
        <div id="bg">
            <img src="cart.jpg" style="height: 518px; width: 1070px; opacity: 0.4; position: absolute">
            <div id="d-title">
				<p id="title">Shopping Cart</p>
			</div>
			<div id="d1">
                Items
            </div>
            <div id="d2">
                Quantity
            </div>
			<div id="d3">
                Price
            </div>
            <div id="d5">
                100% purchase protection and safety measures
            </div>
            <div id="d4">
            </div>
            <div id="display">
			</div>		
			
            <div id="form">
                <form method="post" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <table>
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="name" name="name" placeholder="Full name" required><br><br></td></tr>
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="cont" name="cont" placeholder="Contact number" required><br><br></td></tr>
                        <tr><td><input style="font: 12px Century Gothic;" type="text" id="add" name="add" placeholder="Address" required></td></tr>
                    </table>
					
					<?php
						$msg ='';
						if(isset($_POST['ok']) && !empty($_POST['name']) && !empty($_POST['cont']) && !empty($_POST['add'])){

							$u_name = $_POST['name'];
							$u_cont = $_POST['cont'];
							$u_add = $_POST['add'];

							$sql = mysqli_query($conn,"UPDATE `user` SET `name` = '".$u_name."', `contact` = ".$u_cont.", `address` = '".$u_add."' WHERE `username` = '".$_SESSION['username']."'");
							
						}
					?>
					
					<button id="ok" name="ok" type="submit">Confirm Details</button>
                </form>
				
				<?php
						
							if(isset($_POST['ok'])){
						?>
					<button id="proceed" name="proceed" type="submit"><a style="color: darkblue; font: 14px century gothic;" href="payment.php">Proceed to BUY</a></button>	
					<?php	
					
							}
					?>
				
            </div>
            
        </div>

			<script type="text/javascript">
				
				$(document).ready(function() {

					$.get("display_cart.php", function(data) {
					$("#display").html(data);
					});

				});
				
  			</script>
		
    </body>
</html>

<?php
		}else{
			header('location:login.php');
		}
	
?>