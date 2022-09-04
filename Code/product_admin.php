<?php
	session_start();
	if(isset($_SESSION['username']) && $_SESSION['username'] = 'Admin13'){
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Products Management</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<style>
			<?php
				include('product_admin_style.css');
			?>
		</style>
	</head>
	<body>
		
		<?php
			include('header.php');
		?>
		
		<div id="product">
			<a id="staff" style="text" href="staff_admin.php">Staff</a>
			PRODUCTS
		</div>
		
		<div id="add_div">
			Add New Product
		</div>
		<div id="add_div_content">
			
			<div id="form">
					
				<table style="margin-left: 30px; float: left">
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="id" name="id" placeholder="Product Id" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="name" name="name" placeholder="Product Name" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="qty" name="qty" placeholder="Quantity" required></td></tr>
				</table>

				<table style="margin-left: 50px; float: left">
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="batch" name="batch" placeholder="Batch No." required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="date" id="manf" name="manf" placeholder="Manufacture Date" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="exp" name="exp" placeholder="Expiry Date (dd/mm/yy)" required></td></tr>
				</table>

				<table style="margin-left: 50px; float: left">
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="price" name="price" placeholder="Price" required><br><br></td></tr>
					<tr><td><textarea style="font: 12px Century Gothic;" id="desc" name="desc" placeholder="Product Description" required></textarea><br><br></td></tr>
				<!--	<tr><td><input style="font: 12px Century Gothic;" type="file" id="img" name="img" placeholder="Image" ></td></tr> -->
				</table>

				<button  id="ok" name="ok" type="button">Add Details</button>

			</div>
			
			
		</div>
		
		<div id="data">
			
		</div>
		
		<div id="last">
			
		</div>
		
		
		
		<script> 
		$(document).ready(function(){
			$("#add_div").click(function(){
				$("#add_div_content").fadeToggle();
		  	});
			//$("#ok").click(function(){
			//	$("#add_div_content").fadeOut();
		  	//});
			
			$.get("admin_view.php", function(data) {
				$("#data").html(data);
			});
		

			$('#ok').click(function() {
				var id = $('#id').val();
				var name = $('#name').val();
				var qty = $('#qty').val();
				var batch = $('#batch').val();
				var manf = $('#manf').val();
				var exp = $('#exp').val();
				var price = $('#price').val();
				var desc = $('#desc').val();
				//var img = $('#img').val();

			$.ajax({
				url: "admin_addpro.php",
				type: "POST",
				data: {
					pid: id,
					pname: name,
					pqty: qty,
					pbatch: batch,
					pmanf: manf,
					pexp: exp,
					pprice: price,
					pdesc: desc
					//pqty: password
			  },
			  success: function(data) {
				  $('#id').val();
				  $('#name').val('');
				  $('#qty').val();
				  $('#batch').val();
				  $('#manf').val();
				  $('#exp').val();
				  $('#price').val();
				  $('#desc').val();
				  //$('#img').val();

				$.get("admin_view.php", function(html) {
					$("#data").html(html);
				});

			  },
			  complete: function() {
				  $('#add_div_content').fadeOut();
			  }
			});
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