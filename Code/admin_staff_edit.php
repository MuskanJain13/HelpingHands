<?php

	include('dbcs.php');
	global $conn;
	$id = $_POST['id'];

	if(empty($id)){
?>
		<div class="text-center">no records found under this selection <a href="#" onclick = "$('#add_div_content').hide();">Hide this</a></div>
<?php
		die();
	}

	$query = "SELECT * FROM staff where staff_id='$id'";
	
	if (!$result = mysqli_query($conn, $query)) {
		exit(mysqli_error($conn));
	}
	
	while($row = mysqli_fetch_assoc($result)){
	
?>
		<div id="edit_div_content">

			<div id="form">
				
			
				<table style="margin-left: 30px; float: left">
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="s_name" name="s_name" placeholder="Staff name" value="<?php echo $row['staff_name']; ?>" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="s_id" name="s_id" placeholder="Staff id"  value="<?php echo $row['staff_id']; ?>" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="number" id="s_cont" name="s_cont" placeholder="contact"  value="<?php echo $row['staff_cont']; ?>" required></td></tr>
				</table>

				<table style="margin-left: 50px; float: left">
					<tr><td><input style="font: 12px Century Gothic;" type="text" id="s_add" name="s_add" placeholder="Address" value="<?php echo $row['staff_add']; ?>" required><br><br></td></tr>
					<tr><td><input style="font: 12px Century Gothic;" type="int" id="v_no" name="v_no" placeholder="Vehicle number" value="<?php echo $row['vehicle_no']; ?>" required><br><br></td></tr>
					
				</table>

	

					<button  id="<?php echo $row["staff_id"]; ?>" class="ok" name="ok" type="button">Update Details</button>


			</div>

		</div>

<?php
		}
?>

<script type="text/javascript">
	$('.ok').click(function() {
		var id = $(this).attr('id');
		var name = $('#s_name').val();
		var cont = $('#s_cont').val();
		var add = $('#s_add').val();
		var vehicle = $('#v_no').val();
	

		$.ajax({
			url: "admin_staff_update.php",
			type: "POST",
			data: {
				sid: id,
				sname: name,
				scont: cont,
				sadd: add,
				svehicle: vehicle
			
			
			},
			success: function(data, status, xhr) {

				  $('#s_name').val('');
				  $('#s_cont').val();
				  $('#s_add').val();
				  $('#v_no').val();
				 
			//	$('#records_content').fadeOut(1).html(data);
				$.get("admin_staff_view.php", function(html) {
				$("#data").html(html);
				});
			//	$('#records_content').fadeOut(1).html(data);
			},
			complete: function() {
			$('#add_div_content').hide();
			}
		});
	}); // update close
</script>