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

</style>



<?php

	session_start();
	include("connection.php");

	$userprofile = $_SESSION['user_name'];


	if(isset($_SESSION['user_name'])){

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

	?>

</table>

<br><a href="memberHome.php" style="float: left"><button> <= Go Back</button></a>

<a href="logout.php" style="float: right; margin-right: 50%"><button>Logout</button></a>

<?php


	echo "<br><h1 class='heading1'>Member's List</h1><br>";



	$query = "select * from member";

	$data = mysqli_query($conn, $query);

	$totalRow = mysqli_num_rows($data);

	if($totalRow != 0){



		?>


		<table class="donorTable">
			<tr>
				<th>Id</th>
				<th>Full Name</th>
				<th>Father's Name</th>
				<th>Mother's Name</th>
				<th>User Name</th>
				<th>Password</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Profession</th>
				<th>Education</th>
				<th>Permanent Address</th>
				<th>Present Address</th>
				<th>Phone Number</th>
				<th>Blood Group</th>
				<th>Religion</th>
				<th>Weight</th>
				<th>Nationality</th>
				<th>Registration Date</th>
				<th>Picture</th>
				<th>Account Status</th>
			</tr>
		
		<?php

		while($result = mysqli_fetch_assoc($data)){

			echo "<tr>
					<td>".$result['id']."</td>
					<td>".$result['full_name']."</td>
					<td>".$result['father']."</td>
					<td>".$result['mother']."</td>
					<td>".$result['user_name']."</td>
					<td>".$result['password']."</td>
					<td>".$result['age']."</td>
					<td>".$result['gender']."</td>
					<td>".$result['profession']."</td>
					<td>".$result['education']."</td>
					<td>".$result['permanent_address']."</td>
					<td>".$result['present_address']."</td>
					<td>".$result['phone_no']."</td>
					<td>".$result['blood_group']."</td>
					<td>".$result['religion']."</td>
					<td>".$result['weight']."</td>
					<td>".$result['nationality']."</td>
					<td>".$result['registration_date']."</td>
					<td>"; ?> <img src="<?php echo $result['picture']; ?>" height="100" weight="100"/><?php echo "</td>
					<td>".$result['account_status']."</td>
				  </tr>";
		}
	}
	else{
		echo "No record found.";
	}

?>

</table>

<br><a href="logout.php" style="float: right; margin-right: 50%"><button>Logout</button></a><br><br><br><br><br><br>


