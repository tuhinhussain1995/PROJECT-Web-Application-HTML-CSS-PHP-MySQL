<?php

	include("connection.php");


	if($_POST['submit']){

		$fn = $_POST['fullName'];
		$un = $_POST['username'];         
		$ps = $_POST['password'];
		$pf = $_POST['profession'];
		$ed = $_POST['education'];
		$ph = $_POST['phone'];

		$filename = $_FILES["uploadfile"]["name"];
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		$folder = "images/adminPicture/".$filename;

		move_uploaded_file($tempname, $folder);


		if($fn!="" && $un!="" && $ps!="" && $pf!="" && $ed!="" && $ph!="" && $filename !=""){

			$query = "insert into admin(full_name, user_name, password, profession, education, phone_no, picture) values('$fn','$un', '$ps', '$pf', '$ed', '$ph', '$folder')";


			$data = mysqli_query($conn, $query);

			if($data){
				echo "Data inserted into database";
			}
			else{
				echo "Data insert failed";
			}
		}
		else{

			echo "All field are required";
		} 
	}

?>

