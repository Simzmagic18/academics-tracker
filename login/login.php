
<!doctype html>
<?php 

    // call the configuration file which sets up connection to database and starts the session
    include('config.php'); 

    // Checks if email hs been entered on login page if so starts login process
    if(isset($_POST['loginEmail'])){
    
        // Gather user email and password from login form on this page
        $uemail=$_POST['loginEmail'];  
        $upass=$_POST['loginPassword'];

        $upass =  md5($upass); //  encrypt the password

        // select the email and password from the DB to see if account is valid
        $sql="select * from player where email='$uemail' AND password='$upass' limit 1 ";
        $sql2="select * from profile where email='$uemail' AND password='$upass' limit 1 ";
        $upass =  md5($upass); //  encrypt the password
        $result=mysqli_query($conn, $sql);
        $result2=mysqli_query($conn, $sql2);

        // Used to get id of account logging in so as to initialize the session variables needed for the user
        $pid = "";

        // if user is a player this if statement will evaluate to true
        if(mysqli_num_rows($result)==1){

        while($tmp_result = mysqli_fetch_array($result)){
            $pid = $tmp_result['playerID'];
        }

        // code to initialize session variable for player data
        $pid_query = "select * from player where playerID = '$pid'";
        $run_pid_query = mysqli_query($conn, $pid_query);
        while($tmp_result = mysqli_fetch_array($run_pid_query)){
            $_SESSION['playerID'] = $pid;
            $_SESSION['email'] = $tmp_result['email'];
            $_SESSION['firstName'] = $tmp_result['firstName'];
            $_SESSION['lastName'] = $tmp_result['lastName'];
            $_SESSION['nickName'] = $tmp_result['nickName'];
            $_SESSION['dob'] = $tmp_result['dateOfBirth'];
            $_SESSION['gender'] = $tmp_result['gender'];
            $_SESSION['weight'] = $tmp_result['weight'];
            $_SESSION['height'] = $tmp_result['height'];
            $_SESSION['homeAddress'] = $tmp_result['homeAddress'];
            $_SESSION['city'] = $tmp_result['city'];
            $_SESSION['country'] = $tmp_result['country'];
            $_SESSION['postalCode'] = $tmp_result['postalCode'];
            $_SESSION['phoneNumber'] = $tmp_result['phoneNumber'];
            $_SESSION['pgEmail'] = $tmp_result['parentGuardianEmail'];
            $_SESSION['pgPhoneNumber'] = $tmp_result['parentGuardianContactNumber'];
            $_SESSION['pgFirstName'] = $tmp_result['parentGuardianFirstName'];
            $_SESSION['pgLastName'] = $tmp_result['parentGuardianLastName'];

//$_SESSION['schoolclubID'] = $tmp_result['schoolclubID'];
//$_SESSION['teamID'] = $tmp_result['teamID'];

            $_SESSION['schoolclubID'] = $tmp_result['schoolclubID'];

            $_SESSION['personalGoals'] = $tmp_result['personalGoals'];
        }


        // sets loggedIn to true as user has logged in with valid details so it is fine to allow them to navigate the website so take them to the homepage
        $_SESSION['loggedIn'] = true;
        echo"<script>location.href='player/home.php'</script>"; 
        exit();
    
    }
    // if user is a administrator, team manager or coach this if statement will evaluate to true
    else if (mysqli_num_rows($result2)==1){
                //gets the profile id of the user logging in
                while($tmp_result = mysqli_fetch_array($result2)){
                    $pid = $tmp_result['profileID'];
                }

                // get the profile information of the account that has logged in
                $pid_query = "select * from profile where profileID = '$pid'";
                $run_pid_query = mysqli_query($conn, $pid_query);

                // initialize the session variables with account data to be used while browsing the site
                while($tmp_result = mysqli_fetch_array($run_pid_query)){
                    $_SESSION['profileID'] = $pid;
                    $_SESSION['profileEmail'] = $tmp_result['email'];
                    $_SESSION['profileRoleID'] = $tmp_result['roleID'];
                    $_SESSION['profileFirstName'] = $tmp_result['firstName'];
                    $_SESSION['profileLastName'] = $tmp_result['lastName'];
                    $_SESSION['profileSchoolClubID'] = $tmp_result['schoolclubID'];
                }

                // get role data and assign it to an array
                $roleID = $_SESSION['profileRoleID'];
                $query = "select * from role where roleID='$roleID'";
                $result = mysqli_query($conn, $query);
                $result = mysqli_fetch_array($result);
                
                // Set the page to navigate to according to the role of the user logging in 
                if ($result['name'] == "administrator"){
                    $page = $result['name'] . "/dashboard.php";
                    $_SESSION['profileRole'] = "Administrator";
                }
                    
                else if ($result['name'] == "coach"){
                    $page = $result['name'] . "/dashboard.php";
                    $_SESSION['profileRole'] = "Coach";
                }
                    
                else{
                    $page = "teammanager/dashboard.php";
                    $_SESSION['profileRole'] = "Team Manager";
                }
                    
                
                
                // assign the school/club id of the account logging in to be used when add data to the database that requires association to a school/club
                $schoolclubID = $_SESSION['profileSchoolClubID'];
                $query = "select * from schoolclub where schoolclubID='$schoolclubID'";
                $result = mysqli_query($conn, $query);
                $result = mysqli_fetch_array($result);
                // Get school/club name to display for profiles viewed from this account as all accounts will be associated to the user's school/club
                $_SESSION['profileSchool'] = $result['name']; 
                // Set loggedIn to true as valid user account is logged in and should be allowed access to the website dashboard
                $_SESSION['loggedIn'] = true;
                echo"<script>location.href='$page'</script>"; //if the password and email match , direct the user to the homepage.
                exit();
        }
        else{
            echo"<script>alert('Email or Password is incorrect')</script>"; // message box to be displayed if email or password is wrong.
            $_SESSION['loggedIn'] = false; // set loggedIn to false as no valid user account has logged in and therefore no access to the website should be granted.
            echo"<script>location.href='login.php'</script>"; //else if results dont match, redirect the user to the login page.
            exit();
        }
    }
?>
<html lang="en">
	<head>
		<title>Mi Sport - Log (Login)</title>
		<link rel="icon" type="image/png" href="assets/img/favicon%20(2).png">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, width=device-width, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
		 crossorigin="anonymous">
		<!-- Paper kit and Paper Dashboard CSS. -->
		<link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet">
		<!-- Fonts and icons -->
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/nucleo-icons.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="assets/css/mi-paper-kit-2.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- This is the placeholder for the alert that pops up after user actions -->
		<alert></alert>
		<!-- The navbar has z-index: 1; so that the if the card display with the input fields scrolls to the top of the page it overlaps the navbar, this gives the card display more space on the webpage and allows one to click the company logo to go to the landing page as with z-index:0 you can't click on the logo if the card display is too far up the page. And padding-top: 0; is there so that the company logo is pushed further up the webpage making more space for the card display. -->
		<nav class="navbar navbar-expand-lg fixed-top navbar-transparent" style="z-index:1; padding-top:0">
				<div class="container">
						<div class="navbar-translate">
								<!-- style="background-color: #fff" is put so that the image stands out more in the transparent navbar -->
								<a class="navbar-brand" href="index.php"><img src="assets/img/asset-1.png" style="background-color: #fff"></a>
						</div>
				</div>
		</nav>
		<!-- bg-img is the css class that contains the background image and my-filter is the css class that contains the code to overlay a dark filter over the background image -->
		<div class="bg-img">
	    <div class="my-filter">
				<!-- The class login-forgot-page refers to a page of input fields on the login page whether it be the actual login page or the forgot password page -->
				<div class="login-forgot-page">
					<!-- the style="padding-top:100px" Used to add padding to the top of the card display so that it can be positined lower on the page and not overlap with the navbar. -->
					<div class="container" style="padding-top:100px">
						<div class="row">
								<!-- Changed the below col-md-4 to col-xl-4 as the md or xl refers to when the page should revert to mobile rows and it was changed to xl to make it more responsive as when scaling with the developer pane on chrome it would not look proper
								Also ml and mr should refer to margin left and margin right as they seem to center the card display-->
								<div class="col-xl-4 ml-auto mr-auto">
									<!-- The animate css class was taken from the code from tino and tanaka to animate the card on load. And this is the card display-->
									<div class="card card-register animate">
										<h3 class="title" style="color:#FFF">Login</h3>
										<!-- The reason we have onsubmit="return false" is so that when clicking the button for the form it does not reload the page losing all the content of the input fields -->
										<form action="login.php" method="POST" class="register-form" name="loginForm" onsubmit="verifyLogin().login.php">
											<label>Email</label>
											<!-- The <loginemail> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
											<input name="loginEmail" type="text" class="form-control" placeholder="Email" required>
											<label>Password</label>
											<!-- The <loginpassword> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
											<input name="loginPassword" type="password" class="form-control" placeholder="Password" required>
											<!-- The <loginbutton> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
											<button name="loginButton" type="submit" class="btn btn-mi-sports btn-block btn-round" onclick="verifyLogin()">Login</button>
												  
									<!--	   <input type="submit" name="loginButton" value="Login" class="btn btn-mi-sports btn-block btn-round" onclick="verifyLogin()"> -->
										</form>
										<div class="forgot">
											<a href="#" class="btn btn-link btn-mi-sports login-forgot">Forgot password?</a>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="login-forgot-page">
					<!-- the style="padding-top:120px" Used to add padding to the top of the card register so that it can be positined lower on the page and not overlap with the navbar. -->
					<div class="container forgot" style="padding-top:120px">
						<!-- The divs with class row and col-xl-4 ml-auto mr-auto are used to position the form box -->
						<div class="row">
							<!-- Changed the below col-md-4 to col-xl-4 as the md or xl refers to when the page should revert to mobile rows and it was changed to xl to make it more responsive as when scaling with the developer pane on chrome it would not look proper
							Also ml and mr should refer to margin left and margin right as they seem to center the card-register-->
							<div class="col-xl-4 ml-auto mr-auto">
								<!-- The animate css class was taken from the code from tino and tanaka to animate the card on load. And this is the card display-->
								<div class="card card-register animate">
									<h3 class="title" style="color:#FFF">Forgot Password</h3>
									<p>Enter your email address so we can send a link to reset your password</p>
									<!-- The reason we have onsubmit="return false" is so that when clicking the button for the form it does not reload the page losing all the content of the input fields -->
									<form action="forgot.php" method="post" class="register-form" name="forgotForm">
										<label>Email</label>
										<!-- The <forgotemail> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
										<forgotemail><input name="forgotEmail" type="text" class="form-control" placeholder="Email"></forgotemail>
											<!-- The <forgotclicked> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
											<forgotclicked><button name="sendLinkButton" type="submit" class="btn btn-mi-sports btn-block btn-round" onclick="sendLink()">Send Reset Link</button></forgotclicked>
									</form>
									<a href="login.html" class="btn btn-link btn-mi-sports login-forgot">Back to Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <footer class="footer footer-black">
            <div class="container">
                <span>
                    
                </span>
            </div>
            <div class="container">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <a href="#">Terms and Conditions</a>
                            </li>
                            <li>
                                <a href="#">Copa</a>
                            </li>
                            <li>
                                <a href="#">About us</a>
                            </li>
                            <li>
                                <a href="contact-us.html">Contact us</a>
                            </li>
                            <li>
                                <a href="#">FAQs</a>
                            </li>
                            <li>
                                <a href="">Privacy policy</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </footer>
		<!-- The following code is from the bootstrap website except the first uncommented script-->
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<!-- using the non-slim version as .animate not part of the slim version and removed the integrity and crossorigin as it wasn't working -->
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		 crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
		 crossorigin="anonymous"></script>
		<!--  Paper Kit Initialization and functons -->
		<script src="assets/js/paper-kit.js?v=2.1.0"></script>
		 <!-- Custom JavaScript -->
		<script src="assets/js/login-register.js" type="text/javascript"></script>
		<script src="assets/js/mi-sport.js" type="text/javascript"></script>
	</body>
</html>


