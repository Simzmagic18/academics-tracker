<?php
$link = mysqli_connect("localhost", "root", "", "academicstracker2");

?>

<?php 
include('conn.php');
require_once("session.php");
?>

<?php
$query = " SELECT * FROM `HOD` WHERE HOD_id = '{$_SESSION['user']}' ";
$run_query = mysqli_query($conn, $query);
    
if(mysqli_num_rows($run_query) == 1){
while($result = mysqli_fetch_assoc($run_query)){
$user_fname = $result['HOD_first_name'];
$user_lname = $result['HOD_last_name'];

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>AT: Teacher</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/buttons.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="super_container">

    <!-- Header -->
    <header class="header d-flex flex-row">
            <div class="header_content d-flex flex-row align-items-center">
                    <!-- Logo -->
                    <div class="logo_container"><a href="teachers.html">
                            <div class="logo">
                                    <img src="images/ATlogo221.png" alt="logo" width="64px" height="66px">&nbsp;
                                    <span>AT: H.O.D</span>
                            </div></a>
                    </div>

                    <!-- Main Navigation -->
                    <nav class="main_nav_container">
                            <div class="main_nav">
                                    <ul class="main_nav_list">
                                            <li class="main_nav_item"><a href="teacherHOD.php">HOME</a></li>
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
                            <li class="menu_item menu_mm"><a href="teachersHOD.php">HOME</a></li>
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
                    <h1> <?php echo $user_fname." ".$user_lname; ?>  </h1>
            </div>
    </div>
   
    <div class="section_title text-center">
        <h1> Department Monitoring </h1>
    </div>
    
        
   
    <div class="row">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Subject')" id="defaultOpen">Subjects</button>
            <button class="tablinks" onclick="openTab(event, 'Teacher')">Teachers</button>
            <button class="tablinks" onclick="openTab(event, 'MyClass')">My Classes</button>
        </div>

        
        
        <div id="Subject" class="tabcontent">
            <h2>Subjects</h2>
            <?php
         $sql = "SELECT subject_name FROM subject INNER JOIN hod ON subject.department_ID = hod.department_ID";
         $result = mysqli_query($conn, $sql);
         $datas = array();
         if (mysqli_num_rows($result) > 0){
             while($row = mysqli_fetch_assoc($result)){
                 $datas[] = $row;
                 
             }
         }
         foreach($datas[0] as $data){
         
         }
         foreach ($datas[1] as $dats)
        ?>
            <div class="w3-row-padding">
                <div class="column">
                    <a href="Subjects.html"> <img class="classimg" src="classes.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                    <a href="Subjects.html"><?php echo $data?></a>  
                    </div>
                </div>
                <div class="column">
                    <a href=""> <img class="classimg" src="classes.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                    <a href="Subjects.html"><?php echo $dats?></a>
                    </div>
                </div>
                <div class="column">
                    <a href=""> <img class="classimg" src="classes.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                        <a href="">Subject 3</a>
                    </div>
                </div>
            </div>
            
        </div>

        <div id="Teacher" class="tabcontent">
            <h2>Teachers</h2>
         <?php
         $sqly = "SELECT CONCAT(teacher_first_name,' ', teacher_last_name) AS whole_name  FROM teacher INNER JOIN department ON department.department_ID = teacher.department_ID";
         $results = mysqli_query($conn, $sqly);
         $data = array();
         if (mysqli_num_rows($results) > 0){
             while($rows = mysqli_fetch_assoc($results)){
                 $data[] = $rows;
                 
             }
         }
         foreach($data[0] as $dateach){
         
         }
         
        ?>
            <div class="row">
                <div class="column">
                    <a href=""> <img class="classimg" src="Teacher.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                        <a href=""><?php echo $dateach?></a>
                    </div>
                </div>
                <div class="column">
                    <a href=""> <img class="classimg" src="Teacher.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                        <a href="">Teacher 2</a>
                    </div>
                </div>
                <div class="column">
                    <a href=""> <img class="classimg" src="Teacher.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                        <a href="">Teacher 3</a>
                    </div>
                </div>
            </div> 
        </div>

        <div id="MyClass" class="tabcontent">
            <h2>My Classes</h2>
            <div class="w3-row-padding">
                <div class="column">
                    <a href="Subjects.html"> <img class="classimg" src="classes.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                        <a href="teachers.html">Class 1</a>
                    </div>
                </div>
                <div class="column">
                    <a href=""> <img class="classimg" src="classes.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                        <a href="">Class 2</a>
                    </div>
                </div>
                <div class="column">
                    <a href=""> <img class="classimg" src="classes.svg" alt="classes" style="width:100%"></a>
                    <div class="class-label">
                        <a href="">Class 3</a>
                    </div>
                </div>
            </div>
        </div>

    <script>
        function openTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
   </div>
</div>
        <script>
            function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </div>
    

<!-- Footer -->
<footer class="footer" style="text-align: center">
    <span >Academics Tracker All rights reserved</span>
</footer>

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
<script src="js/courses_custom.js"></script>
<script src="js/dropDown.js"></script>

</body>
</html>
