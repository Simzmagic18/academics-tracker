<?php session_start(); ?>
<?php include('conn.php'); ?>
<?php $login_session = $_SESSION['login_user']; ?>

<!DOCTYPE html>
<html>
<head>
<title>Add Department</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">
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
					<li class="main_nav_item"><a href="ViewOwnProfile.php">PROFILE</a></li>
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
					<li class="menu_item menu_mm"><a href="../about.html">ABOUT US</a></li>
					<li class="menu_item menu_mm"><a href="../contact.html">CONTACT US</a></li>					
					<li class="menu_item menu_mm"><a href="ViewOwnProfile.php">PROFILE</a></li>
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
			<h1>Add Department</h1>
		</div>
	</div>

	<!-- Elements -->

<div class="elements">

    <h2> Enter Department details</h2>

         <div class="form_container">
            <form name = "subject_form" method="post" enctype="multipart/form-data" onsubmit = "return validateAllFields(this)">

			<label for="department_ID"><b>Department ID</b></label> <span id="error-id" span style = "float: right"></span><br>
            <input type="text" name="department_ID" id="department_ID" onblur = "validateID(department_ID)"  maxlength = "20" required /><br>
			
			<hr>
			
            <label for="name"><b>Department Name</b></label> <span id="error-sname" span style = "float: right"></span><br>
            <input type="text" name="name" id="name" onblur = "validateDepName(name)" maxlength = "20" required /><br>          

			<hr>

			<label for="school_code"><b>School Code</b></label> <span id="error-c" span style = "float: right"></span><br>
            <input type="text" name="school_code" id="school_code" onblur = "validateCode(school_code)"  maxlength = "20" required /><br>   	
			
			<hr>
				
            <input type="reset" value="Clear Form">
            <input type="submit" value="Add" formaction="AddDep.php" onclick = "return validateAllFields()">

            </form>

			<script>

		var send = document.getElementsByName("subject_form");

		function validateDepName(name) //accepts hyphens, apostrophes, alphabetic and numerical characters. Also allows for space between two words.
		{

			var combo = /^[A-Za-z0-9 '-]+$/;

			if (combo.test(document.getElementById("name").value)) //subject name should match characters specified in the combo variable.
			{
				document.getElementById ("name").style.background = "white";
				document.getElementById("name").style.display = "inline";
				document.getElementById('error-sname').innerHTML = "Input Accepted.";
				return true;
			}
			else
			{
				document.getElementById ("name").style.background = "red";
				document.getElementById("name").style.display = "inline";
				document.getElementById('error-sname').innerHTML = "Incorrect Input. Please use alphabetic characters only. Hyphens, apostrophes and spaces between words are allowed.";
				return false;
			}

			return name;
		}
		
		function validateID (department_ID) //accepts numbers only
		{
			var numbers = /^[0-9]+$/;

			if (numbers.test(document.getElementById("department_ID").value))
			{
				document.getElementById ("department_ID").style.background = "white";
				document.getElementById("department_ID").style.display = "inline";
				document.getElementById('error-id').innerHTML = "Input Accepted.";
				return true;
			}
			else
			{
				document.getElementById ("department_ID").style.background = "red";
				document.getElementById("department_ID").style.display = "inline";
				document.getElementById('error-id').innerHTML = "Incorrect Input. Please use numerical values only.";
				return false;
			}

			return department_ID;
		}
		
		function validateCode(school_code) //school code should match the code which represents the school
		{
			
			if (!(document.getElementById("school_code").value) == " ") 
			{
				document.getElementById ("school_code").style.background = "white";
				document.getElementById("school_code").style.display = "inline";
				document.getElementById('error-c').innerHTML = "Input Accepted.";
				return true;
			}
			else
			{
				document.getElementById ("school_code").style.background = "red";
				document.getElementById("school_code").style.display = "inline";
				document.getElementById('error-c').innerHTML = "Incorrect Input. School code should not be blank.";
				return false;
			}

			return school_code;
		}
		


		function validateAllFields () //checks if there are any fields with red backgrounds indicating incorrect input.
		{
			if((document.getElementById('name').style.background == "red") || (document.getElementById('department_ID').style.background == "red") || (document.getElementById('school_code').style.background == "red"))
			{
				alert('Please ensure that there are no red fields.');
				event.preventDefault(); //prevents form submission.
				return validateAllFields(x);
			}
			else if ((document.getElementById('name').value == "Select...") || (document.getElementById('department_ID').value == " ") || (document.getElementById('school_code').value == " "))
			{
				alert('Please ensure that all fields are complete.');
				event.preventDefault(); //prevents form submission.
				return validateAllFields(x);
			}
			else
			{

				document.getElementByName("subject_form").submit(); //submits form.
			}

		}

	</script>
<button class="button" onclick="goBack()">Back </button>

	    	<script>
				 function goBack() {
				 window.history.back();
				}
                </script>
         </div>
    
	
</div>
        <br>
        <div class="footer">
                <Span>
                    Academics Tracker All rights reserved
                </Span>
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
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/elements_custom.js"></script>

</body>
</html>

<?php
// Close connection
mysqli_close($conn);

?>