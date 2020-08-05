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

	$memberId = $result['id'];

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

<br><h1 class='heading1'>User Suggestion List</h1>



<?php


	$query = "select * from suggestion";

	$data = mysqli_query($conn, $query);

	$totalRow = mysqli_num_rows($data);

	if($totalRow != 0){



		?>


		<table class="donorTable">
			<tr>
				<th>Record No</th>
				<th>User Id</th>
				<th>Suggestion</th>
				<th>Date</th>
				<th>Member Id</th>
				<th>Member Comment</th>
				<th>Operation</th>

			</tr>
		
		<?php

		while($result = mysqli_fetch_assoc($data)){
			

			echo "<tr>
					<td>".$result['id']."</td>
					<td>".$result['user_id']."</td>
					<td>".$result['user_suggestion']."</td>
					<td>".$result['date']."</td>
					<td>".$result['member_id']."</td>
					<td>".$result['comment']."</td>
					<td><a href='memberReplaySuggestion.php?mi=$memberId&id=$result[id]'>Replay</a></td>
				  </tr>";
		}
	}
	else{
		echo "No record found.";
	}

?>

</table>

<br><a href="logout.php" style="float: right; margin-right: 50%"><button>Logout</button></a><br><br><br><br><br><br>



