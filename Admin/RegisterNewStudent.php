<?php
include('conn.php');//DB Connection

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// Information sent from Form
	$name = mysqli_real_escape_string($conn, $_POST['student_first_name']);
	$mname = mysqli_real_escape_string($conn, $_POST['student_middle_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['student_last_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    $race = mysqli_real_escape_string($conn, $_POST['ethnicity']);
    $gen = mysqli_real_escape_string($conn, $_POST['gender']);
	$type = mysqli_real_escape_string($conn, $_POST['user_type']);
	$scode = mysqli_real_escape_string($conn, $_POST['school_code']);
	$cPassword = mysqli_real_escape_string($conn, $_POST['cPassword']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
		// Information sent from Form to Contacts
		$hNum = mysqli_real_escape_string($conn, $_POST['house_number']);
		$street = mysqli_real_escape_string($conn, $_POST['street_name']);
		$suburb = mysqli_real_escape_string($conn, $_POST['suburb']);
		$pCode = mysqli_real_escape_string($conn, $_POST['post_code']);
		$cNum = mysqli_real_escape_string($conn, $_POST['contact_number']);
	
	

	if ($password != $cPassword) {

			echo "Please Check Your Passwords!";

}

else{

	$password = md5($password); //Password Encrypted
	$sql = "INSERT INTO student (student_first_name,student_middle_name,student_last_name,date_of_birth,ethnicity,gender,house_number,street_name,suburb, post_code, contact_number,user_type, school_code, password) values('$name', '$mname','$lname','$dob','$race','$gen',  '$hNum', '$street', '$suburb', '$pCode', '$cNum', '$type', '$scode','$password')";
	$result = mysqli_query($conn, $sql);

 if(mysqli_query($con, $sql)) {

	header("Location: successfulRecordStu.html");//  echo "Records Inserted Successfully.";

 }
  else {
  
     header("Location: demo.html");


	echo "ERROR: Could Not Able To Execute $sql. " . mysqli_error($conn);

  }

}		

} 

?>
<!doctype html>
<html>
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
			<h1>Register New Student</h1>
		</div>
	</div>
        <div class="container">
            <br><h2>Please Complete Form</h2>
           
            
			<h3>User Information</h3><br>
			

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" onsubmit = "return validateAllFields(this)>

<label for="student_first_name"><b>First Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-fname" span style = "float: right"></span><br>
            <input type="text" name="student_first_name" id ="student_first_name" onblur ="validateFirstName(student_first_name)"  maxlength = "20" required /><br>

			<hr>

            <label for="student_middle_name"><b>Middle Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-mname" span style = "float: right"></span><br>
            <input type="text" name="student_middle_name" id = "student_middle_name"  onblur ="validateMiddleName(student_middle_name)" maxlength = "20" ><br>

			<hr>

            <label for="student_last_name"><b>Last Name <abbr class="req" title="required">*</abbr></b></label> <span id="error-lname" span style = "float: right"></span><br>
            <input type="text" name="student_last_name" id = "student_last_name" onblur ="validateLastName(student_last_name)" maxlength = "20" required><br>

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

			<b>User Type: <abbr class="req" title="required">*</abbr></b> <br>
            <label for="user_type">Student </label>
			<input  type="radio" name="user_type" id="user_type" value="Student" checked="checked"><br>

			<hr>
           
			
			<label for="password"><b>Create Password <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-pass" span style = "float: right"></span><br>
            <input type="password" name="password" id="password" onblur = "validateCreatePassword (password)" size="25" required><br>
			
			

			<hr>
           
			
		   <label for="cPassword"><b>Confirm Password <abbr class="req" title="required">*</abbr>:</b></label> <span id="error-pass2" span style = "float: right"></span><br>
		   <input type="password" name="cPassword" id="cPassword" onblur = "validateConfirmPassword (cPassword)"  size="25" required><br>
		   
		   <hr>

<input type="submit" name="submit" value="Create"><br/>

</form>

   <button class="button" onclick="goBack()"> Back </button>

  <script>
             function goBack() {
             window.history.back();
            }
		</script>

		<script>
			("input[required]").parent("label").addClass("required");
		</script>

		<script>
			var send = document.getElementsByName("student_form");

		function validateFirstName(student_first_name) //validates first name. Accepts certain characters. Cannot be blank.
		{
			var alpha = /^[A-Za-z '-]+$/; //contains alphabetic characters, apostrophes and hyphens (accepted characters).
			var numbers = /^[0-9]+$/; //contains numbers (unaccepted input).
			var combo = /^[A-Za-z0-9_]+$/; //contains a combination of alphabetic characters, numerical values and other special characters (unaccepted input).

		if(alpha.test(document.getElementById("student_first_name").value))
			{
				document.getElementById("student_first_name").style.background = "white";	//background of textbox
				document.getElementById("error-fname").style.display = "inline";	//error message is displayed next to field immediately after removing focus on the field.
				document.getElementById('error-fname').innerHTML = "Input Accepted."; //Message to be printed depending on input.
				return true;
			}
			else if(numbers.test(document.getElementById("student_first_name").value))
			{
				document.getElementById("student_first_name").style.background = "red";
				document.getElementById('error-fname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only."; //Message to be printed depending on input.
				return false;
			}
			else if (combo.test(document.getElementById("student_first_name").value))
			{
				document.getElementById("student_first_name").style.background = "red";
				document.getElementById('error-fname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (!((student_first_name.keyCode >= 65) && (student_first_name.keyCode <= 90) || (student_first_name.keyCode >= 97) && (student_first_name.keyCode <= 122) || (student_first_name.keyCode >= 48) && (student_first_name.keyCode <= 57) && (!(student_first_name.keyCode == 32)))) //special characters based on their ASCII code
			{
				document.getElementById("student_first_name").style.background = "red";
				document.getElementById('error-fname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else
			{
				document.getElementById("student_first_name").style.background = "yellow";
				document.getElementById('error-fname').innerHTML = "Please Enter student First Name.";
				return false;
			}

			return student_first_name;
		}

		function validateMiddleName(student_middle_name)
		{
			var alpha = /^[A-Za-z '-]+$/;
			var numbers = /^[0-9]+$/;
			var combo = /^[A-Za-z0-9_]+$/;

			if((alpha.test(document.getElementById("student_middle_name").value)) || (student_middle_name.value.length == 0))
			{
				document.getElementById("student_middle_name").style.background = "white";
				document.getElementById("error-mname").style.display = "inline";
				document.getElementById('error-mname').innerHTML = "Input Accepted. It can be left blank.";
				return true;
			}
			else if(numbers.test(document.getElementById("student_middle_name").value))
			{
				document.getElementById("student_middle_name").style.background = "red";
				document.getElementById('error-mname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (combo.test(document.getElementById("student_middle_name").value))
			{
				document.getElementById("student_middle_name").style.background = "red";
				document.getElementById('error-mname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (!((student_middle_name.keyCode >= 65) && (student_middle_name.keyCode <= 90) || (student_middle_name.keyCode >= 97) && (student_middle_name.keyCode <= 122) || (student_middle_name.keyCode >= 48) && (student_middle_name.keyCode <= 57) && (!(student_middle_name.keyCode == 32))))
			{
				document.getElementById("student_middle_name").style.background = "red";
				document.getElementById('error-mname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else
			{
				document.getElementById("student_middle_name").style.background = "yellow";
				document.getElementById('error-mname').innerHTML = "Please Enter student Middle Name.";
				return false;
			}

			return student_middle_name;
		}

		function validateLastName(student_last_name)
		{
			var alpha = /^[A-Za-z '-]+$/;
			var numbers = /^[0-9]+$/;
			var combo = /^[A-Za-z0-9_]+$/;

			if(alpha.test(document.getElementById("student_last_name").value))
			{
				document.getElementById("student_last_name").style.background = "white";
				document.getElementById("error-lname").style.display = "inline";
				document.getElementById('error-lname').innerHTML = "Input Accepted.";
				return true;
			}
			else if(numbers.test(document.getElementById("student_last_name").value))
			{
				document.getElementById("student_last_name").style.background = "red";
				document.getElementById('error-lname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (combo.test(document.getElementById("student_last_name").value))
			{
				document.getElementById("student_last_name").style.background = "red";
				document.getElementById('error-lname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else if (!((student_last_name.keyCode >= 65) && (student_last_name.keyCode <= 90) || (student_last_name.keyCode >= 97) && (student_last_name.keyCode <= 122) || (student_last_name.keyCode >= 48) && (student_last_name.keyCode <= 57) && (!(student_last_name.keyCode == 32))))
			{
				document.getElementById("student_last_name").style.background = "red";
				document.getElementById('error-lname').innerHTML = "Incorrect Input. Please use alphabetic characters, apostrophes and hyphens only.";
				return false;
			}
			else
			{
				document.getElementById("student_last_name").style.background = "yellow";
				document.getElementById('error-lname').innerHTML = "Please Enter student Last Name.";
				return false;
			}

			return student_last_name;
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

		function validatestudentID(student_id) //allows numerical characters only and length should be 8
		{
			var numbers = /^[0-9]+$/;

			if ((numbers.test(document.getElementById("student_id").value)) && (student_id.value.length == 8))
			{
				document.getElementById("student_id").style.background = "white";
				document.getElementById("student_id").style.display = "inline";
				document.getElementById('error-adid').innerHTML = "Input Accepted.";
				return true;
			}
			else
			{
				document.getElementById ("student_id").style.background = "red";
				document.getElementById("student_id").style.display = "inline";
				document.getElementById('error-adid').innerHTML = "Incorrect Input. Please use numerical values only. And please check if the length of ID is 8.";
				return false;
			}

			return student_id;
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
    if((document.getElementById('student_first_name').style.background == "red") || (document.getElementById('student_middle_name').style.background == "red") || (document.getElementById('student_last_name').style.background == "red") || (document.getElementById('gender').style.background == "red") || (document.getElementById('ethnicity').style.background == "red") || (document.getElementById('date_of_birth').style.background == "red") || (document.getElementById('contact_number').style.background == "red") || (document.getElementById('house_number').style.background == "red") || (document.getElementById('street_name').style.background == "red") || (document.getElementById('suburb').style.background == "red") || (document.getElementById('post_code').style.background == "red") || (document.getElementById('school_code').style.background == "red") || (document.getElementById('teacher_id').style.background == "red") || (document.getElementById('password').style.background == "red") || (document.getElementById("cPassword").style.background== "red"))
	{
					alert('Please ensure that there are no red fields'); //alert window
				event.preventDefault(); //prevents submission
					return validateAllFields(x);
			}
			else
			{
				document.getElementByName("student_form").submit(); //submits form
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