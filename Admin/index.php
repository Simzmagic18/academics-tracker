<?php
include('conn.php');
//session_start();


if(isset($_POST['submit'])){

//Username and Password sent from Form
$login_email = mysqli_real_escape_string($conn, $_POST['email']);
$login_password = mysqli_real_escape_string($conn, $_POST['password']);
$login_password = md5($login_password);  

if(empty($login_email)){
$error_msg = "E-mail Field Can not be empty";
}

elseif(empty($login_password)){
$error_msg = "Password Field Can not be empty";
}

else{
$query = " SELECT * FROM `administrator` WHERE `email` = '{$login_email}' AND `password` = '{$login_password}' ";
$run_query = mysqli_query($conn, $query);
            
if(mysqli_num_rows($run_query) == 1){
session_start();
                
while($result = mysqli_fetch_assoc($run_query)){

echo 'Password is valid!';
$user_id = $result['administrator_ID'];
$_SESSION['user'] = $user_id;

header("Location:home.php");
}
}
else{
$error_msg = "Invalid Username and Password Combination";
}
}
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">
  
<form method='POST' action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="email" required="required" placeholder="Enter E-mail" autofocus required></input>
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