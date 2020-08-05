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

<br><a href="adminHome.php" style="float: left"><button> <= Go Back</button></a>

<a href="logout.php" style="float: right; margin-right: 50%"><button>Logout</button></a>

<br><h1 class='heading1'>Money Donation List</h1>

<a href="adminAddMoneyDonation.php" style="float: right; margin-right: 1%"><button>Add New Record</button></a><br><br>

<?php


	$query = "select * from money_donation";

	$data = mysqli_query($conn, $query);

	$totalRow = mysqli_num_rows($data);

	if($totalRow != 0){



		?>


		<table class="donorTable">
			<tr>
				<th>Record No</th>
				<th>User Name</th>
				<th>User ID</th>
				<th>Amount of Money</th>
				<th>Member ID</th>
				<th>Donation Date</th>
			</tr>
		
		<?php

		while($result = mysqli_fetch_assoc($data)){
			

			echo "<tr>
					<td>".$result['id']."</td>
					<td>".$result['user_name']."</td>
					<td>".$result['user_id']."</td>
					<td>".$result['amount']."</td>
					<td>".$result['member_id']."</td>
					<td>".$result['donation_date']."</td>
				  </tr>";
		}
	}
	else{
		echo "No record found.";
	}

?>

</table>

<br><a href="logout.php" style="float: right; margin-right: 50%"><button>Logout</button></a><br><br><br><br><br><br>



