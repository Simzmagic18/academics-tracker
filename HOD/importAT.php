<?php
include('conn.php');//DB Connection

$row = 1;

if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
			  while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
		
				if($row == 1){ $row++; continue; }
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into attendance (`subject_code`, `grade_number`,`date_today`,`comment`,`status`,`teacher_id`,`student_id`) 
	            	values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query($conn, $sql);
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"attendance.php\"
						</script>";
				
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"attendance.php\"
					</script>";
	        
			 

			 //close of connection
			mysql_close($conn); 
				
		 	
			
		 }
	}	 
?>		 