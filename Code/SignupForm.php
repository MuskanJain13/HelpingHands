<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="signup.css">	
	</head>
	<body>

		<div>
			<?php
				$msg ='';
				if(isset($_POST['signup']) && !empty($_POST['eid']) && !empty($_POST['username']) && !empty($_POST['password'])){

					include ('dbcs.php');
					global $conn;
					
					$email = $_POST['eid'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					
					$check = mysqli_fetch_assoc(mysqli_query($conn,"select * from user where username = '".$username."'")); //checking that if the username already exists or not! 
					
					if (!empty($check)) {
                    
						$msg = "Username already exists!";
						
					}else{

						$sql = mysqli_query($conn,"INSERT INTO `user`(`email`, `username`, `password`, `wallet`) VALUES('".$email."','".$username."', '".$password."', 3000.00)");

						header('location:login.php');

					}
				}
			?>
		</div>
		
		<div id="image_cont">
			<a href="index.php"><img style="width: 30px; height: 30px; position: absolute" src="home.png"></a>
		</div>
		<div id="container1">
			<div id="signup"></div>
			<div id="whitebox"></div>
			<div id="tableform1">
				<form name="UserForm" style="font: Century Gothic;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <table style="margin-left: auto; margin-right: auto;">
                        <thead>
							<tr><th style="color: black; font: 16px Century Gothic;" colspan="2">Sign Up<br><br></th></tr><br>
						</thead>
						<tr><td colspan="2" style="font: 14px Century Gothic;">Welcome to our website, here Humanity matters!<br><br></td></tr>
                        <tr>
                            <td colspan="2"><label style="margin-top: 50px; margin-bottom: 30px; font: Century Gothic;" for="eid">Email</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="email" id="eid" name="eid" placeholder="email address" required><br><br></td>
                        </tr>
						<tr>
                            <td colspan="2"><label style="font: Century Gothic;" for="username">Username</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" id="username" name="username" value="<?php echo $msg; ?>" placeholder="username" onchange="uppercase()" required minlength="5" maxlength="7" pattern="^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9]+$" title="Please include alpha-numeric characters in username."></td>
                        </tr>
						<tr>
							<td style="line-height: 10px; width: 300px"><label id="e1">Username must contain alpha-numeric characters with minimum 5 characters and maximum 7 characters</label><br><br></td>
						</tr>
                        <tr>
                            <td colspan="2"><label for="pwd">Password</label></td>
                        </tr>
                        <tr>
							<td colspan="2"><input type="password" name="password" placeholder="Password" id="pwd" required minlength="8" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number."></td>
						</tr>
						<tr>
							<td style="line-height: 10px;  width: 300px"><label id="e2">Password must contain 1 uppercase, 1 lowercase, a number and minimum 8 characters</label><br><br></td>
						</tr>
						<tr>
                            <td colspan="2"><label for="cpwd">Confirm Password</label></td>
                        </tr>
                        <tr>
							<td colspan="2"><input type="password" placeholder="Confirm Password" id="cpwd" required onchange="validatePassword()"><br><br></td>
						</tr>
						<tr>
							<td style="text-align: center" colspan="2"><button id="sup" type="submit" name="signup">Sign Up</button></td>
						</tr>
                    </table>
					<div id="login">
						<label id="acc" style="font: 11px Century Gothic">Already have an account?</label>
						<label id="log" style="font: 11px Century Gothic"><a href="login.php">Log in</a></label>
					</div>
                </form>
			</div>
		</div>
		
		<script>
				
			var pwd = document.getElementById("pwd"), cpwd = document.getElementById("cpwd");

			function validatePassword(){
			  if(pwd.value != cpwd.value) {
				cpwd.setCustomValidity("Passwords Don't Match");
			  } else {
				cpwd.setCustomValidity('');
			  }
			}
				
		</script>
		
	</body>
</html>