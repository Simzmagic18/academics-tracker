<?php 
include('conn.php');
//require_once("session.php");
?>

<?php
//$query = " SELECT * FROM `student` WHERE guardian_id = '{$_SESSION['user']}' ";
//$run_query = mysqli_query($conn, $query);
    
//if(mysqli_num_rows($run_query) == 1){
//while($result = mysqli_fetch_assoc($run_query)){
//$user_fname = $result['student_first_name'];
//$user_lname = $result['student_last_name'];

//}
?>






<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Record</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/buttons.css">
<link rel="stylesheet" type="text/css" href="styles/hoverText.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
                                <li class="main_nav_item"><a href="logout.php">LOGOUT</a></li>
                            </ul>
                    </div>
            </nav>
        </div>
        
        <div class="header_side d-flex flex-row justify-content-center align-items-center"
     		<ul class="nav navbar-nav navbar-right">
      			<li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">
	       			<span class="label label-pill label-danger count" style="border-radius:15px;"></span> 
	       			<span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
				</a>
               <ul class="dropdown-menu"></ul></li>
            </ul>
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
            <div class="home_background prlx" style="background-image:url(images/courses_background.jpg)"></div>
        </div>
        <!--<div class="home_content">
            <h1></h1>
        </div>-->
    </div>

    <!-- Title -->
    <br><div class="section_title text-center">
        <h1 style="text-align:center"> Attendance Record </h1>
    </div> <br>

    <!-- Attendance loader -->
    <div class="row">
        <div class="col-lg-12">
            <div class="elements_title"  style="text-align:center"> Overall Attendance Average  </div>
        </div>
    </div>
    <a href="StudentViewAtt.php">
    <div class="row elements_loaders_container"  style="float: inherit; margin-left: 40%">
        <div class="col-lg-3 loader_col">
            <div class="loader" data-perc="0.5"></div>
        </div>
    </div></a>
    <br><br><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="elements_title"  style="text-align:center"> Attendance Record Table </div>
        </div>
    </div><br>
<!-- Table --> 
    <div class="container">
        <div class="row">
        
        
<style "text/css"">
    
    
table      {
    		border-bottom: 1px #ffb606;
    		color:black; 
    		margin:auto;
    		border: 1px solid black;
    		width: 80%;

    	}
    	
    	
th {

        text-align: left;
    	border-bottom: 1px #ffb606;
    	color:black; 
    	margin:auto;
        border: 1px solid black
        height: 50px;
        
        
   }
   
td {

border-bottom: 1px #ffb606;
    	color:black; 
    	margin:auto;
        border: 1px solid black



}
    		
    </style>
        
 <?php
 
 $sql= "SELECT attendance.student_ID, student.student_first_name, attendance.status, attendance.comments,attendance.date
FROM attendance
INNER JOIN student ON attendance.student_ID=student.student_ID
WHERE attendance.student_ID = 6";
       
        if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table  >";
            echo "<tr>";
                //echo "<th>Subject</th>";
                echo "<th>Status</th>";
                echo "<th>date<h>";
               // echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                //echo "<td>" . $row[''] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
               // echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

?>
        
        
        
        
            <!--<table class="w3-table w3-bordered w3-centered" style="color:black; margin: auto">
                <tr>
                    <th> Date </th>
                    <th> Status </th>
                    <th> Comment </th>
                </tr>
                <tr class="w3-hover-amber">
                    <td> 01/10/2018 </td>
                    <td> Present </td>
                    <td> &nbsp; </td>
                </tr>
                <tr class="w3-hover-amber">
                    <td> 02/10/2018 </td>
                    <td> Absent </td>
                    <td> Excused </td>
                </tr>
                <tr class="w3-hover-orange" style="font-weight:bold">
                    <td> Days Present </td>
                    <td> 1 </td>
                </tr>
            </table>-->
        </div>
        <br>
        <script>
        function goBack(){
            window.history.back();
        }
        </script>
        <div class="row course_boxes" style="margin:auto">
            <div style="margin:auto">
                <div>
                    <button class="button" onclick="goBack()"> Back </button>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
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
<script src="js/courses_custom.js"></script>
<script src="js/elements_custom.js"></script>
<script src="js/MyGraphs.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
</body>
</html>
