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
		header('location:memberLogin.php');
	}


	$queryId = "select * from member where user_name='$userprofile'";

	$dataId = mysqli_query($conn, $queryId);
	$resultId = mysqli_fetch_assoc($dataId);

	$memberId = $resultId['id'];

?>



<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="fix maincontent">
		<div class="content">

			<form action="memberAddBloodDonation.php" method="GET">

				<h2><strong>Add New Record for Money Donation</strong></h2><br><hr><br>
							
				<p>Blood Donor Name:</p>
				<input type="text" name="donor_name" class="inputSize" placeholder="Please Enter registered user name"><br><br>

				<p>Blood Donor ID:</p>
				<input type="text" name="donor_id" onkeypress="isInputNumber(event)" class="inputSize" placeholder="Please Enter registered user id"><br><br>

				<p>Blood Group:</p>
				<input type="text" name="blood_group" class="inputSize"><br><br>

				<p>Donation Location:</p>
				<input type="text" name="donation_location" class="inputSize"><br><br>

				<p>Receiver Name:</p>
				<input type="text" name="receiver_name" class="inputSize"><br><br>

				<p>Receiver Address:</p>
				<input type="text" name="receiver_address" class="inputSize"><br><br>


				
				<div class="submit">
					<input type="submit" name="submit" value="Update"><br><br>
				</div>

			</form>

			<a href="http://www.motivationgroupbd.org/memberHomeBloodDonation.php"><button>Cancel</button></a>


		</div>
	</div>


<?php

	if($_GET['submit']){

		$dn = $_GET['donor_name'];
		$di = $_GET['donor_id'];
		$bg = $_GET['blood_group'];
		$dl = $_GET['donation_location'];
		$rn = $_GET['receiver_name'];
		$ra = $_GET['receiver_address'];


		if($dn!="" && $di!="" && $bg!="" && $dl!="" && $rn!="" && $ra!=""){

			$query = "insert into blood_donation(donor_name, donor_id, blood_group, donation_location, receiver_name, receiver_address, member_id) values('$dn','$di', '$bg', '$dl', '$rn', '$ra', '$memberId')";


			$data = mysqli_query($conn, $query);

			if($data){
				echo "<h3 class='comment'>Successful !!!</h3>";

				?>
					<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/memberHomeBloodDonation.php">
				<?php

			}
			else{
				echo "<h3 class='comment'>Unsuccessful !!!</h3>";

				?>
					<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/memberHomeBloodDonation.php">
				<?php
			}
		}
		else{

			echo "<h3 class='comment'>All Field Required</h3>";

			?>
				<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/memberHomeBloodDonation.php">
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

