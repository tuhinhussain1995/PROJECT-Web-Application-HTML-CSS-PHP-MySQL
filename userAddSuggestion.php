<style type="text/css">

	*{margin:0;padding:0}
	body{font-family:Arial; font-size:16px; line-height:20px; color:#000000; padding-bottom: 200px}

	.fix{overflow:hidden}

	.maincontent{width:100%; background:url(images/white-waves.png)repeat fixed #ddd}

	.content{width:30%; text-align:left; float:right; margin-right:35%; border:7px solid #656D9E; border-radius:16px; margin-top:35px; margin-bottom:25px; padding:0px; background:url(images/vintage-concrete.png)repeat fixed #ddd}


	.content h2{font-size:27px; text-align:center; color:#385500; margin-top:15px}
	.content p{color:#B40610; margin:0% 10% 0% 10%; font-weight:bold; margin-bottom:5px}
	.content input{font-size:14px; border-radius:6px; height:23px}


	.inputSize{width:80%; margin:0% 10% 0% 10%}


	.submit input{padding:5px 20px 5px 20px; height:40px; float:right; margin-right:40%; width:20%; margin-bottom:16px; background:#2AA9E0; font-size:18px; font-weight:bold}

	.comment{text-align: center;}

	textarea{background-color: #E5F2FF; font-size: 18px; font-family: Arial}

	button{padding:5px 20px 5px 20px; height:40px; float:right; margin-right:40%; width:20%; margin-bottom:16px; background:#2AA9E0; font-size:18px; font-weight:bold}
	

</style>




<?php

	session_start();
	include("connection.php");
	error_reporting(0);

	$userprofile = $_SESSION['user_name'];


	if(isset($_SESSION['user_name'])){

		$_SESSION['user_name'] = $userprofile;
	}
	else{
		header('location:userLogin.php');
	}


	$query = "select * from user where user_name = '$userprofile'";

	$data = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($data);   // for this function we can display any data according to query.

	$id = $result['id'];

?>



<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="fix maincontent">
		<div class="content">

			<form action="userAddSuggestion.php" method="GET">

				<h2><strong>Write Your Suggestion Below</strong></h2><br><hr><br>
							
	
				<textarea name="sugg" rows="6" cols="40" class="inputSize" required maxlength="300"></textarea><br><br>

				
				<div class="submit">
					<input type="submit" name="submit" value="Submit"><br><br>
				</div>

			</form>

			<a href="http://www.motivationgroupbd.org/userHome.php"><button>Cancel</button></a>


		</div>
	</div>


<?php

	if($_GET['submit']){

		$sg = $_GET['sugg'];


		if($sg!=""){

			$query = "insert into suggestion(user_id, user_suggestion) values('$id', '$sg')";


			$data = mysqli_query($conn, $query);

			if($data){
				echo "<h3 class='comment'>Successful !!!</h3>";

				?>
					<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/userHome.php">
				<?php

			}
			else{
				echo "<h3 class='comment'>Unsuccessful !!!</h3>";

				?>
					<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/userHome.php">
				<?php
			}
		}
		else{

			echo "<h3 class='comment'>All Field Required</h3>";

			?>
				<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/userHome.php">
			<?php
		} 

	}

?>


</body>
</html>

