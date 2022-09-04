<?php
  
	session_start();
	if (isset($_SESSION['username']) && $_SESSION['username'] != ''){
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Recruiter's Registration Form</title>
		<style>
			<?php
				include('ngo_form_style.css');
			?>
		</style>
	</head>
	<body>
		
		<div>
			<?php
				$msg ='';
				if(isset($_POST['sub']) && !empty($_POST['ngo_name']) && !empty($_POST['ngo_add']) && !empty($_POST['ngo_email']) && !empty($_POST['authorised_person']) && !empty($_POST['motive']) && !empty($_POST['working']) && !empty($_POST['recent_updates']) && !empty($_POST['members']) && !empty($_POST['skills'])){

					include ('dbcs.php');
					
					$name = $_POST['ngo_name'];
					$add = $_POST['ngo_add'];
					$email = $_POST['ngo_email'];
					$head = $_POST['authorised_person'];
					$motive = $_POST['motive'];
					$working = $_POST['working'];
					$updates = $_POST['recent_updates'];
					$members = $_POST['members'];
			
					$skills = $_POST['skills'];
					
					$sql = mysqli_query($conn,"INSERT INTO `ngo`(`ngo_name`, `location`, `email`, `authorised_person`, `motive`, `working`, `recent_updates`, `no_of_members`, `skills`) VALUES ('".$name."','".$add."', '".$email."', '".$head."', '".$motive."', '".$working."', '".$updates."', ".$members.", '".$skills."')");
					
					//header('location: index.php');
					
				}else{
				 //	echo "message";
				} 
			?>
		</div>
		
		<div id="container"> <!--This is the outer most division i.e. container which contains all the sub divisions.-->
			<div id="bg">	<!-- This is the 1st division inside the container which contains 2 divisions for 2 different background colors. -->
				<div id="bg1"></div> 		<!-- This is the 1st background color division inside bg division.-->
				<div id="bg2"></div>		<!-- This is the 2nd background color division inside bg division.-->
			</div>
			<div id="reg"><label>Registration Form</label></div>   	<!-- This is the 1st background color division inside bg division. -->
			<div id="t1">  		<!-- This is the division for table containing labels inside the container division. -->
                <form name="rec_form_labels">
                    <div id="row1">Tell us your NGO's name:</div>
                    <div id="row2">Where it is located:</div>
                    <div id="row3">Oraganisation's email address:</div>
                    <div id="row4">Head name:</div>
                    <div id="row5">Your aim for serving the society:</div>
                    <div id="row6">NGO's working:</div>
                    <div id="row7">Share your NGO's recent success stories:</div>
                    <div id="row8">Members serving for your NGO's:</div>
                    
                    <div id="row10">Skills:</div>
                    <div id="row11">Upload an image of your NGO:</div>
                    
                </form>
            </div>
			<div id="t2"> <!-- This is the division for table containing input fields inside the container division. -->
                <form name="rec_form_inputs" method="post" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <table style="margin-left: auto; margin-right: auto">
                        <tr><td style="height: 35px"><input type="text" id="ngo_name" name="ngo_name" placeholder="Organisation's name" pattern="[A-Za-z\s]{1,}" title="Please enter alphabets only!" required onchange="uppercase()"></td></tr>
                        <tr><td class ="rf"><input type="text" id="ngo_add" name="ngo_add" placeholder="Location" required></td></tr>
                        <tr><td class ="rf"><input type="email" id="ngo_email" name="ngo_email" placeholder="Email address" required></td></tr>
                        <tr><td class ="rf"><input type="text" id="authorised_person" name="authorised_person" placeholder="Name" pattern="[A-Za-z\s]{1,}" title="Please enter alphabets only!" required></td></tr>
						<tr><td class ="rf"><textarea type="text" id="motive" name="motive" placeholder="Share your Vision here..."  required></textarea></td></tr>
                        <tr><td class ="rf"><textarea type="text" id="working" name="working" placeholder="Share your Working methodology here..." required></textarea></td></tr>
                        <tr><td class ="rf"><textarea type="text" id="recent_updates" name="recent_updates" placeholder="Recent Updates" required></textarea></td></tr>
                        <tr><td class ="rf"><input type="text" id="members" name="members" placeholder="Number of memebers" required></td></tr>
						<tr><td class ="rf"><input list="skill" type="text" name="skills" id="skills" placeholder="Select best skill" pattern="[A-Za-z\s]{1,}" title="Please enter alphabets only!" required multiple>
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
                            </datalist>
						</td></tr>
						<tr><td class ="rf"><input type="file" id="image" name="uploadimage" placeholder="Image"></td></tr>
                    </table>
					<div id="sub_button"><button type="submit" name="sub">Submit</button></div> <!-- This is the division for submit button inside the container division. -->
                </form>
            </div>
			
			<div id="box">
				<img style="height: 180px; width: 280px;" src="List-of-Government-Schemes-for-Non-Governmental-Organizations.png" id="ngo">
			</div>
			
			
			<div id="image_cont">
				<a href="index.php"><img style="width: 30px; height: 30px; position: absolute" src="home.png"></a>
			</div>
		</div>
		
		<script>
			
			function uppercase(){
				var name = String(document.getElementById("ngo_name").value);
				var uppername = name.charAt(0).toUpperCase();
				document.getElementById("ngo_name").value = uppername + name.slice(1);
			}
			
		</script>
		
	</body>
</html>

<?php
	}else{
        header('location:login.php');
    }
?>