<?php

	include('dbcs.php');
	global $conn;

	$query = mysqli_query($conn, "SELECT * FROM staff order by staff_id");

?>

<head>
	<style>
		<?php 
			include('admin_staff_view_style.css');
		?>
	</style>

</head>
	<table id="table_pro">
		<tr class="pro">
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Name</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Id</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Contact</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Address</th>
			<th style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Vehicle no</th>
			<th colspan="2" style="text-align: center; font: 18px century gothic; height: 50px; padding: 2px;">Modify</th>
		</tr>

		
		<?php
			
				if(!empty($query)){
					while($row = mysqli_fetch_array($query)){
			
				?>			
					<tr class="pro" style="border-bottom: 2px solid darkblue;">
                        <td id="s_name"><?php echo $row['staff_name']; ?></td>
						<td id="s_id"><?php echo $row['staff_id']; ?></td>
						
						<td id="s_cont"><?php echo $row['staff_cont']; ?></td>
						<td id="s_add"><?php echo $row['staff_add']; ?></td>
						<td id="svno"><?php echo $row['vehicle_no']; ?></td>
					
						<td style="background-color: white;" id="edit"><img id="<?php echo $row["staff_id"]; ?>" style="height: 20px; margin-bottom: 20px; width: 20px; cursor: pointer;" onclick="editData(this.id)" src="edit.png"></td>
						<td style="background-color: white;" id="remove"><img id="<?php echo $row["staff_id"]; ?>" style="height: 20px; margin-bottom: 20px; width: 20px; cursor: pointer;" onclick="deleteData(this.id)" src="x-button.png"></td>
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
                url: "admin_deletestaff.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $.get("admin_staff_view.php", function(data) {
                        $("#data").html(data);
                    });
                }
            });
        } // delete close

        function editData(ids) {
            var id = ids;
            $.ajax({
                url: 'admin_staff_edit.php',
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