<?php session_start(); ?>
<?php include('conn.php'); ?>

<?php

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$subject_name = test_input($_POST['subject_name']);
$class_ID = test_input($_POST['class_ID']);
$department_ID = test_input($_POST['department_ID']);
$subject_code = test_input($_POST['subject_code']);

$query = "INSERT INTO subject (subject_name, class_ID, department_ID, subject_code) VALUES ('$subject_name', '$class_ID', '$department_ID', '$subject_code')"; 
 
if(mysqli_query($conn, $query))
{
    header("Location: successfulRecordSub.html");//  echo "Records Inserted Successfully.";
}
 else
{
    echo "ERROR: Could Not Able To Execute $query. " . mysqli_error($conn);
}
// Close connection
mysqli_close($conn);

?>