<?php

	session_start();
	
	include('dbcs.php');

?>


<html>
    <head>
        <title>Transaction details </title>
        <style>
			<?php include('user_history_style.css')?>
		</style>
    </head>
    <body style="background-color: #e1d5df;">
        <?php
            include('header.php');
        ?>
		<div id="heading">
            <p id="para1">Transaction History</p>
        </div>
        <div id="container">
            <div id="text1">
                <p id="para2">Here is the list of your past transactions...<br>Have a nice day ahead <?php echo $_SESSION['username']; ?>!</p>
            </div>
			
			<div id="data">
				
				<table>
					<tr>
						<th style="text-align: center; font: 20px century gothic; width: 280px;">Transaction Date</th>
						<th style="text-align: center; font: 20px century gothic;">Old amount</th>
						<th style="text-align: center; font: 20px century gothic;">New amount</th>
						<th style="text-align: center; font: 20px century gothic;">Transaction</th>
						<th style="text-align: center; font: 20px century gothic;">Deduction</th>
					</tr>
			<?php
	
				$result= mysqli_query($conn,"SELECT * from user_transaction_history where username = '".$_SESSION['username']."' and deduction != 0");

					if (mysqli_num_rows($result) > 0) {

							$i = 0;

							while($row = mysqli_fetch_array($result)) {
					?>

								<tr>
									<td>
										<?php echo $row['trans_date']; ?>
									</td>
									<td>
										<?php echo $row['old_wallet']; ?>
									</td>
									<td>
										<?php echo $row['new_wallet']; ?>
									</td>
									<td>
										<?php echo $row['trans']; ?>
									</td>
									<td>
										<?php echo $row['deduction']; ?>
									</td>
								</tr>
								
					<?php

								$i++;
							}
					}
				?>
					</table>
			</div>
        </div>
    </body>


</html>