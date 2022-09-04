<?php
	session_start();
    include('dbcs.php');
    //$result = mysqli_query($conn,"SELECT * FROM product");
?>
<!DOCTYPE html>
<html>
     <head>
        <title> Household</title>
		 <style>
			<?php 
				include('household_style.css');
			?>
		</style>

     </head>
	<body>
		
		<?php
			include('header.php');
		?>
		<div id="bg">
			<p id="title">Household Products</p>
		</div>
		
		<div id="display">
		</div>		
		
		<script type="text/javascript">
			$(document).ready(function() {

				$.get("display_products.php", function(data) {
					$("#display").html(data);
				});

			});
  		</script>

     </body>
</html>