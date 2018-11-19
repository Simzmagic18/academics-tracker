<?php 
include('conn.php');
require_once("session.php");
?>


<?php
$query = " SELECT * FROM `guardian` WHERE guardian_id = '{$_SESSION['user']}' ";
$run_query = mysqli_query($conn, $query);
    
if(mysqli_num_rows($run_query) == 1){
while($result = mysqli_fetch_assoc($run_query)){
$user_fname = $result['guardian_first_name'];
$user_lname = $result['guardian_last_name'];

}
}
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper"> 
    <center><h3>Welcome: <?php echo " " .$user_fname." ".$user_lname; ?> </h3></center>
	 <div class="reminder">
	 
	 	<META http-equiv="refresh" content="2;URL=dependent.php"> 

	 <p><a href="dependent.php">Click to Proceed</a></p>
    <p><a href="logout.php">Log out</a></p>
  </div>
</div>

</body>
</html>