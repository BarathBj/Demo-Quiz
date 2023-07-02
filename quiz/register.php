<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query ="SELECT email from user WHERE email='$email'";
		$result=mysqli_query($con,$query);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
            $query="insert into user set name='$name',email='$email',password='$password'";
			if((mysqli_query($con,$query)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header("refresh:0;url=login.php");
		}
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register | Demo Quiz System</title>
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
							<h4 style="font-family: Noto Sans;">Register</h4><br>
							<form method="post" action="register.php" enctype="multipart/form-data">
                                <div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Enter Your Name" required />
								</div>
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Enter Your Email Id" required />
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Enter Your Password" required />
                                </div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a>
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