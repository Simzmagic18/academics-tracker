<?php 
include('conn.php'); 
include('session.php');

$result=mysqli_query($conn, "select * from aministrator where admin_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper"> 
    <center><h3>Welcome: <?php echo $row['admin_first_name']; ?> </h3></center>
	 <div class="reminder">
	 
	 	<META http-equiv="refresh" content="2;URL=Administrator.html"> 

	 <p><a href="Administrator.html">Click to Proceed</a></p>
    <p><a href="logout.php">Log out</a></p>
  </div>
</div>

</body>
</html>