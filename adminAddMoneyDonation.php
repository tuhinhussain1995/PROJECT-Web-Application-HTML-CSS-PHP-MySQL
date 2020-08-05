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

	button{padding:5px 20px 5px 20px; height:40px; float:right; margin-right:40%; width:20%; margin-bottom:16px; background:#2AA9E0; font-size:18px; font-weight:bold}
	

</style>




<?php

	session_start();
	include("connection.php");
	error_reporting(0);


	$userprofile = $_SESSION['user_name'];


	if(isset($_SESSION['user_name'])){

	}
	else{
		header('location:adminLogin.php');
	}


	$queryId = "select * from admin where user_name='$userprofile'";

	$dataId = mysqli_query($conn, $queryId);
	$resultId = mysqli_fetch_assoc($dataId);

	$memberId = $resultId['member_id'];

?>



<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="fix maincontent">
		<div class="content">

			<form action="adminAddMoneyDonation.php" method="GET">

				<h2><strong>Add New Record for Money Donation</strong></h2><br><hr><br>
							
				<p>User Name:</p>
				<input type="text" name="user_name" class="inputSize" placeholder="Please Enter registered user name"><br><br>

				<p>User ID:</p>
				<input type="text" name="user_id" onkeypress="isInputNumber(event)" class="inputSize" placeholder="Please Enter registered user id"><br><br>

				<p>Amount of Money:</p>
				<input type="text" name="amount" onkeypress="isInputNumber(event)" class="inputSize"><br><br>

				
				<div class="submit">
					<input type="submit" name="submit" value="Update"><br><br>
				</div>

			</form>

			<a href="http://www.motivationgroupbd.org/adminHomeMoneyDonation.php"><button>Cancel</button></a>


		</div>
	</div>


<?php

	if($_GET['submit']){

		$un = $_GET['user_name'];
		$ui = $_GET['user_id'];
		$am = $_GET['amount'];


		if($un!="" && $ui!="" && $am!=""){

			$query = "insert into money_donation(user_name, user_id, amount, member_id) values('$un','$ui', '$am', '$memberId')";


			$data = mysqli_query($conn, $query);

			if($data){
				echo "<h3 class='comment'>Successful !!!</h3>";

				?>
					<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/adminHomeMoneyDonation.php">
				<?php

			}
			else{
				echo "<h3 class='comment'>Unsuccessful !!!</h3>";

				?>
					<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/adminHomeMoneyDonation.php">
				<?php
			}
		}
		else{

			echo "<h3 class='comment'>All Field Required</h3>";

			?>
				<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/adminHomeMoneyDonation.php">
			<?php
		} 

	}

?>


		<script>
			function isInputNumber(evt){
				var ch = String.fromCharCode(evt.which);

				if(!(/[0-9]/.test(ch))){
					evt.preventDefault();
				}
			}
		</script>
		

</body>
</html>

