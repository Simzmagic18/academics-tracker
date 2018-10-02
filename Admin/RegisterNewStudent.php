<?php session_start(); ?>
<?php include('dbcon.php'); ?>

<?php

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");
 
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

	$sql1 = "INSERT INTO student (student_first_name, student_middle_name, student_last_name, date_of_birth, ethnicity, gender, password, user_type) VALUES ('$_POST[student_first_name]','$_POST[student_middle_name]','$_POST[student_last_name]','$_POST[date_of_birth]','$_POST[ethnicity]','$_POST[gender]','$_POST[password]','$_POST[user_type]')";
	//$sql2 = "INSERT INTO contacts (house_number, street_name, suburb, post_code, contact_number, id, user_type) VALUES ('$_POST[house_number]','$_POST[street_name]','$_POST[suburb]','$_POST[post_code]','$_POST[contact_number]','$_POST[id]','$_POST[user_type]')";

if(mysqli_query($link, $sql1))
{
	//if(mysqli_query($link, $sql2))
	//{
	  
	  
	      readfile("successfulRecord.html");
	
   		// echo  "<html><META http-equiv="refresh" content="1;URL=succefulRecord.html"><html>";
   		 
   		 
   		 
   		// "Records Inserted Successfully.";
	//}
}
 else
{
    echo "ERROR: Could Not Able To Execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);

?>