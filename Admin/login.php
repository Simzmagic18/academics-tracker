<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'academicsTracker2');

		$id = $con->real_escape_string($_POST['teacher_id']);
		$password = $con->real_escape_string($_POST['password']);

		$sql = $con->query("SELECT id, password FROM users WHERE teacher_id='$id'");
		if ($sql->num_rows > 0) {
		    $data = $sql->fetch_array();
		    if (password_verify($password, $data['password'])) {
				$msg = "You have been logged IN!";
				
            } else
			    $msg = "Please check your inputs!";
        } else
            $msg = "Please check your inputs!";
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				
				<img src="images/logo.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

			<div class="form-wrapper">
				<form method="post" action="login.php">
				<h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="teacher_id" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>

			</div>
		</div>
	</div>
</body>
</html>