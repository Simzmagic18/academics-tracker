<?php

$link = mysqli_connect("localhost", "root", "", "academicstracker2");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Guardian</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
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
                    <h1> Guardian </h1>
            </div>
    </div>

    <!-- Popular -->
    <div class="popular page_section">
        <!-- Uploads -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1> Dependents </h1>
                    </div>
                </div>
            </div><br>           
            <div class="row course_boxes" style="margin:auto">
                <!-- Links to dependents -->
                <div style="margin:auto">
                    <div> <!-- needs php -->
                    
<style type="text/css">
button {
    background-color: orange;
    border: none;
    color: white;
    padding: 15px 25px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    font-weight: bolder;
}

app-button{
    width: 150px;
    margin:0 20px;
    display:inline-block;
    line-height: 60px;
    alignment: center;
}
rowbtn{
  text-align:center;
  /*the same margin which is every button have, it is for small screen, and if you have many buttons.*/
  margin-left:-20px;
  marin-right:-20px;
}
</style>
         <?php echo $_GET['fname']; ?>           
                    
     <?php
                   
                    
                    
                    $sql = "SELECT * FROM student WHERE guardian_ID='1'";
                    
                    
                    if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        
        while($row = mysqli_fetch_array($result)){

            echo "<td>";
            
               echo "<tr>";
               
               $fname = $row['student_first_name'];
               
                
                echo "<span>    <a href='Guardian1.html?fname=".$fname."'><button>".$fname."</button></a></span>";
                
                
              echo "</tr>";  
            echo "</td>";
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
                    
                    
                    
                    <!--<a href="dependent.html"><button class="button" style="font-weight:bold"><span> Dependent 1 </span></button></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="dependent.html"><button class="button" style="font-weight:bold"><span> Dependent 2 </span></button></a>-->
                    </div>
                </div>
            </div>
        </div><br><br>
    </div>

    <!-- footer -->
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
<script src="plugins/easing/easing.js"></script>
<script src="js/courses_custom.js"></script>
<script src="js/dropDown.js"></script>
</body>
</html>

<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
