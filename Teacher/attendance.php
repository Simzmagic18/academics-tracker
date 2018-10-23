<?php 
include('conn.php');
?>	
<html lang="en">
	<head>
		<title>AT: Marks Upload</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
                <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
                <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">


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
                            <span>AT: Teacher</span>
                        </div>
                    </div>

                    <!-- Main Navigation -->
                    <nav class="main_nav_container">
                            <div class="main_nav">
                                    <ul class="main_nav_list">
                                            <li class="main_nav_item"><a href="teachers.html">HOME</a></li>
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
                        <li class="menu_item menu_mm"><a href="teachers.html">HOME</a></li>
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
                    <h1>Attendance</h1>
                </div>
	</div>

        <script>
            function ExportToTable() {  
             var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
             /*Checks whether the file is a valid excel file*/  
             if (regex.test($("#excelfile").val().toLowerCase())) {  
                 var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
                 if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
                     xlsxflag = true;  
                 }  
                 /*Checks whether the browser supports HTML5*/  
                 if (typeof (FileReader) != "undefined") {  
                     var reader = new FileReader();  
                     reader.onload = function (e) {  
                         var data = e.target.result;  
                         /*Converts the excel data in to object*/  
                         if (xlsxflag) {  
                             var workbook = XLSX.read(data, { type: 'binary' });  
                         }  
                         else {  
                             var workbook = XLS.read(data, { type: 'binary' });  
                         }  
                         /*Gets all the sheetnames of excel in to a variable*/  
                         var sheet_name_list = workbook.SheetNames;  

                         var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                         sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                             /*Convert the cell value to Json*/  
                             if (xlsxflag) {  
                                 var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                             }  
                             else {  
                                 var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                             }  
                             if (exceljson.length > 0 && cnt == 0) {  
                                 BindTable(exceljson, '#exceltable');  
                                 cnt++;  
                             }  
                         });  
                         $('#exceltable').show();  
                     }  
                     if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                         reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
                     }  
                     else {  
                         reader.readAsBinaryString($("#excelfile")[0].files[0]);  
                     }  
                 }  
                 else {  
                     alert("Sorry! Your browser does not support HTML5!");  
                 }  
             }  
             else {  
                 alert("Please upload a valid Excel file!");  
             }  
         }  
        </script>
        <script>
            function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
                var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
                for (var i = 0; i < jsondata.length; i++) {  
                    var row$ = $('<tr/>');  
                    for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
                        var cellValue = jsondata[i][columns[colIndex]];  
                        if (cellValue == null)  
                            cellValue = "";  
                        row$.append($('<td/>').html(cellValue));  
                    }  
                    $(tableid).append(row$);  
                }  
            }  
        </script>
        <script>
             function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
                var columnSet = [];  
                var headerTr$ = $('<tr/>');  
                for (var i = 0; i < jsondata.length; i++) {  
                    var rowHash = jsondata[i];  
                    for (var key in rowHash) {  
                        if (rowHash.hasOwnProperty(key)) {  
                            if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
                                columnSet.push(key);  
                                headerTr$.append($('<th/>').html(key));  
                            }  
                        }  
                    }  
                }  
                $(tableid).append(headerTr$);  
                return columnSet;  
            }  d
        </script>

	<!-- Popular -->
	<div class="popular page_section">
		<div class="container">
                    <!-- Personal Details -->
                    <div class="row">
                        <div class="col">
                            <div class="section_title text-center">
                                <h1></h1>
                            </div>
                        </div>
                    </div>
            
<!-- Navbar
    ================================================== -->

<!--	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To Mysql Database Using PHP</a>
				
			</div>
		</div>
	</div>  

	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>-->
			<div class="span6" id="form-login">
                            <form class="form-horizontal well" action="importAT.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file only!</legend>
						<div class="control-group">
							<div class="control-label">
								<label>Attendance form:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		

		<table class="table table-bordered">
			<thead>
				  	<tr>
				  		<th>Record Number</th>
				  		<th>Subject Code</th>
				  		<th>Grade</th>
				  		<th>Date</th>
				  		<th>Comment</th>
                                                <th>Status</th>
				  		<th>Teacher ID</th>
				  		<th>Student ID</th>
				 		
				 
				  	</tr>	
				  </thead>
			<?php
				$SQLSELECT = "SELECT * FROM attendance ";
				$result_set =  mysqli_query($conn,$SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
			
					<tr>
						<td><?php echo $row['record_number']; ?></td>
						<td><?php echo $row['subject_code']; ?></td>
						<td><?php echo $row['grade_number']; ?></td>
						<td><?php echo $row['date_today']; ?></td>
						<td><?php echo $row['comment']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
						<td><?php echo $row['teacher_id']; ?></td>
						<td><?php echo $row['student_id']; ?></td>
					

					</tr>
				<?php
				}
			?>
		</table>
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
<script src="jquery-1.10.2.min.js" type="text/javascript"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
	</body>
</html>