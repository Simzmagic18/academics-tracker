<?php 
include('conn.php');
require_once("session.php");
?>

<?php
$query = " SELECT * FROM `student` WHERE guardian_id = '{$_SESSION['user']}'";
$run_query = mysqli_query($conn, $query);
    
if(mysqli_num_rows($run_query) == 1){
while($result = mysqli_fetch_assoc($run_query)){
$user_fname = $result['student_first_name'];
$user_lname = $result['student_last_name'];

}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Subject Marks</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.c	§ss">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/buttons.css">
<link rel="stylesheet" type="text/css" href="styles/hoverText.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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
        <div class="home_content">
            <h1><?php echo $user_fname." ".$user_lname; ?></h1>
        </div>
    </div>

    <!-- Title -->
    <br>
    <div class="section_title text-center">
        <h1 style="text-align:center"><?php echo $_GET['fname'];?> </h1>
    </div>

    <!-- bar graph -->
    <br><br>
    <h2 style="color:black; text-align:center; font-weight: bold"> Performance Results Bar Graph </h2>
    <div class="container"><canvas id="chart1" style="height:200px; width: 50%"></canvas></div>

    <!-- Overall marks and attendance -->
    <!--div class="elements">
        <div class="container">
                <div class="row pbars_accordions_container" style="margin-left: 30%">   
                    <div class="col-lg-6">
                        <div class="elements_progress_bars">
                            <div style="justify-items: center; display: inline">
                                <img src="images/orangeCircle.png"><span style="color:black"> Individual Percentage &nbsp;</span>
                                <img src="images/orangeRedCircle.png"><span style="color:black"> Class Average </span>
                            </div><br><br>
                            <div class="pbar_container">
                                <ul class="progress_bar_container col_12 clearfix">
                                    <a href="view.php"> 
                                    <li class="pb_item">
                                        <h3 style="color:black">Assignment 1</h3>
                                        <div id="skill_1_pbar" class="skill_bars1" data-perc="0.85"></div>
                                    </li><br>
                                    <li class="pb_item">
                                        <div id="skill_2_pbar" class="skill_bars2" data-perc="0.90"></div>
                                    </li></a><br>
                                    <a href="view.php"> 
                                    <li class="pb_item">
                                        <h3 style="color:black">Exercise 1</h3>
                                        <div id="skill_3_pbar" class="skill_bars1" data-perc="1"></div>
                                    </li><br>
                                    <li class="pb_item">
                                        <div id="skill_4_pbar" class="skill_bars2" data-perc="0.90"></div>
                                    </li></a><br>
                                </ul> 
                            </div>
                        </div>
                    </div>   
                </div>
                
            </div>
        </div>
    </div-->
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
 
 $sname = $_GET['fname'];
                   
$sql = "SELECT task.task_ID, Task_Results.taskscore, task.task_name, subject.subject_name,task.weight
FROM task
INNER JOIN Task_Results ON task.task_ID=Task_Results.task_ID
INNER JOIN subject ON task.subject_ID=subject.subject_ID
WHERE subject.subject_name ='".$sname."'";

$query = $sql.$sname;



if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table  >";
            echo "<tr>";
                echo "<th>Tatk name</th>";
                echo "<th>Score</th>";
                echo "<th>WeWeight<h>";
               // echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['task_name'] . "</td>";
                echo "<td>" . $row['taskscore'] . "</td>";
                echo "<td>" . $row['weight'] . "</td>";
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
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>
  
    <div class="popular page_section">
        <div class="container"> 
            <h2 style="color:black; text-align:center; font-weight: bold"> Performance Results Table </h2><br>
            <div class="row">
            
            
                <!--<table class="w3-table w3-bordered w3-centered" >
                    <tr>
                        <th> Task </th>
                        <th> Mark </th>
                        <th> Total </th>
                        <th> Average (%) </th>
                        <th> Class Average (%) </th>
                    </tr>
                    <tr class="w3-hover-amber">
                        <td> Assignment 1 </td>
                        <td> 30 </td>
                        <td> 40 </td>
                        <td> 85 </td>
                        <td> 90 </td>
                    </tr>
                    <tr class="w3-hover-amber">
                        <td> Exercise 1 </td>
                        <td> 20 </td>
                        <td> 20 </td>
                        <td> 10 </td>
                        <td> 90 </td>
                    </tr>
                    <tr class="w3-hover-orange" style="font-weight:bold">
                        <td> Totals </td>
                        <td>&nbsp;</td><td>&nbsp;</td>
                        <td> 185 </td>
                        <td> 180 </td>
                    </tr>
                    <tr class="w3-hover-orange" style="font-weight:bold">
                        <td> Averages </td>
                        <td>&nbsp;</td><td>&nbsp;</td>
                        <td> 92.5 </td>
                        <td> 90 </td>
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
