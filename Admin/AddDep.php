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

$department_ID = test_input($_POST['department_ID']);
$name = test_input($_POST['name']);
$school_code = test_input($_POST['school_code']);

$query = "INSERT INTO deprtment (name, school_code, department_ID) VALUES ('$name', '$school_code', '$department_ID')"; 
 
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