<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'academicsTracker2');

		$name = $con->real_escape_string($_POST['admin_first_name']);
		$mname = $con->real_escape_string($_POST['admin_middle_name']);
                $lname = $con->real_escape_string($_POST['admin_last_name']);
                $dob = $con->real_escape_string($_POST['date_of_birth']);
                $race = $con->real_escape_string($_POST['ethnicity']);
                $gen = $con->real_escape_string($_POST['gender']);
                $type = $con->real_escape_string($_POST['user_type']);
                $password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);

		if ($password != $cPassword)
			$msg = "Please Check Your Passwords!";
		else {
			$hash = password_hash($password, PASSWORD_BCRYPT);
			$con->query("INSERT INTO administrator (admin_first_name,admin_middle_name,admin_last_name,date_of_birth,ethnicity,gender,user_type, password) VALUES ('$name', '$mname','$lname','$dob','$race','$gen','$type', '$hash')");
			$msg = "You have been registered!";
		}
	}
?>

<!doctype html>
<html lang="en">
<head>
<title>Administrator Register</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/news_post_styles.css">
<link rel="stylesheet" type="text/css" href="styles/news_post_responsive.css">
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
					<span>Administrator</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="index.html">home</a></li>
						<li class="main_nav_item"><a href="#">about us</a></li>
						<li class="main_nav_item"><a href="courses.html">courses</a></li>
						<li class="main_nav_item"><a href="contact.html">contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
<<<<<<< HEAD:Admin/RegisterNewTeacher.html
            <div class="header_side d-flex flex-row justify-content-center align-items-center">
		    <a href="index.html"><span>LOGOUT</span></a>
                    </div>
                
=======
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="images/phone-call.svg" alt="">
			<span>Administrator</span>
		</div>
>>>>>>> c22fdb30f2808b206f0df5bd6a6629969f67afa6:Admin/registerAdmin.php

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
					<li class="menu_item menu_mm"><a href="index.html">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">About us</a></li>
					<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/news_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Register New Administrator</h1>
		</div>
	</div>
        
        <div class="container">
            <br><h2>Please Complete Form</h2>
           
            
            <h3>User Information</h3><br>

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

				<form method="post" action="registerAdmin.php">
			<label for="admin_first_name"><b>First Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-fname" span style = "float: right"></span><br>
            <input type="text" name="admin_first_name" id ="admin_first_name" onblur ="validateFirstName(admin_first_name)"  maxlength = "20" required /><br>
								
			<hr>
			
            <label for="admin_middle_name"><b>Middle Name</b></label> <span id="error-mname" span style = "float: right"></span><br>
            <input type="text" name="admin_middle_name" id = "admin_middle_name"  onblur ="validateMiddleName(admin_middle_name)" maxlength = "20" ><br>
			
			<hr>
			
            <label for="admin_last_name"><b>Last Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-lname" span style = "float: right"></span><br>
            <input type="text" name="admin_last_name" id = "admin_last_name" onblur ="validateLastName(admin_last_name)" maxlength = "20" required><br>
			
			<hr>
			
			<label for="gender"> <b>Gender <abbr class="req" title="required">*</abbr></b></br></label> <span id ="error-gender" span style = "float: right"></span> <br>
            <select id = "gender" name = "gender" onblur ="validateGender(gender)" required>
				<option value="" >Select...</option>
				<option value="male">Male</option>
				<option value="female">Female</option>   
			</select>
			
			<hr>
			
			<label for="ethnicity"><b>Ethnicity <abbr class="req" title="required">*</abbr></b><br></label> <span id ="error-race" span style = "float: right"></span><br>
			<select id = "ethnicity" name = "ethnicity" onblur ="validateEthnicity(ethnicity)" required>
				<option value="">Select...</option>
				<option value="white">White</option>
				<option value="coloured">Coloured</option>
				<option value="black">Black</option> 
				<option value="asian">Asian</option>			
			</select>	
				
			<hr>
			
			<label for="date_of_birth"> <b>Date of Birth <abbr class="req" title="required">*</abbr>:</b></label> <span id ="error-date" span style = "float: right"></span><br>
            <input type="date" id="date_of_birth" name="date_of_birth" onblur = "validateDate (date_of_birth)" required>
			
			<hr>
			
			<label for="contact_number"><b>Phone Number <abbr class="req" title="required">*</abbr></b></label> <span id="error-phone" span style = "float: right"></span><br>
            <input type="text" name="contact_number" id = "contact_number" onblur = "validatePhoneNumber (contact_number)" maxlength = "15" required><br>
			
			<hr>			
			
			<h3>Residential Information</h3><br>

			
			<label for="house number"><b>House Number <abbr class="req" title="required">*</abbr></b></label> <span id="error-housen" span style = "float: right"></span><br>
            <input type="text" name="house_number" id="house_number" onblur = "validateHouseNum (house_number)" maxlength = "6" required><br>
			
			<hr>
			
			<label for="street name"><b>Street Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-streetn" span style = "float: right"></span><br>
            <input type="text" name="street_name" id="street_name" onblur = "validateStreetName (street_name)" maxlength = "25" required><br>
            
			<hr>
			
			<label for="suburb"><b>Suburb <abbr class="req" title="required">*</abbr></b></label> <span id="error-sub" span style = "float: right"></span><br>
            <input type="text" name="suburb" id="suburb" onblur = "validateSuburb (suburb)" maxlength = "25" required><br>
			
			<hr>			
			
			<label for="post code"><b>Post Code <abbr class="req" title="required">*</abbr></b></label> <span id="error-pcode" span style = "float: right"></span><br>
            <input type="text" name="post_code" id="post_code" onblur = "validatePostCode (post_code)" maxlength = "10" required><br>
			
			<hr>
			            
            <h3>School Information</h3><br>
			
			<label for="school_code"><b>School ID</b></label> <span id="error-sid" span style = "float: right"></span><br>
            <input type="text" id = "school_code" name="school_code"  maxlength = "4" ><br>
			
			<hr>
			
			<b>User Type:</b><br>
            <label for="user_type">Administrator <abbr class="req" title="required">*</abbr></label>
			<input  type="radio" name="user_type" id="user_type" value="Administrator" readonly><br>
			
			<hr>
            
			<label for="password"><b>Create Password <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-pass" span style = "float: right"></span><br>
            <input type="password" name="password" id="password" onblur = "validateCreatePassword (password)" size="25" required><br>

			<hr>
                        
                        <br>	<input minlength="5" name="cPassword" type="password" placeholder="Confirm Password..."><br>
            
            <input name="submit" type="submit" value="Register..." onclick = "return validateAllFields()">
            
				</form>

			</div>
		</div>
	</div>
        
         <button class="button" onclick="goBack()"> Back </button>
            <script>
            function goBack() {
            window.history.back();
            }
            </script>
			
			    <script>
	
	var send = document.getElementsByName("admin_form");
	
	
	function validateFirstName(admin_first_name)
	{  
 		var alpha = /^[A-Za-z'-]+$/;
		var numbers = /^[0-9]+$/;
		var combo = /^[A-Za-z0-9_]+$/;
		
	if(alpha.test(document.getElementById("admin_first_name").value))
		{  
			document.getElementById("admin_first_name").style.background = "white";	
			document.getElementById("error-fname").style.display = "inline";	
			document.getElementById('error-fname').innerHTML = "Input Accepted."; 
			return true;  
		}
		else if(numbers.test(document.getElementById("admin_first_name").value))
		{  
			document.getElementById("admin_first_name").style.background = "red"; 
			document.getElementById('error-fname').innerHTML = "Incorrect Input. Use alphabetic characters, apostrophes and hyphens only."; 
			return false;  
		}		
		else if (combo.test(document.getElementById("admin_first_name").value))
		{
			document.getElementById("admin_first_name").style.background = "red"; 
			document.getElementById('error-fname').innerHTML = "Incorrect Input. Use alphabetic characters, apostrophes and hyphens only."; 
			return false;
		}
		else if (!((admin_first_name.keyCode >= 65) && (admin_first_name.keyCode <= 90) || (admin_first_name.keyCode >= 97) && (admin_first_name.keyCode <= 122) || (admin_first_name.keyCode >= 48) && (admin_first_name.keyCode <= 57) && (!(admin_first_name.keyCode == 32))))
		{
			document.getElementById("admin_first_name").style.background = "red"; 
			document.getElementById('error-fname').innerHTML = "Incorrect Input. Please Use alphabetic characters, apostrophes and hyphens only."; 
			return false;
		}		
		else
		{
			document.getElementById("admin_first_name").style.background = "yellow"; 
			document.getElementById('error-fname').innerHTML = "Please Enter Admin First Name."; 
			return false;
		}
		
	return admin_first_name;
 	}

	function validateMiddleName(admin_middle_name)
	{  
 		var alpha = /^[A-Za-z'-]+$/;
		var numbers = /^[0-9]+$/;
		var combo = /^[A-Za-z0-9_]+$/;
		
		if((alpha.test(document.getElementById("admin_middle_name").value)) || (admin_middle_name.value.length == 0))
		{  
			document.getElementById("admin_middle_name").style.background = "white";	
			document.getElementById("error-mname").style.display = "inline";	
			document.getElementById('error-mname').innerHTML = "Input Accepted."; 	
			return true;  
		}
		else if(numbers.test(document.getElementById("admin_middle_name").value))
		{  
			document.getElementById("admin_middle_name").style.background = "red"; 
			document.getElementById('error-mname').innerHTML = "Incorrect Input. Use alphabetic characters, apostrophes and hyphens only."; 
			
			return false;  
		}		
		else if (combo.test(document.getElementById("admin_middle_name").value))
		{
			document.getElementById("admin_middle_name").style.background = "red"; 
			document.getElementById('error-mname').innerHTML = "Incorrect Input. Use alphabetic characters, apostrophes and hyphens only."; 
			return false;
		}
		else if (!((admin_middle_name.keyCode >= 65) && (admin_middle_name.keyCode <= 90) || (admin_middle_name.keyCode >= 97) && (admin_middle_name.keyCode <= 122) || (admin_middle_name.keyCode >= 48) && (admin_middle_name.keyCode <= 57) && (!(admin_middle_name.keyCode == 32))))
		{
			document.getElementById("admin_middle_name").style.background = "red"; 
			document.getElementById('error-mname').innerHTML = "Incorrect Input. Please Use alphabetic characters, apostrophes and hyphens only."; 
			return false;
		}		
		else
		{
			document.getElementById("admin_middle_name").style.background = "yellow"; 
			document.getElementById('error-mname').innerHTML = "Please Enter Admin Middle Name."; 
			return false;
		}
	
	return admin_middle_name;
 	} 
	
	function validateLastName(admin_last_name)
	{  
 		var alpha = /^[A-Za-z'-]+$/;
		var numbers = /^[0-9]+$/;
		var combo = /^[A-Za-z0-9_]+$/;
		
		if(alpha.test(document.getElementById("admin_last_name").value))
		{  
			document.getElementById("admin_last_name").style.background = "white";	
			document.getElementById("error-lname").style.display = "inline";	
			document.getElementById('error-lname').innerHTML = "Input Accepted."; 	
			return true;  
		}
		else if(numbers.test(document.getElementById("admin_last_name").value))
		{  
			document.getElementById("admin_last_name").style.background = "red"; 
			document.getElementById('error-lname').innerHTML = "Incorrect Input. Use alphabetic characters, apostrophes and hyphens only."; 
			return false;  
		}		
		else if (combo.test(document.getElementById("admin_last_name").value))
		{
			document.getElementById("admin_last_name").style.background = "red"; 
			document.getElementById('error-lname').innerHTML = "Incorrect Input. Use alphabetic characters, apostrophes and hyphens only."; 
			return false;
		}
		else if (!((admin_last_name.keyCode >= 65) && (admin_last_name.keyCode <= 90) || (admin_last_name.keyCode >= 97) && (admin_last_name.keyCode <= 122) || (admin_last_name.keyCode >= 48) && (admin_last_name.keyCode <= 57) && (!(admin_last_name.keyCode == 32))))
		{
			document.getElementById("admin_last_name").style.background = "red"; 
			document.getElementById('error-lname').innerHTML = "Incorrect Input. Please Use alphabetic characters, apostrophes and hyphens only."; 
			return false;
		}		
		else
		{
			document.getElementById("admin_last_name").style.background = "yellow"; 
			document.getElementById('error-lname').innerHTML = "Please Enter Admin Last Name."; 
			return false;
		}	
		
		return admin_last_name;
 	} 
	
	function validateGender(gender)
	{
		var genders = document.getElementById ('gender').value;
		
		
		if (genders == "")
		{
			document.getElementById ("gender").style.background = "red";	
			document.getElementById("gender").style.display = "inline";	
			document.getElementById('error-gender').innerHTML = "Incorrect Input. Please select gender.";
			return false;
		
		}
		else if (genders == "male")
		{
			document.getElementById ("gender").style.background = "white";
			document.getElementById("gender").style.display = "inline";	
			document.getElementById('error-gender').innerHTML = "Input Accepted.";
			return true;
		}
		else if (genders == "female")
		{
			document.getElementById ("gender").style.background = "white";
			document.getElementById("gender").style.display = "inline";
			document.getElementById('error-gender').innerHTML = "Input Accepted.";
			return true;
		}	
		
		return gender;
	}
	
	function validateEthnicity(ethnicity)
	{
		var race = document.getElementById ('ethnicity').value;
		
		
		if (race == "")
		{
			document.getElementById ("ethnicity").style.background = "red";	
			document.getElementById("ethnicity").style.display = "inline";	
			document.getElementById('error-race').innerHTML = "Incorrect Input. Please select ethnicity.";
			return false;
		
		}
		else if (race == "white")
		{
			document.getElementById ("ethnicity").style.background = "white";
			document.getElementById("ethnicity").style.display = "inline";	
			document.getElementById('error-race').innerHTML = "Input Accepted.";
			return true;
		}
		else if (race == "black")
		{
			document.getElementById ("ethnicity").style.background = "white";
			document.getElementById("ethnicity").style.display = "inline";
			document.getElementById('error-race').innerHTML = "Input Accepted.";
			return true;
		}
		else if (race == "coloured")
		{
			document.getElementById ("ethnicity").style.background = "white";
			document.getElementById("ethnicity").style.display = "inline";	
			document.getElementById('error-race').innerHTML = "Input Accepted.";
			return true;
		}
		else if (race == "asian")
		{
			document.getElementById ("ethnicity").style.background = "white";
			document.getElementById("ethnicity").style.display = "inline";	
			document.getElementById('error-race').innerHTML = "Input Accepted.";
			return true;
		}
		
		return ethnicity;
	}
	
	function validateDate(date_of_birth)
	{
		var dob = document.getElementById ('date_of_birth').value;
		
		if (dob == "")
		{
			document.getElementById ("date_of_birth").style.background = "red";
			document.getElementById("date_of_birth").style.display = "inline";	
			document.getElementById('error-date').innerHTML = "Incorrect Input. Please choose the correct date";
			return false;
		}
		else 
		{
			document.getElementById ("date_of_birth").style.background = "white";
			document.getElementById("date_of_birth").style.display = "inline";	
			document.getElementById('error-date').innerHTML = "Input Accepted.";
			return true;
		}
		
		return date_of_birth;		
	}
	
	function validatePhoneNumber (contact_number)
	{
		var numbers = /^[0-9]+$/;
		
		if ((numbers.test(document.getElementById("contact_number").value)) && (contact_number.value.length >= 10))
		{
			document.getElementById ("contact_number").style.background = "white";
			document.getElementById("contact_number").style.display = "inline";	
			document.getElementById('error-phone').innerHTML = "Input Accepted.";
			return true;
		}
		else
		{
			document.getElementById ("contact_number").style.background = "red";
			document.getElementById("contact_number").style.display = "inline";	
			document.getElementById('error-phone').innerHTML = "Incorrect Input. Please use numerical values only. And please check if the length of phone number is greater than 10.";
			return false;
		}
		
		return contact_number;
	}
	
	function validateHouseNum(house_number)
	{
		
		var combo = /^[A-Za-z0-9_]+$/;
		
		if (combo.test(document.getElementById("house_number").value))
		{
			document.getElementById ("house_number").style.background = "white";
			document.getElementById("house_number").style.display = "inline";	
			document.getElementById('error-housen').innerHTML = "Input Accepted.";
			return true;
		}
		else
		{
			document.getElementById ("house_number").style.background = "red";
			document.getElementById("house_number").style.display = "inline";	
			document.getElementById('error-housen').innerHTML = "Incorrect Input. Please use alphabetic and numerical values only.";
			return false;
		}
		
		return house_number;
	}
	
	function validateStreetName(street_name)
	{
		var alpha = /^[A-Za-z'-]+$/;
		
		if(alpha.test(document.getElementById("street_name").value))
		{  
			document.getElementById("street_name").style.background = "white";	
			document.getElementById("street_name").style.display = "inline";	
			document.getElementById('error-streetn').innerHTML = "Input Accepted."; 
			return true;  
		} else 
		{
			document.getElementById ("street_name").style.background = "red";
			document.getElementById("street_name").style.display = "inline";	
			document.getElementById('error-streetn').innerHTML = "Incorrect Input. Please use alphabetic and numerical values only.";
			return false;
		}

		return street_name;
	}

	function validateSuburb(suburb)
	{
		var alpha = /^[A-Za-z'-]+$/;
		
		if(alpha.test(document.getElementById("suburb").value))
		{  
			document.getElementById("suburb").style.background = "white";	
			document.getElementById("suburb").style.display = "inline";	
			document.getElementById('error-sub').innerHTML = "Input Accepted.";
			return true;  
		} else 
		{
			document.getElementById ("suburb").style.background = "red";
			document.getElementById("suburb").style.display = "inline";	
			document.getElementById('error-sub').innerHTML = "Incorrect Input. Please use alphabetic and numerical values only.";
			return false;
		}	
		
		return suburb;
	}
	
	function validatePostCode (post_code)
	{
		var combo = /^[A-Za-z0-9_]+$/;
		
		if(!(combo.test(document.getElementById("post_code").value)) || (post_code.value.length == 0))
		{  
			document.getElementById ("post_code").style.background = "red";
			document.getElementById("post_code").style.display = "inline";	
			document.getElementById('error-pcode').innerHTML = "Incorrect Input. Please use alphabetic and numerical values only.";
			return false;  
		} else 
		{
			document.getElementById("post_code").style.background = "white";	
			document.getElementById("post_code").style.display = "inline";	
			document.getElementById('error-pcode').innerHTML = "Input Accepted."; 		
			return true;
		}
		
		return post_code;
	}
	
	
	function validateAdminID(admin_id)
	{
		var numbers = /^[0-9]+$/;
		
		if ((numbers.test(document.getElementById("admin_id").value)) && (admin_id.value.length == 8))
		{
			document.getElementById("admin_id").style.background = "white";	
			document.getElementById("admin_id").style.display = "inline";	
			document.getElementById('error-adid').innerHTML = "Input Accepted."; 				 
			return true;
		}
		else
		{
			document.getElementById ("admin_id").style.background = "red";
			document.getElementById("admin_id").style.display = "inline";	
			document.getElementById('error-adid').innerHTML = "Incorrect Input. Please use numerical values only. And please check if the length of ID is 8.";
			return false; 
		}
		
		return admin_id;
	}
	
	function validateCreatePassword(password)
	{		
		if(password.value.length > 8)
		{
			document.getElementById("password").style.background = "white";	
			document.getElementById("password").style.display = "inline";	
			document.getElementById('error-pass').innerHTML = "Input Accepted."; 
			return true;
		}
		else
		{
			document.getElementById ("password").style.background = "red";
			document.getElementById("password").style.display = "inline";	
			document.getElementById('error-pass').innerHTML = "Incorrect Input. Please check if the length of chosen password more than 8 characters long.";
			return false;
		}
		
		return password;
	}
	

function validateAllFields ()
{	
    if((document.getElementById('admin_first_name').style.background == "red") || (document.getElementById('admin_middle_name').style.background == "red") || (document.getElementById('admin_last_name').style.background == "red") || (document.getElementById('gender').style.background == "red") || (document.getElementById('ethnicity').style.background == "red") || (document.getElementById('date_of_birth').style.background == "red") || (document.getElementById('contact_number').style.background == "red") || (document.getElementById('house_number').style.background == "red") || (document.getElementById('street_name').style.background == "red") || (document.getElementById('suburb').style.background == "red") || (document.getElementById('post_code').style.background == "red") || (document.getElementById('school_code').style.background == "red") || (document.getElementById('admin_id').style.background == "red") || (document.getElementById('password').style.background == "red"))
	{
        alert('Please ensure that there are no red fields');
		event.preventDefault();
        return validateAllFields(x);
    }
	else
	{
		
		document.getElementByName("admin_form").submit();
	}
	
}		
	</script>
        
        </div>
        <br>
	<!-- Footer -->

<<<<<<< HEAD:Admin/RegisterNewTeacher.html
        <div class="footer">
                <Span>
                    Academics Tracker All rights reserved
                </Span>
        </div>
=======
	<footer class="footer">
		<div class="container">

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="images/logo.png" alt="">
								<span>course</span>
							</div>
						</div>

						<p class="footer_about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum, tempor lacus.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="index.html">Home</a></li>
								<li class="footer_list_item"><a href="#">About Us</a></li>
								<li class="footer_list_item"><a href="courses.html">Courses</a></li>
								<li class="footer_list_item"><a href="news.html">News</a></li>
								<li class="footer_list_item"><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Usefull Links</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Testimonials</a></li>
								<li class="footer_list_item"><a href="#">FAQ</a></li>
								<li class="footer_list_item"><a href="#">Community</a></li>
								<li class="footer_list_item"><a href="#">Campus Pictures</a></li>
								<li class="footer_list_item"><a href="#">Tuitions</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Blvd Libertad, 34 m05200 Ar�valo
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									0034 37483 2445 322
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>hello@company.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>
>>>>>>> c22fdb30f2808b206f0df5bd6a6629969f67afa6:Admin/registerAdmin.php

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
        
</body>
</html>