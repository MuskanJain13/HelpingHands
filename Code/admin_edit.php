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

	$query = "SELECT * FROM product where pro_id='$id'";
	
	if (!$result = mysqli_query($conn, $query)) {
		exit(mysqli_error($conn));
	}
	
	while($row = mysqli_fetch_assoc($result)){
	
?>
		<div id="edit_div_content">

			<div id="form">
				
					<table style="margin-left: 30px; float: left">
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="id" name="id" placeholder="Product Id" value="<?php echo $row['pro_id']; ?>" required><br><br></td></tr>
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="name" name="name" placeholder="Product Name" value="<?php echo $row['pro_name']; ?>" required><br><br></td></tr>
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="qty" name="qty" placeholder="Quantity" value="<?php echo $row['pro_quantity']; ?>" required></td></tr>
					</table>

					<table style="margin-left: 50px; float: left">
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="batch" name="batch" placeholder="Batch No." value="<?php echo $row['batch_no']; ?>" required><br><br></td></tr>
						<tr><td><input style="font: 12px Century Gothic;" type="date" id="manf" name="manf" placeholder="Manufacture Date" value="<?php echo $row['manf_date']; ?>" required><br><br></td></tr>
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="exp" name="exp" placeholder="Expiry Date (dd/mm/yy)" value="<?php echo $row['exp_date']; ?>" required></td></tr>
					</table>

					<table style="margin-left: 50px; float: left">
						<tr><td><input style="font: 12px Century Gothic;" type="text" id="price" name="price" placeholder="Price" value="<?php echo $row['pro_price']; ?>" required><br><br></td></tr>
						<tr><td><textarea style="font: 12px Century Gothic;" id="desc" name="desc" placeholder="Product Description" required><?php echo $row['descrip']; ?></textarea><br><br></td></tr>
					<!--	<tr><td><input style="font: 12px Century Gothic;" type="file" id="img" name="img" placeholder="Image" value="<?php // echo $row['img']; ?>" ></td></tr> -->
					</table>

					<button  id="<?php echo $row["pro_id"]; ?>" class="ok" name="ok" type="button">Update Details</button>


			</div>

		</div>

<?php
		}
?>

<script type="text/javascript">
	$('.ok').click(function() {
		var id = $(this).attr('id');
		var name = $('#name').val();
		var qty = $('#qty').val();
		var batch = $('#batch').val();
		var manf = $('#manf').val();
		var exp = $('#exp').val();
		var price = $('#price').val();
		var desc = $('#desc').val();
		//var img = $('#img').val();

		$.ajax({
			url: "admin_update.php",
			type: "POST",
			data: {
				id: id,
				pname: name,
				pqty: qty,
				pbatch: batch,
				pmanf: manf,
				pexp: exp,
				pprice: price,
				pdesc: desc
				//pqty: password
			
			},
			success: function(data, status, xhr) {

				  $('#name').val('');
				  $('#qty').val();
				  $('#batch').val();
				  $('#manf').val();
				  $('#exp').val();
				  $('#price').val();
				  $('#desc').val();
				  //$('#img').val();

			//	$('#records_content').fadeOut(1).html(data);
				$.get("admin_view.php", function(html) {
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