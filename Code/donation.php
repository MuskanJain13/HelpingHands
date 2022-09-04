<?php
	session_start();
	
	if (isset($_SESSION['username']) && $_SESSION['username'] != ''){
        ?>


<html>
	<head>
		<title>Donation Form</title>
		<link rel="stylesheet" href="donation_style.css">
	</head>
	<body>
        <div>
        <?php
       
        $msg ='';
        if(isset($_POST['sub']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['cont']) && !empty($_POST['motive']) && !empty($_POST['date']) && !empty($_POST['goods']) && !empty($_POST['number']) && !empty($_POST['donation'])){
            
            include ('dbcs.php');
            $d_name = $_POST['name'];
            $d_age = $_POST['age'];
            $d_cont = $_POST['cont'];
            $d_motive = $_POST['motive'];
            $d_date = $_POST['date'];
            $d_goods = $_POST['goods'];
            $d_qty = $_POST['number'];
            $d_donate = $_POST['donation'];
         
        
            
        /*    $conform_password = $_POST['conform_password'];*/
            
            $sql = mysqli_query($conn,"INSERT INTO `donation`(`name`, `age`, `contact`, `motive`, `time`, `goods_name`, `qty`, `whom`) VALUES('".$d_name."','".$d_age."', '".$d_cont."', '".$d_motive."', '".$d_date."', '".$d_goods."', '".$d_qty."', '".$d_donate."')");
            header('location: renp_emp.html');
        }else{
        // echo "message";
        }
            ?>
            </div>

		<div id="container"> <!-- This is the outer most division i.e. container which contains all the sub divisions. -->
			<div id="bg">	<!-- This is the 1st division inside the container which contains 2 divisions for 2 different background colors. -->
				<div id="bg1"></div> 		<!-- Write your comments here -->
				<div id="bg2"></div>		<!-- Write your comments here -->
			</div>
			<div id="reg"><label>Registration Form</label></div>   	<!-- This is the 1st background color division inside bg division. -->
			<div id="t1">  				<!-- Write your comments here -->
                <form name="emp_form_labels">
                    <table style="margin-left: auto; margin-right: auto">
                        <tr><td class="rf"><label for="name"> Full Name:</label></td></tr>
                        <tr><td class="rf"><label for="age">Age:</label></td></tr>
                        <tr><td class="rf"><label for="contact">Contact number:</label></td></tr>
                        <tr><td class="rf"><label for="motive">Motive:</label></td></tr>
                        
                        <tr><td class="rf"><label for="date">Contact-time:</label></td></tr>
                        <tr><td class="rf"><label for="goods">Name of product:</label></td></tr>
                        <tr><td class="rf"><label for="number">Quantity of product:</label></td></tr>
                        <tr><td class="rf"><label for="donate">Donate to:</label></td></tr>
                    </table>
                </form>
            </div>
			<div id="t2"> 					<!-- Write your comments here -->
                <form name="emp_form_inputs" method="post" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <table style="margin-left: auto; margin-right: auto">
                                            <tr><td style="height: 35px"><input onchange = "upper_case()" type="text" name="name" id="name" placeholder="name" required></td></tr>
                        <tr><td class ="rf"><input list="criteria" type="text" name="age" id="age" placeholder="age" required>
                            <datalist id = "criteria">
								<option value = "18-30">
								<option value = "31-40">
								<option value = "41-50">
                                <option value = "51-60">
							</datalist></td></tr>
                  
                       
                        <tr><td class ="rf"><input onchange = "contact()" type="text" name="cont" id="cont" placeholder="contact number" required maxlength="13" minlength="10" pattern="((\+91[0-9]{10})|(0[0-9]{10}"></td></tr>
                        <tr><td class ="rf"><input type="text" name="motive" id="motive" placeholder="Motivation"></td></tr>
                      
            
                      
                        <tr><td class ="rf"><input type="date" name="date" id="date" placeholder="Contact time"></td></tr>
                        
                        <tr><td class ="rf"><input type="text" name="goods" id="goods" placeholder="Enter the name"></td></tr>
                        <tr><td class ="rf"><input type="number" name="number" id="number" placeholder="Quantity"></td></tr>
                        <tr><td class ="rf"><input list="donate" type="text" name="donation" id="donation" placeholder="Select">
                            <datalist id = "donate">
                                <option value = "To us">
                                <option value = "To NGO">
							</datalist></td></tr>
                    </table>
                    
			         <div id="sub_button"><button type="submit" name="sub">Submit</button></div> <!-- This is the division for submit button inside the container division. -->
                </form>
            </div>
                <div id="box">
					<img style="height: 180px; width: 280px;" src="humanitarian-donation-help-dog-assisting_23-2148515230.jpg" id="ngo">
            </div>
            <div id="home">
                <a href="index.php"><img src="home.png" style="height: 30px; width: 30px;position: absolute"></a>
                </div>
            </div>
  
        <script>
            function upper_case()  
            {
                var word = String(document.getElementById("name").value);
                var uppercase = word.charAt(0).toUpperCase();
                var show = uppercase + word.slice(1);
                document.getElementById("name").value = show;
            }
            function contact(){
				var cnum = String(document.getElementById("cont").value);
				if (cnum.charAt(0) != "+"){
					document.getElementById("cont").value = "+91" + cnum;	
				}
			}
        </script>
	</body>
</html>

<?php
	}else{
        header('location:log_in.php');
    }
?>