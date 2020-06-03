
<?php
if(!isset($_COOKIE['username']))
{
	header("Location:login.php");
}	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BAsic Webpage</title>
       <!-- <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />-->
        <!-- Font Awesome icons (free version)-->
    </head>
    <body>

	<div >
						<b>Welcome,<?PHP echo $_COOKIE['username']?><b><br><br>
						<a href="logout.php">LOGOUT</a>
	</div>

	
    </body>
</html>
