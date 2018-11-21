<?php session_start()?>
<?php include('dbcon.php'); ?>
<?php //$login_session = $_SESSION['login_user']; ?>

<?php

$link = mysqli_connect("localhost", "root", "", "academicsTracker2");




?>

<!DOCTYPE html>
<html>
<head>
<title>View Subjects</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">


<style>
table 
{
    border-spacing: 0;
    width: 500%;
    border: 3px solid #ddd;
}

th 
{
    cursor: pointer;
}

th, td 
{
    text-align: center;
    padding: 16px;
}

</style>
</head>

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
			<h1>View Subjects</h1>
		</div>
	</div>

	<!-- Elements -->

<div class="elements">

    <h2> Subject Details</h2>

         <div class="form_container">   

			<form action = "EditSubject.php" method = "POST">
		   
			<table id = "Table1" align="center" border="1px" style="width:800px; line-height:70px">
				<tr>				
					<th onclick = "sortTable(0)">Subject Name</th>
					<th onclick = "sortTable(1)">Grade</th>
					<th onclick = "sortTable(3)">Department ID</th>	
					
				</tr>	
				
				<script>
					function sortTable(n)
					{
						var subjectTable, rows, swapping, i, x, y, change, direction, counter = 0;
						subjectTable = document.getElementById("Table1");
						swapping = true;
  
						direction = "asc"; //ascending order
  
						while (swapping) //loop continues til there's no swapping left to do
						{
							swapping = false;
							rows = subjectTable.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
							for (i = 1; i < (rows.length - 1); i++)
							{
      // Start by saying there should be no switching:
								change = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
								x = rows[i].getElementsByTagName("TD")[n];
								y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
								if (direction == "asc") 
								{
									if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) 
									{
          // If so, mark as a switch and break the loop:
										change = true;
										break;
									}
								} else if (direction == "desc") 
								{
									if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())
									{
          // If so, mark as a switch and break the loop:
										change = true;
										break;
									}
								}
							}
							if (change) 
							{
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
								rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
								swapping = true;
      // Each time a switch is done, increase this count by 1:
								counter ++; 
							} else 
							{
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
								if (counter == 0 && direction == "asc") 
								{
									direction = "desc";
									swapping = true;
								}
							}
						}	
					}
				</script>
				
					<?php
						
						$query = "SELECT * FROM subject";
						$result = mysqli_query ($link, $query);
						
						
						while($rows=mysqli_fetch_assoc($result))
						{
							//$sub = $rows['subject_name'];
							
							
					?>
						<tr>
							<td><?php echo $rows['subject_name']; ?></td>
							<td><?php echo $rows['subject_ID']; ?></td>
							<td><?php echo $rows['department_ID']; ?></td>
							
							
						</tr>
						
						<?php	
						
						
						}	
												
					
					?>		
				
			</table>
			</form>
			
            <br>
			<br>
			<br>
	
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
mysqli_close($link);

?>