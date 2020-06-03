
<?php
session_start();
include_once("db_conn.php");

	if(isset($_POST["submit"]))
	{
		$uname=$_POST['username'];
		$pass=$_POST['password'];
		$conpass=$_POST['confpassword'];
		if($conpass==$pass)
			{	
			$q1="insert into login_details (username,password) values ('$uname','$pass');";
			if($result=mysqli_query($conn,$q1))
			{
				setcookie('confirmation','Account Created',time()+60);
				header("Location:login.php");
			}
		}
		else
		echo "Passowrds do not match";	
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Page</title>
	
</head>
<body>
			<div>
			<fieldset>
			<legend style='text-align:center;font-size:20px'>Register</legend>
				<form  style='padding-left:400px;padding-top:20px' method="post" action="register.php">
				

					<span>
						Username
					</span>
					<div  data-validate = "Username is required">
						<input  type="text" name="username">
					</div>
					
					<span>
						Password
					</span>
					<div data-validate = "Password is required">
						<input type="password" id="pass" name="password">
					</div>
					
					<span >
						Confirm Password
					</span>
					<div  data-validate = "Confirm Password is required">
						<input class="input100" type="password" name="confpassword">
					</div>
					<br>	
					<div>
						<input type="submit"  value="Register" name="submit">&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;		
						<a href="login.php">Login</a>
					</div>
				</form>
			</div>

	
</body>
</html>