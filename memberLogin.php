<?php

	session_start();

	include("connection.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Member Login Page</title>
	<link rel="stylesheet" type="text/css" href="allLogin.css">
</head>
<body>
	<div class="bgimg">
		<div class="centerdiv">
			<img src="images/login1.png" id="profilepic">
			<h2>Member Login</h2>
			<form action="" method="post">
				<div>
					<input type="text" name="username" class="inputbox" placeholder="Username">
				</div>
				<br>
				<div>
					<input type="password" name="password" class="inputbox" placeholder="Password">
				</div>
				<br>
				<div>
					<input type="submit" name="submit" class="inputbox" value="LOGIN">
				</div>
			</form>

			<br>

			<div class="FORGOT-SECTION">
				<a href="#"><h4>Forget Password?</h4></a>
			</div>

			<br>

			<div class="FORGOT-SECTION">
				<a href="index.html"><h4><= Go Back to Home Page</h4></a>
			</div>
		</div>
	</div>
</body>
</html>




<?php

	if(isset($_POST['submit'])){
		$user = $_POST['username'];
		$pwd = $_POST['password'];
		$query = "select * from member where user_name='$user' && password='$pwd'";

		$data = mysqli_query($conn, $query);

		$totalRow = mysqli_num_rows($data);

		if($totalRow == 1){

			$_SESSION['user_name'] = $user;
			
			header('location:memberHome.php');
		}
		else{
			echo "Login Failed.";
		}
	}

?>