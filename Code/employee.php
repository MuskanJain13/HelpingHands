<?php

	session_start();	
	if (isset($_SESSION['username']) && $_SESSION['username'] != ''){
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Employee's Registration Form</title>
		<link rel="stylesheet" href="employ.css">
	</head>
	<body>
		
		<div>
			<?php
				$msg ='';
				if(isset($_POST['sub']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['cont']) && !empty($_POST['ql'])){

					include ('dbcs.php');
					$e_name = $_POST['name'];
					$e_age = $_POST['age'];
					$e_gender = $_POST['gender'];
					$e_comp = $_POST['pre_name'];
					$email_e = $_POST['email'];
					$contact = $_POST['cont'];
					$e_qual = $_POST['ql'];
					$e_exp = $_POST['yrs'];
					$e_comm = $_POST['com'];
					$sql = mysqli_query($conn,"INSERT INTO `employee`(`Full_name`, `Age`, `Gender`, `pre_comp`, `email`, `cont_no`, `Qualifications`, `exp`, `comm`) VALUES('".$e_name."','".$e_age."', '".$e_gender."', '".$e_comp."', '".$email_e."', '".$contact."', '".$e_qual."', '".$e_exp."', '".$e_comm."')");
				}else{
				 echo "message";
				}
			?>
        </div>
		
		<div id="container"> <!-- This is the outer most division i.e. container which contains all the sub divisions. -->
			<div id="bg">	<!-- This is the 1st division inside the container which contains 2 divisions for 2 different background colors. -->
				<div id="bg1"></div> 		<!-- This is the 1st background color division inside bg division.-->
				<div id="bg2"></div>		<!-- This is the 2nd background color division inside bg division.-->
			</div>
			<div id="reg"><label>Registration Form</label></div>   	<!-- This is the 1st background color division inside bg division. -->
			<div id="t1">  				<!-- Write your comments here -->
                <form name="emp_form_labels">
                    <table style="margin-left: auto; margin-right: auto">
                        <tr><td class="rf"><label for="name"> Full Name:</label></td></tr>
                        <tr><td class="rf"><label for="age">Age:</label></td></tr>
                        <tr><td class="rf"><label for="gender">Gender:</label></td></tr>
                        <tr><td class="rf"><label for="pre_cpy_name">Previous Company Name (If any):</label></td></tr>
                        <tr><td class="rf"><label for="email">em@il:</label></td></tr>
                        <tr><td class="rf"><label for="contact">Contact number:</label></td></tr>
                        <tr><td class="rf"><label for="qualification">Qualifications:</label></td></tr>
                        <tr><td class="rf"><label for="experience">Experience (If any):</label></td></tr>
                        <tr><td class="rf"><label for="comments">Comments:</label></td></tr>
                    </table>
                </form>
            </div>
			<div id="t2"> 					<!-- Write your comments here -->
                <form name="emp_form_inputs" method="post" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <table style="margin-left: auto; margin-right: auto">
                        <tr><td style="height: 35px"><input onchange = "upper_case()" type="text" name="name" id="name" placeholder="name" required></td></tr>
                        <tr><td class ="rf"><input type="text" name="age" id="age" placeholder="age" required></td></tr>
                        <tr><td class ="rf"><label for="male" style="text-align: left"><input style="width: 15px; height: 13px" type="radio" id="male" name="gender" value="male">Male</label>
                            <label for="female"><input style="width: 15px; height: 13px" type="radio" name="gender" id="female" value="male">Female</label>
                            <label for="Other"><input style="width: 15px; height: 13px" type="radio" name="gender" id="other" value="male">Other</label>
                            </td>
                        </tr>
                        <tr><td class ="rf"><input type="text" name="pre_name" id="Pre_cpy_name" placeholder="Company name"></td></tr>
                        <tr><td class ="rf"><input type="email" name="email" id="email" placeholder="email address" required></td></tr>
                        <tr><td class ="rf"><input onchange = "contact()" type="text" name="cont" id="cont" placeholder="contact number" required maxlength="13" minlength="10" pattern="((\+91[0-9]{10})|(0[0-9]{10}"></td></tr>
                        <tr><td class ="rf">
							<input list = "qualification" placeholder = "Select Qualification" required name="ql">
							<datalist id = "qualification">
								<option value = "Post-graduate">
								<option value = "Graduate">
								<option value = "Under-graduate">
                                <option value = "12th pass">
                                <option value = "Matric pass">
							</datalist></td></tr>
                        <tr><td class ="rf"><input type="text" name="yrs" id="Experience" placeholder="Years"></td></tr>
                        <tr><td class ="rf"><input type="text" name="com" id="comments" placeholder="Comments"></td></tr>
                    </table>
                    
			         <div id="sub_button"><button type="submit" name="sub">Submit</button></div> <!-- This is the division for submit button inside the container division. -->
                </form>
            </div>
			<div id="box">
                <div id="text_box">
					  Hey..<br>
					  Afraid of covid 19?<br>
					  Afraid to sit idle at home?<br>
					  Want to earn something for<br>
					  family..? <br>
					  Are you looking for<br>
					  a job?<br>
					  So, fill the form right away.. <br>
					  We'll contact you soon!!<br>
                </div>
            </div>
			<div id="image_cont">
				<a href="index.php"><img style="width: 30px; height: 30px; position: absolute" src="house.png"></a>
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
        header('location:login.php');
    }
?>