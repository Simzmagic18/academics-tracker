<?php session_start(); ?> <!-- begin php session-->
<?php include('dbcon.php'); ?> <!--establish connection -->
<?php $login_session = $_SESSION['login_user']; ?>

<?php

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");

if(isset($_POST['submit']))
{	
	$submit = $_POST['submit'];	
}

var_dump($_POST);
	
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$connectDb = mysqli_select_db($link, 'academicsTracker2');
	
//$query = $link->query("SELECT * FROM student WHERE student_id=$submit");

//$row1 = $query->fetch_assoc();
?>


<!DOCTYPE html>

<head>
<title>Subjects</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/news_styles.css">
<link rel="stylesheet" type="text/css" href="styles/news_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">
</head>

<!-- Header -->
<header class="header d-flex flex-row">
	<div class="header_content d-flex flex-row align-items-center">
		<!-- Logo -->
		<div class="logo_container">
			<div class="logo">
				<img src="images/ATlogo221.png" alt="logo" width="64px" height="66px">&nbsp;
				<span>AT: Administrator</span>
			</div>
		</div>

		<!-- Main Navigation -->
		<nav class="main_nav_container">
			<div class="main_nav">
				<ul class="main_nav_list">
					<li class="main_nav_item"><a href="Student.html">HOME</a></li>
					<li class="main_nav_item"><a href="../about.html">ABOUT US</a></li>
					<li class="main_nav_item"><a href="../contact.html">CONTACT US</a></li>
					<li class="main_nav_item"><a href="ViewOwnProfile.php?a=$login_session" >PROFILE</a></li>
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

<body>
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
				<li class="menu_item menu_mm"><a href="Student.html">HOME</a></li>
				<li class="menu_item menu_mm"><a href="../about.html">ABOUT US</a></li>
				<li class="menu_item menu_mm"><a href="../contact.html">CONTACT US</a></li>
				<li class="menu_item menu_mm"><a href="ViewOwnProfile.php" >PROFILE</a></li>
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
		<h2>Subjects 
		</h2>
	</div>
</div>

<!--Buttons-->
<div align="center">
	<h4></h4> 
	
	<form method = "post" action = "AddNewSubjects.php" name = "subject_form" enctype="multipart/form-data">
		<button class="button" onclick="AddNewSubjects.php"> Add Subjects </button>
		<button class="button" formaction = "ViewSubjects.php"> View Subjects </button>
	</form>
	
</div>

<br><br>
<div class="footer">
                <Span>
                    Academics Tracker All rights reserved
                </Span>
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
<script src="js/news_custom.js"></script>
</body>
</html>

<?php	
// Close connection
mysqli_close($link);
?>