<?php
session_start();

require_once('dbcs.php');
global $conn;

$result= mysqli_query($conn,"SELECT p.pro_id, p.img, p.pro_name, c.qty, p.pro_price from product p, cart c where p.pro_id = c.pro_id and c.username = '".$_SESSION['username']."'");

?>

<div id="data">

	<?php

		$sub_total = 0;
		$total = 0;
		$item_count = 0;
		$_SESSION['count'] = mysqli_num_rows($result);
	
		if (mysqli_num_rows($result) > 0) {

				$i = 0;

				while($row = mysqli_fetch_array($result)) {
			?>
				<div class="product">
					<input id="user" readonly type="hidden" value="<?php echo $_SESSION['username']; ?>">
					<div class="image"><img src="<?php echo $row["img"]?>" width="60" height="60"></div>
					<div class="pro_info">
						<div class="name"><?php echo $row["pro_name"]; ?></div>
						<div class="qty"><?php echo $row["qty"]; ?></div>
						<div class="price"><label id="rupee">₹</label><?php echo $row["pro_price"]; ?></div>
					</div>
					<div class="remove"><img id="<?php echo $row["pro_id"]; ?>" style="height: 35px; width: 35px; cursor: pointer;" onclick="deletePro(this.id)" src="remove-shopping-cart.png"></div>
				</div> <br>

				<?php
					$sub_total = $row["qty"] * $row["pro_price"];

					$total = $total + $sub_total;    // Sum of all the sub-total prices.
					
					$_SESSION['amount'] = $total;
					
					$GLOBALS['item_count'] = $GLOBALS['item_count'] + $row['qty'];
					
					$i++;
				}
		}
		else{
			?>
			<label id="cart-msg">Your cart is empty<br><br>Have a nice day!</label>
	<?php		
		}
	?>

</div>

<div id="d6" style="
    height: 100px;
    width: 310px;
    position: absolute;
    margin-top: 355px;
    margin-left: 734px;
    border: 0px solid black;
	text-align: right;
	font: 13px century gothic;
	line-height: 2.2;">
	Part of your order qualifies for FREE Delivery.<br>
	Click on 'Proceed to buy'! <br>
	Subtotal (<?php echo $GLOBALS['item_count'];?> items):   <label id="total-price"><?php echo "₹ ".$total; ?></label>
</div>


<script type="text/javascript">
	function deletePro(id) {
		var product_id = id;
		var usern = $('#user').val();

	   $.ajax({
			  url: "delete_pro.php",
			  type: "POST",
			  data: {
				id: product_id,
				username: usern
			  },
			   success: function(data) {
				$.get("display_cart.php", function(data) {
					$("#display").html(data);
				});
			}
	});
	} // deleteProduct close

</script>