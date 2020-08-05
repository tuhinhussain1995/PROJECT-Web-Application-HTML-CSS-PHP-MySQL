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

	.heading3{
		text-align: center;
		color: green;
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


	echo "<h1 class='heading1'>User Profile</h1>";

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


		echo "<a href='userUpdateUser.php?fn=$result[full_name]&fa=$result[father]&mo=$result[mother]&un=$result[user_name]&ps=$result[password]&ag=$result[age]&gn=$result[gender]&pf=$result[profession]&ed=$result[education]&pe=$result[permanent_address]&pr=$result[present_address]&ph=$result[phone_no]&bg=$result[blood_group]&sn=$sign&re=$result[religion]&we=$result[weight]&na=$result[nationality]'><button style='float: right'>Edit Your Own Profile</button></a>"

	?>

</table>


<br><a href="logout.php" style="float: right; margin-right: 49%"><button>Logout</button></a>

<br><h1 class='heading1'>User Activities</h1>

<h3 class='heading3'>Your Suggestions</h3>

<a href="userAddSuggestion.php" style="float: right; margin-right: 45%"><button>Submit Your Suggestion Here</button></a>
<br><h1 class='heading1'></h1>


<?php

	$query = "select * from suggestion where user_id = '$id'";

	$data = mysqli_query($conn, $query);

	$totalRow = mysqli_num_rows($data);

	if($totalRow != 0){

		?>

		<table class="donorTable">
			<tr>
				<th>User ID</th>
				<th>Your Suggestion</th>
				<th>Replay from Motivation Group</th>
			</tr>
		
		<?php

		while($result = mysqli_fetch_assoc($data)){

			echo "<tr>
					<td>".$result['user_id']."</td>
					<td>".$result['user_suggestion']."</td>
					<td>".$result['comment']."</td>
				  </tr>";
		}
	}
	else{
		echo "You have no record.";
	}

?>

</table>


<br><br><br><h3 class='heading3'>Your Donation Records</h3>


<?php

	$query = "select * from money_donation where user_id = '$id'";

	$data = mysqli_query($conn, $query);

	$totalRow = mysqli_num_rows($data);

	if($totalRow != 0){



		?>


		<table class="donorTable">
			<tr>
				<th>Record No</th>
				<th>User Name</th>
				<th>User Id</th>
				<th>Amount of Money</th>
				<th>Donation Date</th>
			</tr>
		
		<?php

		while($result = mysqli_fetch_assoc($data)){

			echo "<tr>
					<td>".$result['id']."</td>
					<td>".$result['user_name']."</td>
					<td>".$result['user_id']."</td>
					<td>".$result['amount']."</td>
					<td>".$result['donation_date']."</td>
				  </tr>";
		}
	}
	else{
		echo "You have no record.";
	}

?>

</table>

<br><br><br><a href="logout.php" style="float: right; margin-right: 49%"><button>Logout</button></a><br><br><br><br><br><br>


