<?php session_start(); ?>
<?php include('dbcon.php'); ?>

<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$connectDb = mysqli_select_db($link, 'academicsTracker2');



?>
   
<html lang="en">
<head>
<title>Search Teacher</title>
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
			<div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>User Management</h1>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
				<div class="col-lg-8">
                                    <h2> Enter Teacher ID</h2>
                                    <form class="search" action="ViewTeacherProfile.php" method = "post">
                                        
                                    <input type="text" placeholder="Search..." name="submit">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                    
                                    </form>

<?php

	if(isset($_POST['submit'])) //accepts id entered in textfield
	{	
		$submit = $_POST['submit'];	
		
			$query = "SELECT * FROM teacher WHERE teacher_id='submit'";	//selects from teacher table
			$query2 = "SELECT * FROM contacts WHERE teacher_id='submit'"; //selects from contacts table
		
			$result = mysqli_query ($link, $query);
			$result2 = mysqli_query ($link, $query2);
			
			
		}
	
		

?>
    
    
    
				</div>
		</div>
	</div>
            <button onclick="goBack()">Go Back</button>

        <script>
        function goBack() {
            window.history.back();
        }
        </script>
<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}
</style>

<div class="footer">
  <p>r</p>
</div

</div>

<script src="js/jsubmit-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/scrollTo/jsubmit.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/news_post_custom.js"></script>


</body>
</html>

<?php	
// Close connection
mysqli_close($link);
?>