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
		header('location:adminLogin.php');
	}


	$query = "select * from admin where user_name = '$userprofile'";

	$data = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($data);   // for this function we can display any data according to query.


	echo "<h1 class='heading1'>Admin Profile</h1>";

?>

<table class="profileTable">

	<?php

		echo "<tr>
			  	<td>Full Name: ".$result['full_name']."</td>
			  	<td rowspan='4'>"; ?> <img src="<?php echo $result['picture']; ?>" height="100" weight="100"/><?php echo "</td>
			  </tr>
			  <tr>
			  	<td>Profession: ".$result['profession']."</td>
			  </tr>
			  <tr>
			  	<td>Educational Background: ".$result['education']."</td>
			  </tr>
			  <tr>
			  	<td>Phone Number: ".$result['phone_no']."</td>
			  </tr>";

	?>

</table>

<br><a href="logout.php" style="float: right; margin-right: 50%"><button>Logout</button></a><br>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1 class='heading1'>Admin Activities</h1>
	<div class="fix about">
		<div class="buttons">
			<a href="adminHomeMember.php"><button><p><strong>Member's List</strong></p></button></a>
			
			<br/>
			
			<a href="adminHomeUser.php"><button><p><strong>User List</strong></p></button></a>
			
			<br/>
			
			<a href="adminHomeDonor.php"><button><p><strong>Blood Donor List</strong></p></button></a>

			<br/>
						
			<a href="adminHomeMoneyDonation.php"><button><p><strong>Money Donation Record </strong></p></button></a>

			<br/>
			
			<a href="adminHomeBloodDonation.php"><button><p><strong>Blood Donation Record</strong></p></button></a>

			<br/>
			
			<a href="adminHomeUserSuggestion.php"><button><p><strong>User Suggestions</strong></p></button></a>

		</div>
	</div>
</body>
</html>

