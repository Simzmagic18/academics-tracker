<?php 
include('conn.php'); 

//$result=mysqli_query($con, "select * from teacher where teacher_id='$session_id'")or die('Error In Session');
//$row=mysqli_fetch_array($result);
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper"> 
    <center><h3>Welcome: <?php echo $row['teacher_first_name']; ?> </h3></center>
	 <div class="reminder">
	 
	 <META http-equiv="refresh" content="2;URL=teachers.html"> 
     <p><a href="teachers.html">Click to Proceed</a></p>
   
    
     
     
     <p><a href="logout.php">Log out</a></p>
  </div>
</div>

</body>
</html>