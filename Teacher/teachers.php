<?php 
include('conn.php');
require_once("session.php");
?>

<?php
$query = " SELECT * FROM `teacher` WHERE teacher_id = '{$_SESSION['user']}' ";
$run_query = mysqli_query($conn, $query);
    
if(mysqli_num_rows($run_query) == 1){
while($result = mysqli_fetch_assoc($run_query)){
$user_fname = $result['teacher_first_name'];
$user_lname = $result['teacher_last_name'];

}
}

if(isset($_POST['submit'])){
    $date = mysqli_real_escape_string($conn, $_POST['date_t']);
    $status = mysqli_real_escape_string($conn, $_POST['status_a']);
    $comments = mysqli_real_escape_string($conn, $_POST['comment']);

    if(empty($status)){
        $error_msg = "Attendence Field Can not be empty";
        }

        if(empty($comments)){
            $error_msg = "Comments Field Can not be empty";
            }
            
            else{
                $sql = "INSERT INTO attendence (date_t,status_a,comment) values('$date','$status', '$comments' )";
                $run_query = mysqli_query($conn, $sql);
                echo "Records Inserted Successfully.";
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
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/buttons.css">
<link rel="stylesheet" type="text/css" href="styles/menuDropDown.css">
<link rel="stylesheet" type="text/css" href="styles/hTabs.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="styles/hoverText.css">
<style>
    #myInput {
        width: 100%;
        font-size: 16px; 
        padding: 12px 20px 12px 40px;
        border: 1px solid #ffb606; 
        margin-bottom: 12px;
    }

    table, td, th {    
        border-bottom: 1px #ffb606;
        text-align: left;
    }
    
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        padding: 15px;
        word-wrap:break-word;
    }

    .tr:hover {
        background-color: #ffb606;
    }
</style>

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
                    <h1> <?php echo $user_fname." ".$user_lname; ?> </h1>
            </div>
    </div>

    <!-- Popular -->
    <!-- classes -->
    <!--div> &nbsp; </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                        <h1> Classes </h1>
                </div>
            </div>
        </div><br><br>          
        <div class="row course_boxes" style="margin:auto">
            <div style="margin:auto">
                <div>
                    <a href="class.html"><button class="button" onclick="#"><h2>&nbsp;&nbsp; Class 1 &nbsp;&nbsp;</h2></button></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="class.html"><button class="button" onclick="#"><h2>&nbsp;&nbsp;&nbsp; Class 2 &nbsp;&nbsp;&nbsp;</h2></button></a>
                </div>
            </div>
        </div>
    </div-->
    <div> &nbsp; </div>

    <!-- tabs-->
    <div class="container">
        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Class1')" id="defaultOpen"><h2>Class 1</h2></button>
        </div><br>
        <!-- Tab content -->
        <div id="Class1" class="tabcontent">
            <div class="elements_accordions">
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> View Past Attendace </div>
                    <div class="accordion_panel"><br>
                        <!--content-->
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="elements_title"  style="text-align:center; font-weight: bold"> Overall Attendance Average  </div>
                                </div>
                            </div>
                            <a href="StudentViewAtt.php">
                            <div class="row elements_loaders_container"  style="float: inherit; margin-left: 40%">
                                <div class="col-lg-3 loader_col">
                                    <div class="loader" data-perc="0.5"></div>
                                </div>
                            </div></a>
                            <br><br>
                            <table class="w3-bordered" style="color:black; overflow-x:auto">
                            <tr style="background-color: #ffb606">

                            <th>Student First Name</th><th>Student Middle Name</th><th>Student Last Name</th><th>Date</th><th>Status</th><th>Comment</th>
		            </tr>	
				  </thead>
			<?php
                $SQLSELECT = "SELECT * FROM student INNER JOIN attendance ON attendance.student_ID = student.student_ID";
                
                $result_set =  mysqli_query($conn,$SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
			
					<tr>
						<td><?php echo $row['student_first_name']; ?></td>
						<td><?php echo $row['student_middle_name']; ?></td>
						<td><?php echo $row['student_last_name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                        <td><?php echo $row['status']; ?></td></td>
                        <td> <td><?php echo $row['comments']; ?></td></td>

					</tr>
				<?php
				}
			?>

                        </table>
                        <div id="averageCount1"></div>
                    </div>
                </div>
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> Record Attendance </div>
                    <div class="accordion_panel" style="overflow-x:auto;"><br>
                    <form action = "teachers.php" method = "Post">
                        <table class="w3-bordered" style="color:black; overflow-x:auto">
                            <tr style="background-color: #ffb606">

                            <th>Student First Name</th><th>Student Middle Name</th><th>Student Last Name</th><th>Date</th><th>Status</th><th>Comment</th>
		            </tr>	
				  </thead>
			<?php
                $SQLSELECT = "SELECT * FROM student ";
                $result_set =  mysqli_query($conn,$SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
			
					<tr>
						<td><?php echo $row['student_first_name']; ?></td>
						<td><?php echo $row['student_middle_name']; ?></td>
						<td><?php echo $row['student_last_name']; ?></td>
                        <td> <?php echo "<input type='text' name = 'date_t' value='".date('m/d/y')."'";?> </td>
                        <td>
                        <input type = "radio" name = "status_a" value = "Present"> Present <br>
                        <input type = "radio" name = "status_a" value = "Absent"> Absent
                        </td>
                        <td> <input class="w3-input" id="comment" name = "comment" type="text" placeholder="comment"> </td>

					</tr>
				<?php
				}
			?>

                        </table>
                        <input type="submit" name="submit" value="Create">
                        </form>
                    </div>
                </div>
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> View Past Marks </div>
                    <div class="accordion_panel"><br>
                        <!--content-->
                        <!-- bar graph -->
                        <br><br>
                        <h2 style="color:black; text-align:center; font-weight: bold"> Performance Results Bar Graph </h2>
                        <canvas id="chart1" style="height:200px; width: 50%"></canvas>
                        

<table class="table table-bordered">


                        <!-- table -->
                        <table class="w3-bordered" style="color:black; overflow-x:auto">
                            <tr style="background-color: #ffb606">
                                <th> Student Name &nbsp;</th>
                                <th> Assignment 1 (%)&nbsp;</th>
                                <th> Exercise 1 (%)&nbsp;</th>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Peter Griffin</td>
                                <td> 85 </td>
                                <td> 100 </td>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Lois Daniels</td>
                                <td> 100 </td>
                                <td> 95 </td>
                            </tr>
                        </table>
                        <div id="averageCount1"></div>
                    </div>
                </div>
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> Record Marks </div>
                    <div class="accordion_panel"><br>
                        <!--content-->
                        <table class="w3-bordered" style="color:black; overflow-x:auto">
                            <tr style="background-color: #ffb606">
                                <th> Student Name </th>
                                <th>
                                    Task Name:&nbsp;<input class="w3-input" type="text" id="taskName"><p style="color:black; font-style:italic">Record mark as a percentage</p>
                                </th>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td> Peter Griffin </td>
                                <td><input class="w3-input" type="text" id="mark" placeholder="Mark"></td>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Lois Daniels</td>
                                <td><input class="w3-input" type="text" id="mark" placeholder="Mark"></td>
                            </tr>
                            <tr>
                                <td>
                                    <button id="submit" class="button" value="Submit Marks">Submit Marks</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="Class2" class="tabcontent">
            <div class="elements_accordions">
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> View Past Attendace </div>
                    <div class="accordion_panel"><br>
                        <!--content-->
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="elements_title"  style="text-align:center; font-weight: bold"> Overall Attendance Average  </div>
                                </div>
                            </div>
                            <a href="StudentViewAtt.php">
                            <div class="row elements_loaders_container"  style="float: inherit; margin-left: 40%">
                                <div class="col-lg-3 loader_col">
                                    <div class="loader" data-perc="1"></div>
                                </div>
                            </div></a>
                            <br><br>
                        <table class="w3-bordered" style="color:black; overflow-x:auto;">
                            <tr style="background-color: #ffb606">
                                <th> Student Name &nbsp;</th>
                                <th> 01/10/2018 &nbsp;</th>
                                <th> Comment &nbsp;</th>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Peter Griffin</td>
                                <td>Present</td>
                                <td> &nbsp;</td>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Lois Daniels</td>
                                <td>Present</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        <div id="averageCount1"></div>
                    </div>
                </div>
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> Record Attendance </div>
                    <div class="accordion_panel"><br>
                        <table class="w3-bordered" style="color:black; overflow-x:auto" oninput="sum()">
                            <tr style="background-color: #ffb606">
                                <th> Student Name &nbsp;</th>
                                <th> 01/10/2018 &nbsp;</th>
                                <th> Comment &nbsp;</th>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Peter Griffin</td>
                                <td>
                                    <select>
                                        <option id="present" selected>Present</option>
                                        <option id="absent">Absent</option>
                                    </select>
                                </td>
                                <td><input class="w3-input" id="comment" placeholder="comment"></td>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Lois Daniels</td>
                                <td>
                                    <select id="status">
                                        <option id="present" selected>Present</option>
                                        <option id="absent">Absent</option>
                                    </select>
                                </td>
                                <td><input class="w3-input" id="comment" placeholder="comment"></td>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Lois Daniels</td>
                                <td>
                                    <select id="status">
                                        <option id="present" selected>Present</option>
                                        <option id="absent">Absent</option>
                                    </select>
                                </td>
                                <td><input class="w3-input" id="comment" placeholder="comment"></td>
                            </tr>
                            <tr>
                                <td><button id="submit" class="button" value="Submit Marks">Submit Marks</button></td>
                                <td> Total 
                                    <script>
                                        var present = 0;
                                        if (present){
                                            present = present ++;
                                        }
                                        document.write(present);
                                    </script>
                                    <script>
                                        var att = new Array();
                                        att["present"] = 1;
                                        att["absent"] = 0;

                                        function countPresent() {

                                        }
                                    </script>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> View Past Marks </div>
                    <div class="accordion_panel"><br>
                        <!--content-->
                        <!-- bar graph -->
                        <br><br>
                        <h2 style="color:black; text-align:center; font-weight: bold"> Performance Results Bar Graph </h2>
                        <canvas id="chart2" style="height:200px; width: 50%"></canvas>
                        
                        <!-- table -->
                        <table class="w3-bordered" style="color:black; overflow-x:auto">
                            <tr style="background-color: #ffb606">
                                <th> Student Name &nbsp;</th>
                                <th> Assignment 1 (%)&nbsp;</th>
                                <th> Exercise 1 (%)&nbsp;</th>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Peter Griffin</td>
                                <td> 60 </td>
                                <td> 89 </td>
                            </tr>
                            <tr class="w3-hover-amber">
                                <td>Lois Daniels</td>
                                <td> 70 </td>
                                <td> 80 </td>
                            </tr>
                        </table>
                        <div id="averageCount1"></div>
                    </div>
                </div>
                <div class="accordion_container">
                    <div class="accordion d-flex flex-row align-items-center" style="color:black; font-weight: bold"> Record Marks </div>
                    <div class="accordion_panel"><br>



                        <!--content-->
                        
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

         <form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file only!</legend>
						<div class="control-group">
							<div class="control-label">
								<label>Result File:</label>
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
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div> &nbsp; </div>
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
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses_custom.js"></script>
<script src="js/dropDown.js"></script>
<script src="js/hTabs.js"></script>
<script src="js/elements_custom.js"></script>
<script src="js/graph1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    function myFunction() {
        // Declare variables 
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
    
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            } else {
            tr[i].style.display = "none";
            }
        } 
        }
    }
</script>

</body>
</html>
