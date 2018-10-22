<?php
include('conn.php');
//session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	session_start();
	//Username and Password sent from Form
	$username = mysqli_real_escape_string($conn, $_POST['admin_id']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$password = md5($password);
	$_SESSION['login_user']=$username;
	$sql = "SELECT * FROM administrator WHERE admin_id = '$username' AND '$password'";
	$query = mysqli_query($conn, $sql);
	$res=mysqli_num_rows($query);
	
	//If result match $username and $password Table row must be 1 row
	if($res == 1)
	{
		echo 'Password is valid!';
		//$_SESSION['admin_id']=$res['admin_id'];
		header("Location: home.php"); 

		//header("Location: welcome.php");
	}
	else
	{
		echo 'Invalid Username and Password Combination';
	}
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">
  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="admin_id" required="required" placeholder="ID" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input class="button" type="submit" name="submit" value="Login"><br/>
    </div>
  </form>
  	
  <div class="reminder">
   <p><a href="../index.html">Home</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
  
</div>

</body>
</html>
