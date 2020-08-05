<?php

	$servername = "localhost";
	$username = "motiflvw_tuhin";
	$password = "2hin@bc0646576";
	$dbname = "motiflvw_motivation";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if($conn){
		echo "";
	}
	else{
		die("Connection failed because ".mysqli_connect_error());
	}

?>