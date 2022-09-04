<?php
	session_start();
	
	if (isset($_SESSION['username']) && $_SESSION['username'] != ''){
?>


<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="work_1_style.css">
	</head>
	<body>
        <div>
        <?php
       
        $msg ='';
        if(isset($_POST['sub']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['cont']) && !empty($_POST['pre_name']) && !empty($_POST['type']) && !empty($_POST['skills']) && !empty($_POST['date']) && !empty($_POST['com'])){
            
            include ('dbcs.php');
            $w_name = $_POST['name'];
            $w_age = $_POST['age'];
            $email_w = $_POST['email'];
            $contact = $_POST['cont'];
            $w_pro = $_POST['pre_name'];
            $w_type = $_POST['type'];
            $w_skill = $_POST['skills'];
            $w_date = $_POST['date'];
            $w_com = $_POST['com'];
        
            $sql = mysqli_query($conn,"INSERT INTO `worker`(`name`, `age`, `email`, `contact`, `project`, `type`, `skill`, `date`, `comment`) VALUES('".$w_name."','".$w_age."', '".$email_w."', '".$contact."', '".$w_pro."', '".$w_type."', '".$w_skill."', '".$w_date."', '".$w_com."')");
        	
				header('location: display_e.php');
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
                        <tr><td class="rf"><label for="email">em@il:</label></td></tr>
                        <tr><td class="rf"><label for="contact">Contact number:</label></td></tr>
                        <tr><td class="rf"><label for="pre_cpy_name">Previous projects:</label></td></tr>
                        <tr><td class="rf"><label for="type">Type:</label></td></tr>
                        <tr><td class="rf"><label for="skills">Skills:</label></td></tr>                        
						<tr><td class="rf"><label for="hour">Availability hours:</label></td></tr>
						<tr><td class="rf"><label for="date">Contact-date:</label></td></tr>
                        <tr><td class="rf"><label for="comments">Anything else we should know:</label></td></tr>
                    </table>
                </form>
            </div>
			<div id="t2"> 					<!-- Write your comments here -->
                <form name="emp_form_inputs" method="post" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <table style="margin-left: auto; margin-right: auto">
                        <tr><td style="height: 35px"><input onchange = "upper_case()" type="text" name="name" id="name" placeholder="name" pattern="[A-Za-z\s]{1,}" title="Please enter alphabets only!" required></td></tr>
                        <tr><td class ="rf"><input list="criteria" type="text" name="age" id="age" placeholder="age" required>
                            <datalist id = "criteria">
								<option value = "18-30">
								<option value = "31-40">
								<option value = "41-50">
                                <option value = "51-60">
							</datalist></td></tr>        
                       
                        <tr><td class ="rf"><input type="email" name="email" id="email" placeholder="email address" required></td></tr>
                        <tr><td class ="rf"><input type="text" name="cont" id="cont" placeholder="contact number" required pattern="^[7-9][0-9]{9}$" title="Please enter a valid contact number!"></td></tr>
						<tr><td class ="rf"><textarea type="text" name="pre_name" id="Pre_cpy_name" placeholder="Projects"></textarea></td></tr>
                      <tr><td class ="rf"><input list="l1" type="text" name="type" id="type" placeholder="Type" pattern="[A-Za-z]{1,}" title="Please enter alphabets only!" required>
                        <datalist id = "l1">
                            <option>Work</option>
                            <option>Sell</option>
                        </datalist></td></tr>
                        <tr><td class ="rf"><input list="skill" type="text" name="skills" id="skills" placeholder="Select best skill" required>
                            
                            <datalist id = "skill">
                                <option value="none">Not applicable</option>
							    <option value="Driving">(car, truck, 2-wheeler)</option>
                                <option value="chemist">Worker</option>
                                <option value="cooking">Cooking</option>
                                <option value="serving">Serving</option>
                                <option value="Programming">(python, c++, c)</option>
                                <option value="Machine learning">ML</option>
                                <option value="Data Science">DS</option>
                                <option value="Designing">(product, graphic)</option>
                                <option value="Web development">WD</option>
                                <option value="Marketing">marketing</option>
                                <option value="Nursing">nursing</option>
                                <option value="Other">other</option>
                            </datalist></td></tr>
                      
                        <tr><td class ="rf"><input type="number" name="hour" id="hour" placeholder="Availability hours"></td></tr>
						<tr><td class ="rf"><input type="date" name="date" id="date" placeholder="Contact time"></td></tr>
                        
                        <tr><td class ="rf"><input  style="height:60px" type="text" name="com" id="comments" placeholder="Comments"></td></tr>
                    </table>
                    
					<div id="sub_button"><button type="submit" id="sub" name="sub">Submit</button></div> <!-- This is the division for submit button inside the container division. -->
                </form>
            </div>
                
			<div id="box">
				<img style="height: 210px; width: 300px;" src="Capture.PNG" id="ngo"><br><br>
			</div>
            <div id="home">
                <a href="index.php"><img src="home.png" style="height: 30px; width: 30px;position: absolute"></a>
            </div>
        </div>
  
        <script type="text/javascript">
            function upper_case()  
            {
                var word = String(document.getElementById("name").value);
                var uppercase = word.charAt(0).toUpperCase();
                var show = uppercase + word.slice(1);
                document.getElementById("name").value = show;
            }
        </script>
	</body>
</html>

<?php
	}else{
        header('location: login.php');
    }
?>