<?php

	include('dbcs.php');
	global $conn;

	$query = mysqli_query($conn, "SELECT * FROM product order by pro_id");

?>

<head>
	<style>
		<?php 
			include('admin_view_style.css');
		?>
	</style>

</head>
	<table id="table_pro">
		<tr class="pro">
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Id</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Product Name</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Quantity</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Batch No.</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Manf. Date</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Exp. Date</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Price</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Description</th>
			<th colspan="2" style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Modify</th>
		</tr>

		
		<?php
			
				if(!empty($query)){
					while($row = mysqli_fetch_array($query)){
			
				?>			
					<tr class="pro" style="border-bottom: 2px solid darkblue;">
						<td id="a_id"><?php echo $row['pro_id']; ?></td>
						<td id="a_name"><?php echo $row['pro_name']; ?></td>
						<td id="a_qty"><?php echo $row['pro_quantity']; ?></td>
						<td id="a_batch"><?php echo $row['batch_no']; ?></td>
						<td id="a_manf"><?php echo $row['manf_date']; ?></td>
						<td id="a_exp"><?php echo $row['exp_date']; ?></td>
						<td id="a_price"><?php echo $row['pro_price']; ?></td>
						<td id="a_desc"><?php echo $row['descrip']; ?></td>
						<td style="background-color: white;" id="edit"><img id="<?php echo $row["pro_id"]; ?>" style="height: 20px; margin-bottom: 20px; width: 20px; cursor: pointer;" onclick="editData(this.id)" src="edit.png"></td>
						<td style="background-color: white;" id="remove"><img id="<?php echo $row["pro_id"]; ?>" style="height: 20px; margin-bottom: 20px; width: 20px; cursor: pointer;" onclick="deleteData(this.id)" src="x-button.png"></td>
					</tr>	
						
				<?php	
						
					}
				}
		?>
		
		
	</table>

	
	
	
	
	<script type="text/javascript">
        function deleteData(ids) {

            var id = ids;
            $.ajax({
                url: "admin_deletepro.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $.get("admin_view.php", function(data) {
                        $("#data").html(data);
                    });
                }
            });
        } // delete close

        function editData(ids) {
            var id = ids;
            $.ajax({
                url: 'admin_edit.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $("#add_div_content").html(data);
                    $('#add_div_content').show();
                }
            });
        } // edit close
    </script>