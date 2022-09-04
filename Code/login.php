<?php

	session_start();
	error_reporting(0);
	
	if (isset($_SESSION['username']) && $_SESSION['username'] != ''){
		
		if($_SESSION['username'] == 'Admin13'){
			header('location: admin.php');
		}else{
			header('location:index.php');
		}
	}else{
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>
		<style>
			<?php
				include('login.css');
			?>
		</style>
	</head>
	<body>
		<div>
			<?php
				$msg = '';
				if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){
					include ('dbcs.php'); //Importing the database file
					
					$username = $_POST['username'];
					$password = $_POST['password'];
					
					$getName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user` WHERE `username`= '".$username."' and `password`= '".$password."'"));
					// mysqli_fetch_assoc ---> Is used to fetch the results of the query into an associated array.
					//mysqli_query --> executes the query
					
					if (!empty($getName)) {
						
						if ($getName['username'] != ''){

							if ($_POST['username'] == $getName['username'] && $_POST['password'] == $getName['password']){
								
								$_SESSION['username'] = $getName['username']; //Session is set
								
								if($_SESSION['username'] == 'Admin13'){
									header("location: admin.php");
								}
								elseif ($_POST['url'] == 'http://localhost/WebDesign/SignupForm.php'){
									header("location: index.php");
								}else{
									header("location:". $_POST['url']);
								}
							}
						}
					}
					else{	
							$msg = "Please enter correct username and password!";
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
				<form name="UserForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                    <table style="margin-left: auto; margin-right: auto">
                        <th style="color: black; font: 16px century gothic" colspan="2">Log in<br><br></th><br>
                        
						<tr>
							<td>
                            	<input name="url" readonly type="hidden" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                        	</td>
						</tr>
						
						<tr>
                            <td colspan="2"><label  for="username" style="font:century gothic">Username</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" id="username" name="username" placeholder="Username" onchange="return valid_username()"><br><br></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label for="pwd">Password</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="password" id="pwd" name="password" placeholder="Password"><br></td>
                        </tr>
                        <tr>
                            <td style="width: 30px; font-size: 11px"><label><input style = "width: auto; height: auto" type="checkbox" checked="checked" name="remember" >Remember me</label><br><br></td>
                            <td style="width: 13px; font-size: 11px; text-align: right"><label id="fp">Forget Password?</label><br><br></td>
                        </tr>
						<tr>
							<td colspan="2" style="padding: 5px 0px 5px 0px; text-align: center;">
								<label style="border: 0px solid black; padding: 4px 6px 4px 6px; background-color: rgba(255, 255, 255, 0.5); font: 12px century gothic; font-weight: bold; color: red; width: 200px;"><?php echo $msg; ?></label>
							</td>
						</tr>
                          <tr>
                            <td style="text-align: center" colspan="2"><button id = "sub" type="submit" name = "login">Login</button><br></td>
                        </tr>
                        <tr>
                            <td style="width: 10px; font-size: 11px; text-align: center"><label id="dha">Don't have an account?</label><br><br></td>
                            <td style="width: 22px; font-size: 11px"><label id = "su"><a href="SignupForm.php">Sign Up</a></label><br><br></td>
                        </tr>
                    </table>
                </form>
			</div>
		</div>
	</body>
</html>

<?php } ?>