<?php
			if (mysqli_num_rows($result) > 0) {
		?>
				<?php
					$i=0;
					while($row = mysqli_fetch_array($result)) {
				?>
					<div class="product">
						<form name="cart-form" style="font: Century Gothic;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
							<div class="image"><img src="<?php echo $row['img']?>" width="200" height="200"></div>
							<div class="pro_info">
								<div class="name"><?php echo $row["pro_name"]; ?></div>
								<div class="desc"><?php echo $row["descrip"]; ?></div>
							</div>
						</form>
					</div>
					<br><br>
					<div id="bu"><button class="addtocart" type="button">Add to Cart</button></div>
					<br><br>
				
				<?php
					$i++;
					}
				?>
		 <?php
			}
			else{
				echo "No result found";
			}
		?>
		<br><br>