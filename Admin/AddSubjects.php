<?php session_start(); ?>
<?php include('dbcon.php'); ?>

<?php

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");
 
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "INSERT INTO subject (subject_name, subject_grade, subject_code) VALUES ('$_POST[subject_name]','$_POST[subject_grade]', '$_POST[subject_code]')";
 
if(mysqli_query($link, $sql))
{
    echo "Records Inserted Successfully.";
}
 else
{
    echo "ERROR: Could Not Able To Execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);

?>