<?php
include_once 'database.php';
session_start();
if (isset($_SESSION["email"])) {
	session_destroy();
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$result = mysqli_query($con, "SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		if (isset($_SESSION['email'])) {
			session_unset();
		}
		$_SESSION["email"] = $email;
		header("location:dashboard.php");
	} else {
		echo "<center><h3><script>alert('Incorrect Email or Password');</script></h3></center>";
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
	<title>Admin Login | Market shop</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/form.css">

</head>

<body>
	<nav id="navbar_top" class="navbar sticky-top navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="#">Market Shop Admin</a>
		</div>
	</nav>
	<section class="vh-100">
		<div class="container py-5 h-custom">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-md-8 col-lg-7 col-xl-6">
					<img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
				</div>
				<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
					<form method="post" action="login.php" enctype="multipart/form-data">
						<h3 style="font-family: serif; color:grey; text-align:center;">Login</h3>
						<div class="form-group">
							<h5 style="font-family: serif;  font-size: 16px;"><label class="form-label">Email Id</label></h5>
							<div class="form-outline mb-4">
								<input type="email" name="email" placeholder="example@gmail.com" class="form-control form-control-lg">
							</div>
						</div>
						<div class="form-group">
							<h5 style="font-family: serif;  font-size: 16px;"><label class="form-label">Password:
								</label></h5>
							<input type="password" name="password" placeholder="Password" class="form-control form-control-lg">
						</div>
						<div class="form-group">
							<div class="text-center text-lg-start mt-4 pt-2">
								<button type="submit" class="btn btn-primary btn-md" style="padding-left: 1.5rem; padding-right: 1.5rem; font-weight: bold; font-size:16px; font-family:Sans-serif, Verdana;" name="submit">Login</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>