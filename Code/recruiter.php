<?php
  
	session_start();
	if (isset($_SESSION['username']) && $_SESSION['username'] != ''){
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Recruiter's Registration Form</title>
		<link rel="stylesheet" href="recruit.css">
	</head>
	<body>
		
		<div>
			<?php
				$msg ='';
				if(isset($_POST['sub']) && !empty($_POST['c_n']) && !empty($_POST['c_a']) && !empty($_POST['e_a']) && !empty($_POST['a_p']) && !empty($_POST['ct']) && !empty($_POST['j_p']) && !empty($_POST['n_v']) && !empty($_POST['w_h']) && !empty($_POST['desc']) && !empty($_POST['qf']) && !empty($_POST['age'])){

					include ('dbcs.php');
					$comp_name = $_POST['c_n'];
					$comp_add = $_POST['c_a'];
					$email_a = $_POST['e_a'];
					$a_person = $_POST['a_p'];
					$cont = $_POST['ct'];
					$job_p = $_POST['j_p'];
					$vacancies = $_POST['n_v'];
					$w_hour = $_POST['w_h'];
					$pay_p = $_POST['p_p'];
					$j_desc = $_POST['desc'];
					$qual = $_POST['qf'];
					$age_c = $_POST['age'];
					$sql = mysqli_query($conn,"INSERT INTO `recruiter`(`company_name`, `company_add`, `company_email`, `authorised_person`, `contact`, `job_profile`, `no_vacancies`, `work_hr`, `pay_policy`, `job_desc`, `qualification`, `age_criteria`) VALUES('".$comp_name."','".$comp_add."', '".$email_a."', '".$a_person."', '".$cont."', '".$job_p."', '".$vacancies."', '".$w_hour."', '".$pay_p."', '".$j_desc."', '".$qual."', '".$age_c."')");
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
			<div id="t1">  		<!-- This is the division for table containing labels inside the container division. -->
                <form name="rec_form_labels">
                    <table style="margin-left: auto; margin-right: auto">
                        <tr><td class ="rf"><label for="company_name">Company Name:</label></td></tr>
                        <tr><td class ="rf"><label for="company_address">Company Address:</label></td></tr>
                        <tr><td class ="rf"><label for="company_email">Company em@il:</label></td></tr>
                        <tr><td class ="rf"><label for="authorised_person">Authorised Person:</label></td></tr>
                        <tr><td class ="rf"><label for="cont">Contact:</label></td></tr>
                        <tr><td class ="rf"><label for="job_profile">Job Profile:</label></td></tr>
                        <tr><td class ="rf"><label for="no_of_vacancies">Number of Vacancies:</label></td></tr>
                        <tr><td class ="rf"><label for="working_hour">Working Hour:</label></td></tr>
                        <tr><td class ="rf"><label for="paying_policy">Paying Policy:</label></td></tr>
                        <tr><td class ="rf" style="height: 63px" ><label for="job_description">Job Description:</label></td></tr>
                        <tr><td class ="rf"><label for="qualifications">Qualifications:</label></td></tr>
                        <tr><td class ="rf"><label for="age_criteria">Age Criteria:</label></td></tr>
                    </table>
                </form>
            </div>
			<div id="t2"> <!-- This is the division for table containing input fields inside the container division. -->
                <form name="rec_form_inputs" method="post" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <table style="margin-left: auto; margin-right: auto">
                        <tr><td style="height: 35px"><input type="text" name="c_n" id="company_name" placeholder="company name" required onchange="uppercase()"></td></tr>
                        <tr><td class ="rf"><input type="text" id="company_address" placeholder="address" name="c_a" required></td></tr>
                        <tr><td class ="rf"><input type="email" id="company_email" placeholder="email address" name="e_a" required></td></tr>
                        <tr><td class ="rf"><input type="text" name="a_p" id="authorised_person" placeholder="person name" required></td></tr>
                        <tr><td class ="rf"><input onchange = contact() name="ct" type="text" id="cont" placeholder="contact" required onchange="contact()" minlength="10" maxlength="13"></td></tr>
                        <tr><td class ="rf"><input type="text" name="j_p" id="job_profile" placeholder="profile name" required></td></tr>
                        <tr><td class ="rf"><input type="text" name="n_v" id="no_of_vacancies" placeholder="vacancies" required></td></tr>
                        <tr><td class ="rf"><input type="text" name="w_h" id="working_hour" placeholder="hours" required></td></tr>
                        <tr><td class ="rf"><input type="text" name="p_p" id="paying_policy" placeholder="Rs."></td></tr>
                        <tr><td class ="rf"><input style="height: 60px" type="text" name="desc" id="job_description" placeholder="description" required></td></tr>
                        <tr><td class ="rf" class ="rf"><input type="text" name="qf" id="qualifications" placeholder="qualifications" required></td></tr>
                        <tr><td class ="rf">
							<input list = "age_criteria" name="age" placeholder = "select age" required>
							<datalist id = "age_criteria">
								<option value = "19 - 30 yrs.">
								<option value = "31 - 45 yrs.">
								<option value = "46 - 60 yrs.">
							</datalist></td></tr>
                    </table>
					<div id="sub_button"><button type="submit" name="sub">Submit</button></div> <!-- This is the division for submit button inside the container division. -->
                </form>
            </div>
			<div id="box">
				<div id="img_box">
					<img src="job3.png" id="job"><br><br>
				</div>
				<div id="text_box">
					Hey..<br>
					Are you short of workers?<br>
					Here, you can enter your<br>
					company details and<br>
					demands. So, that we can find<br>
					the suitable employee for<br>
					available job profiles.<br>
					So, fill the form right away..<br>
					We'll contact you soon!!<br>
				</div>
			</div>
			<div id="image_cont">
				<a href="index.php"><img style="width: 30px; height: 30px; position: absolute" src="house.png"></a>
			</div>
		</div>
		
		<script>
			
			function contact(){
				var cnum = String(document.getElementById("cont").value);
				if (cnum.charAt(0) != "+"){
					document.getElementById("cont").value = "+91" + cnum;	
				}
			}
			
			function uppercase(){
				var name = String(document.getElementById("company_name").value);
				var uppername = name.charAt(0).toUpperCase();
				document.getElementById("company_name").value = uppername + name.slice(1);
			}
			
		</script>
		
	</body>
</html>

<?php
	}else{
        header('location:login.php');
    }
?>