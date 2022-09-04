<?php
	require_once('dbcs.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Header</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<style>

			.covid{
				height: 545px;
				width: 190px;
				margin-top: 55px;
				margin-left: 1069px;
				border: 0px solid black;
				background-color: white;
				position: relative;
				position: fixed;
			}

			.covidupdates{
				font: 18px Century Gothic;
				position: absolute;
				margin-left: 23px;
				margin-top: 30px;
			}

			#covid-blue{
				color: dodgerblue;
			}

			#covid-green{
				color: greenyellow;
			}

			#covid-dark{
				color: #015478;
			}

			.earth{
				height: 18%;
				margin-top: 78px;
				margin-left: 44px;
				position: absolute;
			}

			.text{
				height: 300px;
				width: 150px;
				margin-top: 210px;
				padding-top: 25px;
				margin-left: 20px;
				text-align: justify;
				border: 0px solid black;
				font: 13px century gothic;
				position: absolute;
			}

			.text1{
				height: 300px;
				width: 150px;
				margin-top: 210px;
				padding-top: 25px;
				margin-left: 20px;
				text-align: justify;
				border: 0px solid black;
				font: 13px century gothic;
				position: absolute;
			}

			#cases{
				border: 0px solid black;
				width: 152px;
				text-align: center;
				margin-left: 2px;
				font: 15px century gothic;
				position: absolute;
			}

			#num1{
				border: 0px solid black;
				width: 140px;
				text-align: center;
				margin-left: 5px;
				margin-top: 30px;
				font: 20px century gothic;
				font-weight: bold;
				color: gray;
				position: absolute;
			}

			#death{
				border: 0px solid black;
				width: 140px;
				text-align: center;
				margin-left: 5px;
				margin-top: 80px;
				font: 15px century gothic;
				position: absolute;
			}

			#num2{
				border: 0px solid black;
				width: 140px;
				text-align: center;
				margin-left: 5px;
				margin-top: 110px;
				font: 20px century gothic;
				font-weight: bold;
				color: black;
				position: absolute;
			}

			#rec{
				border: 0px solid black;
				width: 140px;
				text-align: center;
				margin-left: 5px;
				margin-top: 160px;
				font: 15px century gothic;
				position: absolute;
			}

			#num3{
				border: 0px solid black;
				width: 140px;
				text-align: center;
				margin-left: 5px;
				margin-top: 190px;
				font: 20px century gothic;
				font-weight: bold;
				color: greenyellow;
				position: absolute;
			}

			#vaccine-update{
				font: 15px century gothic;
				position: absolute;
				text-align: center;
				border: 0px solid black;
				width: 190px;
			}

			#vacc{
				margin-top: 45px;
				font: 13px century gothic;
				position: absolute;
			}

			.prec{
				height: 27%;
				margin-left: 0px;
			}

			.prec1{
				height: 26%;
				margin-left: 0px;
			}

			#searchbar[type=search] {
				height: 35px;
				width: 130px;
				margin-right: 50px;
				margin-top: 15px;
				position: absolute;
				box-sizing: border-box;
				border: 2px solid #ccc;
				border-radius: 4px;
				font-size: 16px;
				background-color: white;
				background-image: url('searchicon.png');
				background-position: 10px 10px; 
				background-repeat: no-repeat;
				padding: 12px 20px 12px 40px;
				-webkit-transition: width 0.4s ease-in-out;
				transition: width 0.4s ease-in-out;
			}

			#searchbar[type=search]:focus {
				width: 100%;
			}
			
			#log:hover{
				color: white;
			}
			
			#sign:hover{
				color: white;
			}
			
			.dropdown {
			  float: left;
			  
			}

			.dropdown .dropbtn {
			  font-size: 17px;    
			  border: none;
			  outline: none;
			  color: white;
			  padding: 6px 8px;
			  background-color: inherit;
			  font-family: inherit;
			  margin: 0;
			}

			.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #ffffff;
			  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			}

			.dropdown-content a {
			  float: none;
			  color: black;
			  padding: 12px 16px;
			  text-decoration: none;
			  display: block;
			  text-align: left;
			}

			.dropdown:hover .dropbtn {
			  background-color: #555;
			  color: white;
			}

			.dropdown-content a:hover {
			  background-color: rgb(245, 245, 245);
			  color: black;
			}

			.dropdown:hover .dropdown-content {
			  display: block;
			}
			
			#shop{
				margin-left: 15px;
				text-align: center;
				color: black;
				background-color: transparent;
				text-decoration: none;
				border: none;
			}
			#shop:focus{
				border: none;
			}
			

		</style>
	</head>
	<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a style="margin-top: 5px;" class="navbar-brand" href="#">HelpingHands</a>
		</div>
		<ul class="nav navbar-nav">
		  
		  	<?php
					if(isset($_SESSION['username']) && $_SESSION['username'] == 'Admin13'){
			?>
					<li class="active"><a href="admin.php"><img style="width: 30px; height: 30px;" src="home.png"></a></li>
			<?php
					}else{
			?>
					<li class="active"><a href="index.php"><img style="width: 30px; height: 30px;" src="home.png"></a></li>
			<?php
					}
			?>
					  
		  <li style="margin-top: 5px;" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">SERVICES<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="household.php">SHOP SAFELY</a></li>
			  <li><a href="serve.php">MAKE CONTRIBUTION</a></li>
			  <li><a href="ngo.php">UNITE WITH US</a></li>
			</ul>
		  </li>
		  <li style="margin-top: 5px;"><a href="#">CONTACT US</a></li>
		  <li style="margin-top: 5px;"><a href="#">FAQs</a></li>
		</ul>
		  <ul class="nav navbar-nav navbar-right">
			  <li>
			  	  <a href="cart.php">
					  		<div style="border: 1px solid white; border-radius: 25px; float: right; position: absolute; margin-top: 18px; margin-right: 25px; background-color: black; height: 22px; width: 22px; padding-left: 6px; font-weight: 700;"></div>
					  		<img style="height: 32px; width: 32px; margin-right: 15px; " src="shopping-cart.png">
				  </a>
			  </li>
			  <li>
				  <?php
						if(isset($_SESSION['username']) && ($_SESSION['username']!='')){
						?>
								<div class="dropdown">
								<button class="dropbtn" style="margin-right: 15px; margin-top: 10px; border: 0px solid black; color: white; font: 13px century gothic;">
									<img style="height: 30px; width: 30px; margin-right: 15px;" src="facecolor.png"> 
								  	Hello, <?php echo $_SESSION['username']; ?>
								  	<i class="fa fa-caret-down"></i>
				  			  	</button>
								
								<?php
								if($_SESSION['username'] != 'Admin13'){
								?>
										<div style="min-width: 149px; font: 13px century gothic" class="dropdown-content">
										  <a href="user_history.php">Transaction History</a>
										</div>
								<?php
								}else{
									?>
										<div style="min-width: 158px; font: 13px century gothic" class="dropdown-content">
										  <a href="whole_history.php">Whole History</a>
										</div>
								<?php
									}
								?>
								
							  </div>

							  <label id="log" style="margin-right: 20px; margin-top: 20px; font: 13px century gothic; border: 0px solid black"><a style="text-decoration: none; color: gray;" href="log_out.php">Logout</a></label>
						<?php
						}
						else
						{
							?>
									<img style="height: 30px; width: 30px; margin-right: 15px;" src="facecolor.png">
				  				  	<label style="margin-right: 15px; margin-top: 20px; border: 0px solid black; color: white; font: 13px century gothic;">Hello, User</label>
								  	<label id="sign" style="margin-right: 20px; font: 13px century gothic;"><a style="text-decoration: none; color: gray;" href="login.php">Sign in</a></label>
							<?php 
						}
					?>
			  </li>
			  <img style="height: 20px; width: 30px; margin-right: 8px; margin-top: 18px;" src="flag.png">
		</ul>
		  <ul class="nav navbar-nav navbar-right">	
			  <li>
			  <img class="searchicon" style="height: 18px; width: 22px; margin-top: 20px; position: absolute;" src="mask.png">
				<img class="searchicon" style="height: 34px; width: 34px; margin-right: 19px; margin-top: 15px;" src="loupe.png">
			  </li>
			  <li style="margin-right: 20px; width: 300px;">
				<form>
					<input id="searchbar" type="search" name="search" placeholder="search...">
			  	</form>
			  </li>
		  </ul>
	  </div>
	</nav>

	<div class="covid">
		<h3 class="covidupdates" id="covid-blue">COVID UPDATES</h3>
		<img class="earth" src="pexels-anna-shvets-4167544.jpg">
		<div class="text">
			<label id="vaccine-update">Vaccine Update</label>
			<label id="vacc">Gam-COVID-Vac, trade-named Sputnik V, is a COVID-19 vaccine candidate developed by the Gamaleya Research Institute of Epidemiology. Sputnik V, an anti-corona vaccine will be produced in India with a average production of 10 Cr. per year.</label>
		</div>
	</div>

	<div class="covid">
		<h3 class="covidupdates" id="covid-green">COVID UPDATES</h3>
		<img class="earth" src="pexels-anna-shvets-4167544.jpg">
		<div class="text1">
			<label id="cases">Coronavirus Cases:</label>
			<label id="num1">49,863,636</label>
			<label id="death">Deaths:</label>
			<label id="num2">1,251,807</label>
			<label id="rec">Recovered:</label>
			<label id="num3">35,401,333</label>
		</div>
	</div>

	<div class="covid">
		<h3 class="covidupdates" id="covid-dark">COVID UPDATES</h3>
		<img class="earth" src="pexels-anna-shvets-4167544.jpg">
		<div class="text1">
			<img style="height: 6.5%; margin-left: 11px;" src="prec.jpg">
			<img style="margin-top: 20px;" class="prec" src="preca1.jpg">
			<img style="float:left;" class="prec1" src="prec2.1.jpg">
			<img class="prec1" src="prec2.2.jpg">
			<img class="prec" src="preca3.jpg">
		</div>
	</div>

		<script>

			var myIndex = 0;
			carousel();

			function carousel() {
			  var i;
			  var x = document.getElementsByClassName("covid");
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
			  }
			  myIndex++;
			  if (myIndex > x.length) {myIndex = 1}    
			  x[myIndex-1].style.display = "block";  
			  setTimeout(carousel, 3000); // Change image every 2 seconds
			}

		</script>

	</body>
</html>