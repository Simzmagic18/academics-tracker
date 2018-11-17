 <?php 
 session_start(); // start or resume existing session

//include('config.php'); // call the configuration file

$host = "localhost";
$user = "root";
$pass = "";
$db = "mi-sports";
$useraccount_pid = false;

$con = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
else
{
    echo "Connection successful<br>";  
    // page 1
    $uemail=$_POST['email'];
    $_SESSION['email'] = $uemail;
    $upass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $schoolClubName = $_POST['schoolClubName'];
    
    // page 2
    $fName=$_POST['firstName'];
    $lName=$_POST['lastName'];
    $nickName=$_POST['nickname'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];


    $roleid = 4; #i have explicitly declare four cause the database has limited predefined roles with a specified index

    echo $fName." ".$lName."<br>"; #was testing if its compiling beyond this point

    // page 3
    $fnNumber=$_POST['phoneNumber'];
    $homAdd=$_POST['home'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $postalcode = $_POST['postalcode'];

    // page 4
    $pgFname = $_POST['pgFirstName'];
    $pgLastName =$_POST['pgLastName']; 
    $parntEmail=$_POST['pgEmail'];
    $pgFNumber=$_POST['pgPhoneNumber'];
    
    // page 5
    $dob= $_POST['dateOfBirth'];
    $gender = "";
    
    if ($_POST['genderRadio'] == "Male"){
        $gender = "Male";
    } else {
        $gender = "Female";
    }
    
    
    echo "assigned values to the variables <br>". "Gender = " .$_POST['genderRadio'];

     /*
     Insert values into the first database table  (useraccount) using the $sql variable
     Insert values into the second database table (profile) using the $sql1 variable
     Insert values into the third databse table (playerProfile) using the $sql2 variable
      */

     $upass =  md5($upass); //  encrypt the password
     $cpass = md5( $cpass);
     
    

   $query = "insert into player(email, password, firstName, lastName, nickName, dateOfBirth, gender, phoneNumber, weight, height, homeAddress, city, country, postalCode, parentGuardianFirstName, parentGuardianLastName, parentGuardianContactNumber, parentGuardianEmail, schoolClubName) values ('$uemail', '$upass', '$fName','$lName','$nickName', '$dob', '$gender',  '$fnNumber','$weight', '$height' , '$homAdd', '$city', '$country', '$postalcode' ,'$pgFname', '$pgLastName','$pgFNumber', '$parntEmail', '$schoolClubName')";
   $insert_query = mysqli_query($con, $query);

   $pid = "";

   $tmp_query = "select playerID from player where player.firstName= '$fName' and player.LastName= '$lName' and player.phoneNumber= '$fnNumber'";
   $tmp_exec = mysqli_query($con, $tmp_query);

   while($tmp_result = mysqli_fetch_array($tmp_exec)){
       $pid = $tmp_result['playerID']; 
       $useraccount_pid = true;
   }

// Old insert is the next 2 lines
//    $query2 = "insert into useraccount(profileID, email, password) values ('$pid','$uemail', '$upass')";
//    $insert_query2 = mysqli_query($con, $query2);
   //$sql1= "INSERT INTO playerprofile (firstName, lastName, phoneNumber, homeAddress, nickName, parentsEmail, pgPhoneNumber,  birthdate, ) 
   // VALUES ('$fName','$lName','$fnNumber','$homAdd','$nickName','$parntEmail','$pgFNumber','$dob') ";
   
    //$sql2= "INSERT INTO playerprofile (emergencyContactFirstName, emergencyContactLastName, emergencyContactNumber, parentGuardianFirstName, parentGuardianLastName, parentGuardianContactNumber, parentGuardianEmail) 
   // VALUES ('$emgFName', '$emgLName','$emgCNUmber', '$pgFname', '$pgLastName','$pgFNumber', '$parntEmail') ";

    
   #echo "insertion 1 into useraccount<br>";
   #echo "insertion 2 into profile<br>";#.$result2;



   //if(!($query == null) && !($insert_profileID == null)){
    //echo "<script>alert('both insertions successfull')</script>";
     //echo "<script>location.href='login.html'</script>";
   //}
    /*
    Query the database to determine if the insertion worked
    if true, 
    redirect the user to the login
    print: records inserted successfully
    close the register page 
    else display an error message alerting the user the details are wrong

    */
    
    //if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) 
    if($useraccount_pid == true){
        $_SESSION['playerID'] = $pid;
        echo"<script>location.href='login.php'</script>";//direct user to login if records are succeffully inserted
        exit();
    } 
    else{
        echo "ERROR: Could Not Execute ".mysqli_error($link);
        echo "<script>location.href='register.php'</script>";
        exit();
    }
    // Close connection
    //mysqli_close($link);
}


    
    //if(isset($_POST['create'])){ 
       


// check to see if the input fields have been fiilled, once they are filled in, execute the following 
?>

