<?php

session_start();
require_once('dbcs.php');
global $conn;

$ngo= mysqli_query($conn,"SELECT * FROM ngo");

?>


<html>
    <head>
        <title>Unite with us</title>
        <style>
        <?php
            include('ngo.css');
        ?>
        </style>
    </head>
    <body style= "background-color: #E1D5DF;">
        <?php
			include('header.php');
		?>
          <div id="container">
        <div id = "bg">
            <p>NGO's Working with us - <a id="button" href="ngo_form.php" >Want to be a part of this?</a></p>
        </div>
      
        <div id="ngo-grid">
        
	   <?php
	       if (!empty($ngo)) {
		      while ($row=mysqli_fetch_array($ngo)) {
        ?>
            <div class="ngo-img">
            </div>
            <div class="ngo-info">
                <div class="ngo-name">
                    <?php echo $row["ngo_name"]; ?>
                </div>
                <div class="ngo-motive">
                    Motive: <br><?php echo $row["motive"]; ?>
                </div>
                <div class="ngo-update">
                    Recent updates:<br><?php echo $row["recent_updates"]; ?>
                </div>
            
                <div class="ngo-member">
                    Number of members:<br><?php echo $row["no_of_members"]; ?>
                </div>
            </div>
            <br><br>
            <?php
            }
        }
            ?>
        </div>
             
        </div>
    
    </body>
</html>