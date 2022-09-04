<html>
    <head>
        <title>Employee Info</title>
        <style>
            #bg{
                border: 0px solid black;
                height: 535px;
                width: 1234px;
                position: relative;
            }
            #d1{
                position: absolute;
                margin-top: 310px;
                margin-left: 100px;
            }
            #d2{
                position: absolute;
                height: 40px;
                width: 550px;
				text-align: justify;
                background-color: transparent;
                margin-top: 75px;
                margin-left: 630px;
				color: darkblue;
				font: 22px century gothic;
            }
            #d3{
                height: 200px;
                width: 400px;
                border: 0px solid black;
                margin-top: 20px;
                margin-left: 200px;
            }
            td,th{
                border: 1px solid white;
                text-align: center;
                background-color: #BCBCBC;
                height: 20px;
				padding: 8px;
				
            }
            td{
                height: 40px;
                width: 200px;
				font: 16px century gothic;
            }
            th{
                height: 40px;
				font: 18px century gothic;
            }
            
        </style>
    </head>
    <body style="background-color: #E1D5DF;">
        <div id="bg">
            <a href = "index.php"><img src="home.png" style="height: 30px; width: 30px; margin-top: 5px;"></a>

        <div id="d1">
        <?php
           
		   $msg = '';
			
		   include('dbcs.php');
           $sql = mysqli_query($conn,"SELECT ngo_name, location, n.email, authorised_person, working FROM ngo n, worker w WHERE w.skill = n.Skills");
            ?>
			
            <table class="table table-bordered">
                <tr class="info">
                    <th>NGO Name: </th>
                    <th>Location: </th>
                    <th>Em@il: </th>
                    <th>Head Person: </th>
                    <th>Working Methodology: </th>
                </tr>
                
            <?php

            if(mysqli_num_rows($sql)>0){
                while($row = mysqli_fetch_assoc($sql))
                {
                  echo '
                    <tr>
                    <td>' . $row['ngo_name'] . '</td>
                    <td>' . $row['location'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['authorised_person'] . '</td>
                    <td>' . $row['working'] . '</td>
                    </tr>';
                        }
                        echo '</table>';
                }
            else{
                $msg = "Zero Result";
            }
                
            ?>
            
            </div>
			<div><?php echo $msg; ?></div>
            <div id="d2">
				Thank you for registering with us!<br>
                These are the NGO's interested in working with the volunteers who have skillset like you!<br>
				You can connect to them according to your preferences and comfort.<br>
            </div>
            <div id="d3">
                <img src="together-we-fight-corona-virus_188398-71.jpg" style="height: 250px; width: 400px">
            </div>
        </div>

    </body>
</html>