<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="form-item">
	<input type="radio" name="user_role" value="HOD" checked></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			$user     = mysqli_real_escape_string($con, $_POST['user_role']);
			
			$query 		= mysqli_query($con, "SELECT * FROM guardian  WHERE  password='$password' and guardian_id='$username' and user_type='$user'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['teacher_id']=$row['teacher_id'];
					header('location:home.php');
					
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
  <div class="reminder">
   <p><a href="../index.html">HOME</a></p>
    <p><a href="#"></a></p>
  </div>
  
</div>

</body>
</html>