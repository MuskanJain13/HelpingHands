<?php
	session_start();
	if(isset($_SESSION['username']) && $_SESSION['username'] = 'Admin13'){
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Staff Management</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<style>
			<?php
				include('staff_admin_style.css');
			?>
		</style>
	</head>
	<body>
		
		<?php
			include('header.php');
		?>
		
		<div id="staff">
			<a id="product" style="text" href="product_admin.php">Products</a>
			Staff
		</div>
		
		<div id="add_div">
			Add New Staff
		</div>
		<div id="add_div_content">
			
			<div id="form">
					
				<table style="margin-left: 30px; float: left">
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="s_name" name="s_name" placeholder="Staff name" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="s_id" name="s_id" placeholder="Staff id" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="number" id="s_cont" name="s_cont" placeholder="contact" min="1" required></td></tr>
				</table>

				<table style="margin-left: 50px; float: left">
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="s_add" name="s_add" placeholder="Address" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="int" id="v_no" name="v_no" placeholder="Vehicle number" required><br><br></td></tr>
					
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
			
			$.get("admin_staff_view.php", function(data) {
				$("#data").html(data);
			});
		

			$('#ok').click(function() {
				var name = $('#s_name').val();
				var id = $('#s_id').val();
				var cont = $('#s_cont').val();
				var add = $('#s_add').val();
				var v_no = $('#v_no').val();

			$.ajax({
				url: "admin_addstaff.php",
				type: "POST",
				data: {
					sname: name,
                    sid: id,
					scont: cont,
					sadd: add,
					sv_no: v_no
					
			  },
			  success: function(data) {
                  $('#s_name').val('');
				  $('#s_id').val();
				  $('#s_cont').val();
				  $('#s_add').val('');
				  $('#v_no').val();
	
				$.get("admin_staff_view.php", function(html) {
					$("#data").html(html);
				});

			  },
		/*	  error: function() {
				  $('#records_content').fadeIn().html('<div class="text-center">error here</div>');
			  },
			  beforeSend: function() {
				  $('#records_content').fadeOut().html('<div class="text-center">Loading...</div>');
			  }, */
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