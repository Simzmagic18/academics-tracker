<!DOCTYPE html>

<?php
//Step1
include ('conn.php');
include ('session.php');
$result=mysqli_query($conn, "select * from results where student_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>

<html lang="en">
<head>
<title>Course - Contact</title>
<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
        
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
                            <span>AT: Guardian</span>
                        </div>
                    </div>

                    <!-- Main Navigation -->
                    <nav class="main_nav_container">
                            <div class="main_nav">
                                    <ul class="main_nav_list">
                                            <li class="main_nav_item"><a href="Guardian.html">HOME</a></li>
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
                        <li class="menu_item menu_mm"><a href="Guardian.html">HOME</a></li>
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
			<h1>Welcome: <h1> <h2 align="center"><?php echo $row['student_id']; ?> </h2>
                        
		</div>
	</div>
        
        <!-- TABLE -->
    
    <table class="data-table">
		<caption class="title">Student Records</caption>
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Subject Code</th>
				 <th>Score</th>
                                
                        </tr>
		</thead>
		<tbody>
		
		<?php
                
                
		//($row = mysqli_fetch_array($result))
		{
                    
                    $id = $row['student_id'];
                    $code = $row['subject_code'];
                    $marks = $row['task_score'];
                                       
			echo '<tr>
					<td>'.$id.'</td>
					<td>'.$code. '</td>
					<td>'.$marks.'</td>
				</tr>';
			
		}?>
		</tbody>
		</table>
	

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					
					
						
				</div>

				

			</div>

		</div>
	</div>

	<!-- Footer -->

	<div class="footer">
	<Span>Academics Tracker All rights reserved</Span>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/contact_custom.js"></script>

</body>
</html>