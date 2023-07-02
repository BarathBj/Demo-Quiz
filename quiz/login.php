<?php

	require('database.php');

	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	
	$ref=@$_GET['q'];		
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];

		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);					
		$query = "SELECT * FROM user WHERE email='$email' and password='$pass'";
		$result = mysqli_query($con,$query);

		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['id']=$row[0];
			$_SESSION['name']=$row[1];
			$_SESSION['email']=$row[2];
			$_SESSION['password']=$row[3];
			$_SESSION['key']= 'user';
			header('location: welcome.php?q=1'); 					
		}

	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login | Demo Quiz System</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background-color: black;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4 style="font-family: Noto Sans;">Sign In</h4><br>
							<form method="post" action="login.php" enctype="multipart/form-data">
								<div class="form-group">
									<input type="email" name="email" class="form-control" value="demo1@demo" placeholder="Enter Your Email Address" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" value="1234" placeholder="Enter Your Password" required>
								</div> 
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="register.php">Register</a> <br>

									<span class="text-muted">Click here admin login -></span> <a href="admin.php">Admin Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>