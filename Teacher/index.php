<?php session_start(); ?>
<?php include('dbcon.php');?>

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
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
	</form>
	
  <?php
	if (isset($_POST['submit']))
		{
			$username = mysqli_real_escape_string($connect, $_POST["user"]);  
			$password = mysqli_real_escape_string($connect, $_POST["pass"]);  
			$password = md5($password);  
			$query = "SELECT * FROM teacher WHERE user = '$username' AND password = '$password'";  
			$result = mysqli_query($connect, $query);  
			if(mysqli_num_rows($result) > 0)  

				if ($num_row > 0) {
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
   <p><a href="index.html">Home</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
  
</div>

</body>

</html>