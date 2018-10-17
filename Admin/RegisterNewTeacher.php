<?php session_start(); ?>
<?php include('dbcon.php'); ?>

<?php

$con = mysqli_connect("localhost", "root", "", "academicsTracker2");
 
if($con === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




/*$hashed_password = crypt('password'); // let the salt be automatically generated

/* You should pass the entire results of crypt() as the salt for comparing a
   password, to avoid problems when different hashing algorithms are used. (As
   it says above, standard DES-based password hashing uses a 2-character salt,
   but MD5-based hashing uses 12.) 
if (hash_equals($hashed_password, crypt( $hashed_password))) {
   echo "Password verified!";
} */




//$password1= hash('sha512', '$_POST[password]');

//$sql = "INSERT INTO teacher(password) VALUES ($password1)";
	//

	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'academicsTracker2');

		$name = $con->real_escape_string($_POST['teacher_first_name']);
		$mname = $con->real_escape_string($_POST['teacher_middle_name']);
                $lname = $con->real_escape_string($_POST['teacher_last_name']);
                $dob = $con->real_escape_string($_POST['date_of_birth']);
                $race = $con->real_escape_string($_POST['ethnicity']);
                $gen = $con->real_escape_string($_POST['gender']);
				$type = $con->real_escape_string($_POST['user_type']);
				$scode = $con->real_escape_string($_POST['school_code']);
                
		$cPassword = $con->real_escape_string($_POST['cPassword']);
		$password = $con->real_escape_string($_POST['password']);
		$hash = md5($password);
		if ($password != $cPassword)
			$msg = "Please Check Your Passwords!";
		else {
			$con->query("INSERT INTO teacher (teacher_first_name,teacher_middle_name,teacher_last_name,date_of_birth,ethnicity,gender,user_type, school_code, password) VALUES ('$name', '$mname','$lname','$dob','$race','$gen','$type', '$scode','$hash')");
			readfile("successfulRecord3.html");// echo "Records Inserted Successfully.";
		}
	}

// Close connection
mysqli_close($con);

?>

