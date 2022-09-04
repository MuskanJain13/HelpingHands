<?php
session_start();

require_once('dbcs.php');
global $conn;

$product= mysqli_query($conn,"SELECT * FROM product ORDER BY pro_id ASC");

?>

<html>
	<head>
		<title></title>
		<style>
			
			body {
				font: 15px Century gothic;
				color: #211a1a;
				background-color: #E1D5DF;
			}

			#product-grid {
				margin: 25px 63px;
				width: 940px;
				border: 0px solid black;
			  }

			#btnEmpty {
				background-color: #ffffff; border: #d00000 1px solid; padding: 5px 10px; color: #d00000; float: right; text-decoration: none; border-radius: 3px; margin: 10px 0px;
			}

			.btnAddAction {
				border: none; outline: 0; padding: 12px; color: white; background-color: #000; text-align: center; cursor: pointer; width: 73%; font: 18px century gothic; margin-left: 74px;
			}
			
			 .btnAddAction:hover{
				 opacity: 0.7; background-color: grey; color: white;
			 }

			.product-item {
				float: left; background-color: rgba(255,255,255, 0.8); border: #E0E0E0 1px solid; width: 280px; height: 390px; position: relative; margin: 0px 15px 50px 17px;
			}

			.product-image {
				height: 160px; width: 280px; margin-top: 15px; border: 0px solid black; position: absolute; text-align: center;

			}

			.product-title {
				margin-top: 30px;  position: absolute; font: 23px century gothic; width: 280px; text-align: center;
			}
			
			.product-desc {
				margin-top: 105px;  position: absolute; width: 280px; height: auto; text-align: center; padding: 10px 20px; border: 0px solid black; margin-bottom: 55px; font-size: 13px;
			}

			.product-price {
				font: 19px century gothic;  position: absolute; margin-top: 75px; text-align: center; width: 280px;
			}

			.cart-action {
				position: absolute; margin-top: 180px; border: 0px solid black; width: 280px; height: 49px;
			}
			
			.product-quantity {
				padding: 10px 10px 10px 16px; width: 73px; height: 47px; border-radius: 3px; border: #E0E0E0 1px solid; float: right; background-color: grey; color: white; position: absolute; font: 14px century gothic;
			}
			
			.product-quantity::placeholder{
				color: white;
			}

			.product-tile-footer {
				border: 0px solid black; margin-top: 160px; height: auto; width: 280px;  position: absolute; 
			}
			
			input{
				border: 0px solid black; width: auto;
			}
			
			#msg{
				margin-top: 180px; font: 12px century gothic; padding: 10px; text-align: center; width: 280px;  position: absolute;
			}
			#rupee{
				font-weight: 500; font: 22px century gothic; margin-right: 5px;
			}

			
		</style>
	</head>
	<body>
		
		<div id="product-grid">
			<?php
			if (!empty($product)) {
				while ($row=mysqli_fetch_array($product)) {
				?>
				<div class="product-item">
				<form method="post">
				<div class="product-image"><img style="height: 160px; width: 160px;" src="<?php echo $row["img"]; ?>"></div>
				<div class="product-tile-footer">
					<input id="user" readonly type="hidden" value="<?php echo $_SESSION['username']; ?>">
					<input id="id" readonly type="hidden" value="<?php echo $row["pro_id"]; ?>">
					<input id="proprice" readonly type="hidden" value="<?php echo $row["pro_price"]; ?>">
					<input id="proname" readonly type="hidden" value="<?php echo $row["pro_name"]; ?>">
					<div id="name" class="product-title"><?php echo $row["pro_name"]; ?> </div>
					<div id="desc" class="product-desc"><?php echo $row["descrip"]; ?></div>
					<div id="price" class="product-price"><?php echo "₹".$row["pro_price"]; ?></div>

					<?php 
						if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
					?>
							<div class="cart-action">
								<input id="qty_<?php echo $row["pro_id"]; ?>" type="number" class="product-quantity" min="1" name="quantity" placeholder="Qty." value="1" size="2" /><a href="cart.html">
								<input id="<?php echo $row["pro_id"]; ?>" type="submit" name="addC" value="Add to Cart" onclick="addProduct(this.id)" class="btnAddAction" /></a>
							</div>
					<?php
						}else{

							?>		
								<div id="msg">Please <a href="login.php">Login</a> or <a href="SignupForm.php">Sign Up</a> to buy the products.</div>
							<?php		

						}
					?>

				</div>

				</form>
				</div>

				<?php
				}
			} else {
			echo "No Records.";
			}
			?>
		</div>

		<script type="text/javascript">

			function addProduct(id) {
				var product_id = id;
				var quantity = $('#qty_'+product_id).val();
				var usern = $('#user').val();
				var pro_price = $('#proprice').val();
				var pro_name = $('#proname').val();

			   $.ajax({
					  url: "addpro.php",
					  type: "POST",
					  data: {
						id: product_id,
						qty: quantity,
						username: usern,
						price: pro_price,
						name: pro_name
					  },
				   success: function(response) {
					$.get("display_products.php", function(response) {
						$("#product-grid").html(response);
					});
				}
			});
			} // addProduct close



		</script>

		
	</body>
</html>

