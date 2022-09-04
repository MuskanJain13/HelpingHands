<?php
	session_start();
    if(isset($_SESSION['username']) && $_SESSION['username'] = 'Admin13'){
    
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Home</title>
		<style>
			<?php
				include('admin_style.css');
			?>
		</style>
	</head>
	<body>
		
		<?php
			include('header.php');
		?>
		
		<div id="hello">
			Hello Admin!
		</div>
		
		
		<div id="options">
			<a href="product_admin.php">
				<button class="pulse" id="pro">PRODUCTS</button>
			</a>

			<a href="staff_admin.php">
				<button class="pulse" id="staff">STAFF</button>
			</a>
			
		</div>
		
	</body>
</html>

<?php
    }else{
        header('location:login.php');
    }
?>