<?php
session_start();
include_once("db_conn.php");

	if(isset($_POST["submit"]))
	{
		$uname=$_POST['username'];
		$pass=$_POST['password'];
		$_SESSION['username']=$uname;
		$_SESSION['password']=$pass;	
		$q1="select * from login_details where username='$uname' and password ='$pass'";

		$result=mysqli_query($conn,$q1);
		if(mysqli_num_rows($result)>0)
		{ 
			if(isset($_POST['remember']))
			{
			setcookie('username',$uname,time()+86400);
			setcookie('password',$pass,time()+86400);			
			header('location:index.php');
			}
			else
			{
			setcookie('username',$uname,time()+30);
			setcookie('password',$pass,time()+30);
			header('location:index.php');
			}
	}	
		else
		{
			echo"Invalid credentials";
		}
		
	}
?>
<html>
<head>
<title>Login Page</title>
</head>
<body>
<div>
		<fieldset>
		<legend style='text-align:center;font-size:20px'>Login</legend>
		<form style='padding-left:300px;padding-top:50px' method='post' action="login.php">
			<?php if(isset($_COOKIE['confirmation']))echo"<label for='account' >Account created</label><br><br>"?>
			<label for='username' >Username</label>
			<input type='text'  name='username' required value="<?php if(isset($_COOKIE['username'])) echo'$_COOKIE[`username`]'?>"><br><br>
			
			<label for='password' >Passsword</label>
			<input type='password'  id="pass" name='password' required value="<?php if(isset($_COOKIE['username'])) echo'$_COOKIE[`password`]'?>"><br><br>
			
			<input type='checkbox' name='remember'>
			<label for='remember me'>Rememeber me</label><br><br>

			<input type='submit' value='login' style='background-color:lightblue;border-radius:5px;' name="submit">&nbsp&nbsp;&nbsp;
			<a href='register.php'>Register</a>
		</form>
</div>
</body>
</html>