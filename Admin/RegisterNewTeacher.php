<?php session_start(); ?>
<?php include('dbcon.php'); ?>

<?php

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");
 
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//$password1= hash('sha512', '$_POST[password]');

//$sql = "INSERT INTO teacher(password) VALUES ($password1)";
	//
	
$sql1 = "INSERT INTO teacher (teacher_first_name, teacher_middle_name, teacher_last_name, date_of_birth, ethnicity, gender, password, user_type) VALUES ('$_POST[first_name]','$_POST[middle_name]','$_POST[last_name]','$_POST[date_of_birth]','$_POST[ethnicity]','$_POST[gender]','$_POST[password]','$_POST[user_type]')";
	//$sql2 = "INSERT INTO contacts (house_number, street_name, suburb, post_code, contact_number, id, user_type) VALUES ('$_POST[house_number]','$_POST[street_name]','$_POST[suburb]','$_POST[post_code]','$_POST[contact_number]','$_POST[id]','$_POST[user_type]')";

if(mysqli_query($link, $sql1))
{
	//if(mysqli_query($link, $sql2))
	//{   
	      readfile("successfulRecord3.html");
   		// echo "Records Inserted Successfully.";
	//}
}
 else
{
    echo "ERROR: Could Not Able To Execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);

?>