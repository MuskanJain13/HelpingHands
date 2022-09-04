<?php
session_start();

if(isset($_SESSION['username']) && ($_SESSION['username']!='')){
    ?>
    <script>
        var name = "<?php echo $_SESSION['username'] ?>";
    alert("Hello "+name+ ", You have successfully logged in!");
    </script>
    
<?php }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="index_style.css">
   
    </head>
    <body>
        <div id="div1">
            <div id="top">
                <p style="text-align: center">Life never stops... Be unstoppable!</p>
            </div>
			
			<div style="position: fixed; width: 1035px; " id="head">
				<?php 
					include('header.php');
				?>
			</div>
			
			
            <div id="covid">
                <h3 style="text-align: center">COVID UPDATES</h3>
            </div>
            <div id="image1">
                <img src="image1_DP.jpg" style="width: 570px; height: 524px">
            </div>
            <div id="image2">
                <img src="image2.jpg" style="width: 467px; height: 262px; position: absolute">
            </div>
            <div id="image3">
                <img src="image3.PNG" style="width: 467px; height: 262px; position: absolute">
            </div>
            <div id="image4">
                <img src="image4.jpg" style="width: 219px; height: 329px; position: absolute">
            </div>
            <div id="image5">
                <img src="image5.jpg" style="width: 219px; height: 329px; position: absolute">
            </div>
             <div id="image6">
                <img src="image6.jpg" style="width: 219px; height: 329px; position: absolute">
            </div>
             <div id="image7">
                <img src="image7.jpg" style="width: 930px; height: 197px; position: absolute">
            </div>
            <div id="image8">
                <img src="image8.JPG" style="width: 930px; height: 197px; position: absolute">
            </div>
             <div id="image9">
                <img src="image9.jpg" style="width: 219px; height: 329px; position: absolute">
            </div>
            <div id="image10">
                <img src="image10.jpg" style="width: 219px; height: 329px; position: absolute">
            </div>
            <div id="image11">
                <img src="image11.jpg" style="width: 219px; height: 329px; position: absolute">
            </div>
            
            <div id="text">
                Is Covid 19 stopping you for buying necessary products...?
                Are you hesitating for that 
                What are you waiting for...? Here we are with all the necessary household products and we'll deliver all the sanitized products with safety measures.
                Keep your house clean with all the necessary household products
            </div>
            <div id="text1">
               In this pandemic many people lost their jobs and it's difficult to find new jobs for the new ones also.
                So, on this platform they can find appropiate jobs for themselves.
                We provide a platform to all the recruiters  and the retailers who want employees/workers and have vacancies in there companies/shops.
            </div>
         
            <?php
            
            if(isset($_SESSION['username']) && ($_SESSION['username']!='')){
            ?>
            <button id = "lg" type="button" style="width: 80px; height: 30px; background-color: white; margin-top: 90px; margin-left: 990px; position: absolute"><a href="log_out.php">Logout</a></button>
            <?php
            }
            else
            {
                ?>
               <!-- <button id = "ls" style="width: 80px; height: 30px; background-color: white; margin-top: 90px; margin-left: 990px; position: absolute"><a href="login.php">sign in</a></button>   -->
                <?php 
            }
        ?>
             <div id="sn1">
                 <button id = "b1" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 90px; ">BUY NOW</button>
             </div>
            <div id="sn2">
                <button id = "b2" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 150px; ">GET EMPLOYEE</button>
             </div>
            <div id="sn3">
                <button id = "b3" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 90px; ">FIND JOB</button>
             </div>
             <div id="sn4">
                <button id = "b4" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 90px;  ">SHOP NOW</button>
             </div>
             <div id="sn5">
                <button id = "b5" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 90px; ">SHOP NOW</button>
             </div>
             <div id="sn6">
                <button id = "b6" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 90px; ">SHOP NOW</button>
             </div>
            <div id="sn7">
                <button id = "b7" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 150px; ">GET YOURS NOW</button>
             </div>
            <div id="sn8">
                <button id = "b8" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 90px; ">SHOP NOW</button>
             </div>
            <div id="sn9">
                <button id = "b9" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 216px; ">GET JOB IN AUTOBILE SECTOR</button>
             </div>
             <div id="sn10">
                <button id = "b10" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 214px; ">FIND EMPLOYEE FOR DELIVERY</button>
             </div>
            <div id="sn11">
                <button id = "b11" type="button" style="border: 0px; background-color: transparent; height: 30px; width: 214px; ">GET JOB AND WORK FROM HOME</button>
             </div>
            
            
            <div id="footer">
         
            </div>
        </div>
        
        
    </body>
</html>