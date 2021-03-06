<?php 
include('conn.php'); 
require_once("session.php");
?>

<?php
$query = " SELECT * FROM `administrator`  WHERE adminstrator_ID = '{$_SESSION['user']}' ";
$run_query = mysqli_query($conn, $query);
    
if(mysqli_num_rows($run_query) == 1){
while($result = mysqli_fetch_assoc($run_query)){
	$user_fname = $result['admin_first_name'];
	$user_lname = $result['admin_last_name'];

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/news_styles.css">
<link rel="stylesheet" type="text/css" href="styles/news_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">

</head>
<body>

	<div class="super_container">

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
							<li class="main_nav_item"><a href="Administrator.html">HOME</a></li>
							<li class="main_nav_item"><a href="../about.html">ABOUT US</a></li>
							<li class="main_nav_item"><a href="../contact.html">CONTACT US</a></li>
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

		<!--body-->
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
						<li class="menu_item menu_mm"><a href="../about.html">ABOUT US</a></li>
						<li class="menu_item menu_mm"><a href="../contact.html">CONTACT US</a></li>
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
				<h1>Welcome: <?php echo $user_fname." ".$user_lname; ?></h1>
			</div>
		</div>

		<!--Buttons-->
		<div align="center">
			<h1>&nbsp;</h1> 
			<a href="Register New Users.html" class="button">Register New User</a>
			<a href="SearchUser.html" class="button">Manage Users</a>
                        <a href="Manage Subjects.html" class="button">Manage Subjects</a><br>
		</div>
                <br>
						<div class="row" style="background-image:url(images/milestones_background.jpg)">
                                                    <!-- number of students -->
							<div class="col-lg-3 milestone_col">
								<div class="milestone text-center">
									<div class="milestone_icon"><img src="images/milestone_1.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
									<div class="milestone_counter" data-end-value="750">0</div>
									<div class="milestone_text"> Students </div>
								</div>
							</div>

							<!-- Number of teachers -->
							<div class="col-lg-3 milestone_col">
								<div class="milestone text-center">
									<div class="milestone_icon"><img src="images/milestone_2.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
									<div class="milestone_counter" data-end-value="120">0</div>
									<div class="milestone_text"> Teachers </div>
								</div>
							</div>

							<!-- Number of HODs -->
							<div class="col-lg-3 milestone_col">
								<div class="milestone text-center">
									<div class="milestone_icon"><img src="images/milestone_2.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
									<div class="milestone_counter" data-end-value="39">0</div>
									<div class="milestone_text"> HODs </div>
								</div>
							</div>

							<!-- number of parents -->
							<div class="col-lg-3 milestone_col">
								<div class="milestone text-center">
									<div class="milestone_icon"><img src="images/milestone_5.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
									<div class="milestone_counter" data-end-value="3500" data-sign-before="+">0</div>
									<div class="milestone_text"> Parents </div>
								</div>
							</div>
						</div>
					
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