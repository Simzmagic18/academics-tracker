<?php session_start(); ?> <!-- begin php session-->
<?php include('dbcon.php'); ?> <!--establish connection -->


<?php

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");

if(isset($_POST['submit']))
{	
	$submit = $_POST['submit'];
	
}
	
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$connectDb = mysqli_select_db($link, 'academicsTracker2');
	
$query = $link->query("SELECT * FROM guardian WHERE guardian_id=$submit");
$query2 = $link->query("SELECT * FROM contacts WHERE guardian_id=$submit");

$row1 = $query->fetch_assoc();
$row2 = $query2->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Guardian Profile</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/news_post_styles.css">
<link rel="stylesheet" type="text/css" href="styles/news_post_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/logo.png" alt="">
					<span>AT: Administrator</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="Administrator.html">HOME</a></li>
						<li class="main_nav_item"><a href="subdir/about_Us.html">ABOUT US</a></li>
						<li class="main_nav_item"><a href="subdir/contact.html">CONTACT</a></li>
						<li class="main_nav_item"><a href="profile.html">PROFILE</a></li>
					</ul>
				</div>
			</nav>
		</div>
            <div class="header_side d-flex flex-row justify-content-center align-items-center">
                    <a href="logout.php"><span>LOGOUT</span></a>
            </div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>

	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="Administrator.html">HOME</a></li>
					<li class="menu_item menu_mm"><a href="subdir/about_Us.html">ABOUT US</a></li>
					<li class="menu_item menu_mm"><a href="subdir/contact.html">CONTACT US</a></li>
					<li class="menu_item menu_mm"><a href="profile.html">PROFILE</a></li>
					<li class="menu_item menu_mm"><a href="logout.php">LOGOUT</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Home -->
	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/news_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>View Guardian Profile</h1>
		</div>
	</div>

        <div class="container">
            <br><h2>Click The Edit Button Below To Make Necessary Changes</h2>

            <br>

            <h3>User Information</h3><br>
        <form action="EditGuardianProfile.php" name = "guardian_form" method="post" enctype="multipart/form-data">


			<label for="guardian_first_name"><b>First Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-fname" span style = "float: right"></span><br>
            <input type="text" name="guardian_first_name" id ="guardian_first_name" value="<?php echo $row1['guardian_first_name']; ?>"  maxlength = "20" readonly /><br>

			<hr>

            <label for="guardian_middle_name"><b>Middle Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-mname" span style = "float: right"></span><br>
            <input type="text" name="guardian_middle_name" id = "guardian_middle_name"  value="<?php echo $row1['guardian_middle_name']; ?>" maxlength = "20" readonly ><br>

			<hr>

            <label for="guardian_last_name"><b>Last Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-lname" span style = "float: right"></span><br>
            <input type="text" name="guardian_last_name" id = "guardian_last_name" value="<?php echo $row1['guardian_last_name']; ?>" maxlength = "20" readonly ><br>

			<hr>

			<label for="gender"> <b>Gender <abbr class="req" title="required">*</abbr></b></br></label> <span id ="error-gender" span style = "float: right"></span> <br>
            <input type="text" name="gender" value="<?php echo $row1['gender']; ?>" id = "gender" maxlength = "20" readonly /><br>

			<hr>

			<label for="ethnicity"><b>Ethnicity <abbr class="req" title="required">*</abbr></b><br></label> <span id ="error-race" span style = "float: right"></span><br>
			<input type="text" name="ethnicity" value="<?php echo $row1['ethnicity']; ?>" id = "ethnicity" maxlength = "20" readonly /><br>
			<hr>

			<label for="date_of_birth"> <b>Date of Birth <abbr class="req" title="required">*</abbr>:</b></label> <span id ="error-date" span style = "float: right"></span><br>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row1['date_of_birth']; ?>" readonly />

			<hr>

			<label for="contact_number"><b>Phone Number <abbr class="req" title="required">*</abbr></b></label> <span id="error-phone" span style = "float: right"></span><br>
            <input type="text" name="contact_number" value="<?php echo $row2['contact_number']; ?>" id = "contact_number" maxlength = "15" readonly /><br>

			<hr>

			<h3>Residential Information</h3><br>


			<label for="house number"><b>House Number <abbr class="req" title="required">*</abbr></b></label> <span id="error-housen" span style = "float: right"></span><br>
            <input type="text" name="house_number" value="<?php echo $row2['house_number']; ?>" id="house_number" maxlength = "6" readonly /><br>

			<hr>

			<label for="street name"><b>Street Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-streetn" span style = "float: right"></span><br>
            <input type="text" name="street_name" value="<?php echo $row2['street_name']; ?>" id="street_name" maxlength = "25" readonly /><br>

			<hr>

			<label for="suburb"><b>Suburb <abbr class="req" title="required">*</abbr></b></label> <span id="error-sub" span style = "float: right"></span><br>
            <input type="text" name="suburb" value="<?php echo $row2['suburb']; ?>" id="suburb" maxlength = "25" readonly /><br>

			<hr>

			<label for="post code"><b>Post Code <abbr class="req" title="required">*</abbr></b></label> <span id="error-pcode" span style = "float: right"></span><br>
            <input type="text" name="post_code" value="<?php echo $row2['post_code']; ?>" id="post_code" maxlength = "10" readonly /><br>

			<hr>

            <h3>School Information</h3><br>

			<label for="school_code"><b>School ID</b></label> <span id="error-sid" span style = "float: right"></span><br>
            <input type="text" id = "school_code" value="022" name="school_code"  maxlength = "3" readonly /><br>

			<hr>

			<b>User Type: <abbr class="req" title="required">*</abbr></b> <br>
            <label for="user_type">Guardian </label>
			<input  type="radio" name="user_type" id="user_type" value="Guardian" checked="checked" readonly /><br>

			<hr>

            <label for="guardian_id"><b>Create User ID <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-adid" span style = "float: right"></span><br>
            <input type="text" name="guardian_id" value="<?php echo $row1['guardian_id']; ?>" id="guardian_id" maxlength="8" readonly /><br>

			<hr>
			
			<label for="password"><b>Create Password <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-pass" span style = "float: right"></span><br>
            <input type="password" name="password" value="<?php echo $row1['password']; ?>" id="password" size="25" readonly /><br>
						

			<hr>
           
			
		   <label for="cPassword"><b>Confirm Password <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-pass2" span style = "float: right"></span><br>
		   <input type="password" name="cPassword" id="cPassword" value="<?php echo $row1['cPassword']; ?>"  size="25" required><br>

			<hr>

            <input type="submit" name = "Edit" value = "Edit" onclick = "EditGuardianProfile.php" />
			
            </form>

            <button class="button" onclick="goBack()">Back </button>

	    <script>
             function goBack() {
             window.history.back();
            }
            </script>

            <script>
                ("input[required]").parent("label").addClass("required");
            </script>


        </div>
	<!-- Footer -->

    <div class="footer">
        <span>
            Academics Tracker All rights reserved
        </span>
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/news_post_custom.js"></script>
<script src ="formValidation.js"></script>

</body>
</html>
<?php	
// Close connection
mysqli_close($link);
?>