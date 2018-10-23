<?php session_start(); ?>
<?php include('conn.php'); ?>

<?php

 
$sql = "INSERT INTO subject (subject_name, subject_grade, subject_code) VALUES ('$_POST[subject_name]','$_POST[subject_grade]', '$_POST[subject_code]')";
 
if(mysqli_query($conn, $sql))
{
    header("Location: successfulRecordSub.html");//  echo "Records Inserted Successfully.";
}
 else
{
    echo "ERROR: Could Not Able To Execute $sql. " . mysqli_error($conn);
}
// Close connection
mysqli_close($conn);

?>