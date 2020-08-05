<style type="text/css">

	.heading1{
		text-align: center;
		color: #2A1E4E;
		background-color: #B6B6B6;
	}

	.heading2{
		text-align: center;
		color: #2A1E4E;
		background-color: #B6B6B6;
	}

	.profileTable{
		margin-left: 41.5%;
	}

	.donorTable{
		width: 100%;
	}

	h2{
		text-align: center;
	}

	table{
		border-collapse: collapse;
		color: #d96459;
		font-family: monospace;
		font-size: 14px;
		text-align: left;
		border: 1px #d96459 dotted;
	}

	th{
		background-color: #d96459;
		color: white;
		border: 1px #d96459 dotted;
	}

	tr{
		border: 1px #d96459 dotted;
	}

	tr:nth-child(even){
		background-color: #f2f2f2
	}

	td{
		border: 1px #d96459 dotted;
		padding: 2px;
		
	}

	.about{width:100%; overflow: hidden; background:url(images/white-waves.png)repeat fixed #ddd}

	.buttons{width:25%; text-align:center; float:right; margin-right:38.6%; border:5px solid #000000; border-radius:16px; margin-top:7px; margin-bottom:100px; background:#023A72}
	.buttons button{width:250px; margin:27px 0px 20px 0px; border-radius:13px}

</style>



<?php

	session_start();
	include("connection.php");

	$userprofile = $_SESSION['user_name'];


	if(isset($_SESSION['user_name'])){

		$_SESSION['user_name'] = $userprofile;
	}
	else{
		header('location:memberLogin.php');
	}


	$query = "select * from member where user_name = '$userprofile'";

	$data = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($data);   // for this function we can display any data according to query.


	echo "<h1 class='heading1'>Member Profile</h1>";

?>

<table class="profileTable">

	<?php
	
		$myString = $result['blood_group'];
		$find_char = '+';
		$pos = strpos($myString, $find_char);
		
		if($pos !== false){
			$sign = 'plus';
		}
		else{
			$sign = 'minus';
		}

		echo "<tr>
			  	<td>ID: ".$result['id']."</td>
			  	<td rowspan='4'>"; ?> <img src="<?php echo $result['picture']; ?>" height="100" weight="100"/><?php echo "</td>
			  </tr>
			  <tr>
			  	<td>Full Name: ".$result['full_name']."</td>
			  </tr>
			  <tr>
			  	<td>Profession: ".$result['profession']."</td>
			  </tr>
			  <tr>
			  	<td>Phone Number: ".$result['phone_no']."</td>
			  </tr>";


		echo "<a href='memberUpdateMember.php?fn=$result[full_name]&fa=$result[father]&mo=$result[mother]&un=$result[user_name]&ps=$result[password]&ag=$result[age]&gn=$result[gender]&pf=$result[profession]&ed=$result[education]&pe=$result[permanent_address]&pr=$result[present_address]&ph=$result[phone_no]&bg=$result[blood_group]&sn=$sign&re=$result[religion]&we=$result[weight]&na=$result[nationality]'><button style='float: right'>Edit Your Own Profile</button></a>"

	?>

</table>


<br><a href="logout.php" style="float: right; margin-right: 50%"><button>Logout</button></a><br>

<h1 class='heading1'>Member Activities</h1>


<?php


	if ($result['account_status'] == 'Active' || $result['account_status'] == 'active' || $result['account_status'] == 'ACTIVE') {
		?>

			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<div class="fix about">
					<div class="buttons">
						<a href="memberHomeMember.php"><button><p><strong>Member's List</strong></p></button></a>
						
						<br/>
						
						<a href="memberHomeUser.php"><button><p><strong>User List</strong></p></button></a>
						
						<br/>
						
						<a href="memberHomeDonor.php"><button><p><strong>Blood Donor List</strong></p></button></a>

						<br/>
						
						<a href="memberHomeMoneyDonation.php"><button><p><strong>Add New Money Donation Record </strong></p></button></a>

						<br/>
						
						<a href="memberHomeBloodDonation.php"><button><p><strong>Add New Blood Donation Record</strong></p></button></a>

						<br/>
						
						<a href="memberHomeUserSuggestion.php"><button><p><strong>User Suggestions</strong></p></button></a>

					</div>
				</div>
			</body>
			</html>


		<?php
	}
	else{
		echo "<h2>!!! SORRY !!!</h2><br>";
		echo "<h2>Your Account is not Activated.</h2><br>";
		echo "<h2>So you can't watch more Information.</h2><br>";
		echo "<h2>Contact with Admin and Active your account.</h2><br>";
	}
	

?>








