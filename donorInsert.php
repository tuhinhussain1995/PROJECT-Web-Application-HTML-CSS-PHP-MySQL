<style type="text/css">
	
	h3{text-align: center; margin-top: 100px}

</style>


<?php

	include("connection.php");


	if($_POST['submit']){

		$fn = $_POST['fullName'];
		$fa = $_POST['father'];
		$mo = $_POST['mother'];
		$un = $_POST['username'];         
		$ps = $_POST['password'];
		$ag = $_POST['age'];
		$gn = $_POST['gender'];
		$pf = $_POST['profession'];
		$ed = $_POST['education'];
		$pe = $_POST['perAddr'];
		$pr = $_POST['preAddr'];
		$ph = $_POST['phone'];
		$bg = $_POST['bloodGroup'];
		$re = $_POST['religion'];
		$we = $_POST['weight'];
		$na = $_POST['nationality'];

		$filename = $_FILES["uploadfile"]["name"];
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		$folder = "images/donorPicture/".$filename;

		move_uploaded_file($tempname, $folder);


		if($fn!="" && $fa!="" && $mo!="" && $un!="" && $ps!="" && $ag!="" && $gn!="" && $pf!="" && $ed!="" && $pe!="" && $pr!="" && $ph!="" && $bg!="" && $re!="" && $we!="" && $na!="" && $filename !=""){


			$queryUsername = "select user_name from blood_donor where user_name='$un'";
			$queryPhone = "select phone_no from blood_donor where phone_no='$ph'";

			$dataUsername = mysqli_query($conn, $queryUsername);
			$dataPhone = mysqli_query($conn, $queryPhone);

			$resultUsername = mysqli_fetch_assoc($dataUsername);
			$resultPhone = mysqli_fetch_assoc($dataPhone);


			if ($un==$resultUsername['user_name'] || $ph==$resultPhone['phone_no']) {

				echo "<h3>Blood Donor Registration Failed</h3><br>";

				if ($un==$resultUsername['user_name'] && $ph==$resultPhone['phone_no']) {
					echo "<h3>Because someone else already using this username and phone number</h3>";
					echo "<h3>Please change this username and phone number</h3><br>";
				}
				elseif ($un==$resultUsername['user_name']) {
					echo "<h3>Because someone else already using this username</h3>";
					echo "<h3>Please change this username</h3><br>";
				}
				elseif ($ph==$resultPhone['phone_no']) {
					echo "<h3>Because someone else already using this phone number</h3>";
					echo "<h3>Please change this phone number</h3><br>";
				}



				?>
					<META HTTP-EQUIV="Refresh" CONTENT="10 URL=http://www.motivationgroupbd.org/donnerRegistration.html">
				<?php
			}


			else{

				$query = "insert into blood_donor(full_name, father, mother, user_name, password, age, gender, profession, education,  permanent_address, present_address, phone_no, blood_group, religion, weight, nationality, picture) values('$fn', '$fa', '$mo','$un', '$ps', '$ag', '$gn', '$pf', '$ed','$pe', '$pr', '$ph', '$bg', '$re', '$we', '$na', '$folder')";


				$data = mysqli_query($conn, $query);

				if($data){
					echo "<h3>Blood Donor Registration Successful</h3><br>";
					echo "<h3>Now You Can Log In.</h3>";

					?>
						<META HTTP-EQUIV="Refresh" CONTENT="3 URL=http://www.motivationgroupbd.org/bloodDonorLogin.php">
					<?php

				}
				else{
					echo "User Registration Failed. Not connected with Database.";

					?>
						<META HTTP-EQUIV="Refresh" CONTENT="3 URL=http://www.motivationgroupbd.org/donnerRegistration.html">
					<?php
				}
			}


		}

		else{

			echo "<h3>All field are required</h3>";

			?>
				<META HTTP-EQUIV="Refresh" CONTENT="3 URL=http://www.motivationgroupbd.org/donnerRegistration.html">
			<?php
		} 
	}

?>

