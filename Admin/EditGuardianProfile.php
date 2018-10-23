<?php session_start(); ?> <!-- begin php session-->
<?php include('dbcon.php'); ?> <!--establish connection -->


<?php

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");

if(isset($_POST["guardian_id"]))
{	
	$id = $_POST['guardian_id'];
	
}
	
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$connectDb = mysqli_select_db($link, 'academicsTracker2');
	
$query = $link->query("SELECT * FROM guardian WHERE guardian_id=$id");
$query2 = $link->query("SELECT * FROM contacts WHERE guardian_id=$id");

$row1 = $query->fetch_assoc();
$row2 = $query2->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Guardian Profile</title>
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
			<h1>Edit Guardian Profile</h1>
		</div>
	</div>

        <div class="container">
            <br><h2>Edit Guardian Profile</h2>

            <br>

            <h3>User Information</h3><br>
        <form action="UpdateGuardianProfile.php" name = "guardian_form" method="post" enctype="multipart/form-data" onsubmit = "return validateAllFields(this)">


			<label for="guardian_first_name"><b>First Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-fname" span style = "float: right"></span><br>
            <input type="text" name="guardian_first_name" id ="guardian_first_name" value="<?php echo $row1['guardian_first_name']; ?>" onblur ="validateFirstName(guardian_first_name)"  maxlength = "20" required /><br>

			<hr>

            <label for="guardian_middle_name"><b>Middle Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-mname" span style = "float: right"></span><br>
            <input type="text" name="guardian_middle_name" id = "guardian_middle_name"  value="<?php echo $row1['guardian_middle_name']; ?>" onblur ="validateMiddleName(guardian_middle_name)" maxlength = "20" ><br>

			<hr>

            <label for="guardian_last_name"><b>Last Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-lname" span style = "float: right"></span><br>
            <input type="text" name="guardian_last_name" id = "guardian_last_name" value="<?php echo $row1['guardian_last_name']; ?>" onblur ="validateLastName(guardian_first_name)" maxlength = "20" required ><br>

			<hr>

			<label for="gender"> <b>Gender <abbr class="req" title="required">*</abbr></b></br></label> <span id ="error-gender" span style = "float: right"></span> <br>
            <input type="text" name="gender" value="<?php echo $row1['gender']; ?>" id = "gender" maxlength = "20" required /><br>
			<select id = "gender" name = "gender" onblur ="validateGender(gender)" required>
				<option value="" >Select...</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>

			<hr>

			<label for="ethnicity"><b>Ethnicity <abbr class="req" title="required">*</abbr></b><br></label> <span id ="error-race" span style = "float: right"></span><br>
			<input type="text" name="ethnicity" value="<?php echo $row1['ethnicity']; ?>" id = "ethnicity" maxlength = "20" required /><br>
			<select id = "ethnicity" name = "ethnicity" onblur ="validateEthnicity(ethnicity)" required>
				<option value="">Select...</option>
				<option value="white">White</option>
				<option value="coloured">Coloured</option>
				<option value="black">Black</option>
				<option value="asian">Asian</option>
			</select>
			
			<hr>

			<label for="date_of_birth"> <b>Date of Birth <abbr class="req" title="required">*</abbr>:</b></label> <span id ="error-date" span style = "float: right"></span><br>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row1['date_of_birth']; ?>" onblur = "validateDate (date_of_birth)" required />

			<hr>

			<label for="contact_number"><b>Phone Number <abbr class="req" title="required">*</abbr></b></label> <span id="error-phone" span style = "float: right"></span><br>
            <input type="text" name="contact_number" value="<?php echo $row2['contact_number']; ?>" onblur = "validatePhoneNumber (contact_number)" id = "contact_number" maxlength = "15" required /><br>

			<hr>

			<h3>Residential Information</h3><br>


			<label for="house number"><b>House Number <abbr class="req" title="required">*</abbr></b></label> <span id="error-housen" span style = "float: right"></span><br>
            <input type="text" name="house_number" value="<?php echo $row2['house_number']; ?>" onblur = "validateHouseNum (house_number)" id="house_number" maxlength = "6" required /><br>

			<hr>

			<label for="street name"><b>Street Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-streetn" span style = "float: right"></span><br>
            <input type="text" name="street_name" value="<?php echo $row2['street_name']; ?>" onblur = "validateStreetName (street_name)" id="street_name" maxlength = "25" required /><br>

			<hr>

			<label for="suburb"><b>Suburb <abbr class="req" title="required">*</abbr></b></label> <span id="error-sub" span style = "float: right"></span><br>
            <input type="text" name="suburb" value="<?php echo $row2['suburb']; ?>" onblur = "validateSuburb (suburb)" id="suburb" maxlength = "25" required /><br>

			<hr>

			<label for="post code"><b>Post Code <abbr class="req" title="required">*</abbr></b></label> <span id="error-pcode" span style = "float: right"></span><br>
            <input type="text" name="post_code" value="<?php echo $row2['post_code']; ?>" onblur = "validatePostCode (post_code)" id="post_code" maxlength = "10" required /><br>

			<hr>

            <h3>School Information</h3><br>

			<label for="school_code"><b>School ID</b></label> <span id="error-sid" span style = "float: right"></span><br>
            <input type="text" id = "school_code" value="022" name="school_code"  maxlength = "3"  /><br>

			<hr>

			<b>User Type: <abbr class="req" title="required">*</abbr></b> <br>
            <label for="user_type">Guardian </label>
			<input  type="radio" name="user_type" id="user_type" value="Guardian" checked="checked"  /><br>

			<hr>

            <label for="guardian_id"><b>Create User ID <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-adid" span style = "float: right"></span><br>
            <input type="text" name="guardian_id" value="<?php echo $row1['guardian_id']; ?>" id="guardian_id" maxlength="8" readonly /><br>

			<hr>
			
			<label for="password"><b>Create Password <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-pass" span style = "float: right"></span><br>
            <input type="password" name="password" value="<?php echo $row1['password']; ?>" onblur = "validateCreatePassword (password)" id="password" size="25" required /><br>
						

			<hr>
           
			
		   <label for="cPassword"><b>Confirm Password <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-pass2" span style = "float: right"></span><br>
		   <input type="password" name="cPassword" id="cPassword" onblur = "validateConfirmPassword (cPassword)" size="25" required><br>

			<hr>

            <input type="submit" value = "Save" name = "Save" onclick = "return validateAllFields()">
			
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
			
			<script>
			var send = document.getElementsByName("guardian_form");

		function validateFirstName(guardian_first_name) //validates first name. Accepts certain characters. Cannot be blank.
		{
			var alpha = /^[A-Za-z '-]+$/; //contains alphabetic characters, apostrophes and hyphens (accepted characters).
			var numbers = /^[0-9]+$/; //contains numbers (unaccepted input).
			var combo = /^[A-Za-z0-9_]+$/; //contains a combination of alphabetic characters, numerical values and other special characters (unaccepted input).

		if(alpha.test(document.getElementById("guardian_first_name").value))
			{
				document.getElementById("guardian_first_name").style.background = "white";	//background of textbox
				document.getElementById("error-fname").style.display = "inline";	//error message is displayed next to field immediately after removing focus on the field.
				document.getElementById('error-fname').innerHTML = "Input Accepted."; //Message to be printed depending on input.
				return true;
			}
			else if(numbers.test(document.getElementById("guardian_first_name").value))
			{
				document.getElementById("guardian_first_name").style.background = "red";
				document.getElementById('error-fname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only."; //Message to be printed depending on input.
				return false;
			}
			else if (combo.test(document.getElementById("guardian_first_name").value))
			{
				document.getElementById("guardian_first_name").style.background = "red";
				document.getElementById('error-fname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (!((guardian_first_name.keyCode >= 65) && (guardian_first_name.keyCode <= 90) || (guardian_first_name.keyCode >= 97) && (guardian_first_name.keyCode <= 122) || (guardian_first_name.keyCode >= 48) && (guardian_first_name.keyCode <= 57) && (!(guardian_first_name.keyCode == 32)))) //special characters based on their ASCII code
			{
				document.getElementById("guardian_first_name").style.background = "red";
				document.getElementById('error-fname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else
			{
				document.getElementById("guardian_first_name").style.background = "yellow";
				document.getElementById('error-fname').innerHTML = "Please Enter guardian First Name.";
				return false;
			}

			return guardian_first_name;
		}

		function validateMiddleName(guardian_middle_name)
		{
			var alpha = /^[A-Za-z '-]+$/;
			var numbers = /^[0-9]+$/;
			var combo = /^[A-Za-z0-9_]+$/;

			if((alpha.test(document.getElementById("guardian_middle_name").value)) || (guardian_middle_name.value.length == 0))
			{
				document.getElementById("guardian_middle_name").style.background = "white";
				document.getElementById("error-mname").style.display = "inline";
				document.getElementById('error-mname').innerHTML = "Input Accepted. It can be left blank.";
				return true;
			}
			else if(numbers.test(document.getElementById("guardian_middle_name").value))
			{
				document.getElementById("guardian_middle_name").style.background = "red";
				document.getElementById('error-mname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (combo.test(document.getElementById("guardian_middle_name").value))
			{
				document.getElementById("guardian_middle_name").style.background = "red";
				document.getElementById('error-mname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (!((guardian_middle_name.keyCode >= 65) && (guardian_middle_name.keyCode <= 90) || (guardian_middle_name.keyCode >= 97) && (guardian_middle_name.keyCode <= 122) || (guardian_middle_name.keyCode >= 48) && (guardian_middle_name.keyCode <= 57) && (!(guardian_middle_name.keyCode == 32))))
			{
				document.getElementById("guardian_middle_name").style.background = "red";
				document.getElementById('error-mname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else
			{
				document.getElementById("guardian_middle_name").style.background = "yellow";
				document.getElementById('error-mname').innerHTML = "Please Enter guardian Middle Name.";
				return false;
			}

			return guardian_middle_name;
		}

		function validateLastName(guardian_last_name)
		{
			var alpha = /^[A-Za-z '-]+$/;
			var numbers = /^[0-9]+$/;
			var combo = /^[A-Za-z0-9_]+$/;

			if(alpha.test(document.getElementById("guardian_last_name").value))
			{
				document.getElementById("guardian_last_name").style.background = "white";
				document.getElementById("error-lname").style.display = "inline";
				document.getElementById('error-lname').innerHTML = "Input Accepted.";
				return true;
			}
			else if(numbers.test(document.getElementById("guardian_last_name").value))
			{
				document.getElementById("guardian_last_name").style.background = "red";
				document.getElementById('error-lname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (combo.test(document.getElementById("guardian_last_name").value))
			{
				document.getElementById("guardian_last_name").style.background = "red";
				document.getElementById('error-lname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (!((guardian_last_name.keyCode >= 65) && (guardian_last_name.keyCode <= 90) || (guardian_last_name.keyCode >= 97) && (guardian_last_name.keyCode <= 122) || (guardian_last_name.keyCode >= 48) && (guardian_last_name.keyCode <= 57) && (!(guardian_last_name.keyCode == 32))))
			{
				document.getElementById("guardian_last_name").style.background = "red";
				document.getElementById('error-lname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else
			{
				document.getElementById("guardian_last_name").style.background = "yellow";
				document.getElementById('error-lname').innerHTML = "Please Enter guardian Last Name.";
				return false;
			}

			return guardian_last_name;
		}

		function validateGender(gender)
		{
			var genders = document.getElementById ('gender').value; //variable to determine selected value on dropdown list

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
			var race = document.getElementById ('ethnicity').value; //variable to determine selected value on dropdown list

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
			var dob = document.getElementById ('date_of_birth').value; //variable which determines date of birth selected
		var myDOB = new Date(dob); //date of birth chosen
		var today = new Date(); //the date today

			if (dob == "") //if nothing is selected
			{
				document.getElementById ("date_of_birth").style.background = "red";
				document.getElementById("date_of_birth").style.display = "inline";
				document.getElementById('error-date').innerHTML = "Incorrect Input. Please choose the correct date";
				return false;
			}
			else if (myDOB > today) //if chosen date is after today's date
			{
				document.getElementById ("date_of_birth").style.background = "red";
				document.getElementById("date_of_birth").style.display = "inline";
				document.getElementById('error-date').innerHTML = "Incorrect Input. Date of birth cannot be in the future. Please choose a date in the past.";
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

		function validatePhoneNumber (contact_number) //accepts numbers only
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

		function validateHouseNum(house_number) //accepts alphabetic and numerical characters only
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

		function validateStreetName(street_name) //accepts alphabetic characters, hyphens and apostrophes only. Also allows for space character between two words.
		{
			var alpha = /^[A-Za-z '-\s]+$/;

			if(alpha.test(document.getElementById("street_name").value))
			{
				document.getElementById("street_name").style.background = "white";
				document.getElementById("street_name").style.display = "inline";
				document.getElementById('error-streetn').innerHTML = "Input Accepted.";
				return true;
			} else if (street_name.value.length == 0)
			{
				document.getElementById ("street_name").style.background = "red";
				document.getElementById("street_name").style.display = "inline";
				document.getElementById('error-streetn').innerHTML = "Incorrect Input. The field is either blank or has the incorrect characters. Please use alphabetic characters only. Hyphens and apostrophes are allowed.";
				return false;
			}

				return street_name;
		}

		function validateSuburb(suburb)  //accepts alphabetic characters, hyphens and apostrophes only. Also allows for space character between two words.
		{
			var alpha = /^[A-Za-z '-\s]+$/;

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
				document.getElementById('error-sub').innerHTML = "Incorrect Input. Please use alphabetic characters only. Hyphens and apostrophes are allowed.";
				return false;
			}

				return suburb;
		}

		function validatePostCode (post_code) //allows numerical characters only.
		{
			var combo = /^[0-9]+$/;

			if(!(combo.test(document.getElementById("post_code").value)) || (post_code.value.length == 0))
			{
				document.getElementById ("post_code").style.background = "red";
				document.getElementById("post_code").style.display = "inline";
				document.getElementById('error-pcode').innerHTML = "Incorrect Input. Please use numerical values only.";
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

		function validateguardianID(guardian_id) //allows numerical characters only and length should be 8
		{
			var numbers = /^[0-9]+$/;

			if ((numbers.test(document.getElementById("guardian_id").value)) && (guardian_id.value.length == 8))
			{
				document.getElementById("guardian_id").style.background = "white";
				document.getElementById("guardian_id").style.display = "inline";
				document.getElementById('error-adid').innerHTML = "Input Accepted.";
				return true;
			}
			else
			{
				document.getElementById ("guardian_id").style.background = "red";
				document.getElementById("guardian_id").style.display = "inline";
				document.getElementById('error-adid').innerHTML = "Incorrect Input. Please use numerical values only. And please check if the length of ID is 8.";
				return false;
			}

			return guardian_id;
		}

		function validateCreatePassword(password) //allows for any character
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

		function validateConfirmPassword(cPassword)
	{		
		if(password.value != cPassword.value) {

			document.getElementById ("cPassword").style.background = "red";
			document.getElementById("cPassword").style.display = "inline";	
			document.getElementById('error-pass2').innerHTML = "Passwords Don't Match.";
			return false;
  } else {
	document.getElementById("cPassword").style.background = "white";	
			document.getElementById("cPassword").style.display = "inline";	
			document.getElementById('error-pass2').innerHTML = "Input Accepted."; 
			return true;
  }
		
		return cPassword;
	}
	

function validateAllFields ()
{	
    if((document.getElementById('guardian_first_name').style.background == "red") || (document.getElementById('guardian_middle_name').style.background == "red") || (document.getElementById('guardian_last_name').style.background == "red") || (document.getElementById('gender').style.background == "red") || (document.getElementById('ethnicity').style.background == "red") || (document.getElementById('date_of_birth').style.background == "red") || (document.getElementById('contact_number').style.background == "red") || (document.getElementById('house_number').style.background == "red") || (document.getElementById('street_name').style.background == "red") || (document.getElementById('suburb').style.background == "red") || (document.getElementById('post_code').style.background == "red") || (document.getElementById('school_code').style.background == "red") || (document.getElementById('teacher_id').style.background == "red") || (document.getElementById('password').style.background == "red") || (document.getElementById("cPassword").style.background== "red"))
	{
					alert('Please ensure that there are no red fields'); //alert window
				event.preventDefault(); //prevents submission
					return validateAllFields(x);
			}
			else
			{
				document.getElementByName("guardian_form").submit(); //submits form
			}
		}
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