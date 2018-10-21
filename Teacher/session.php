<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
/*if (!isset($_SESSION['teacher_id']) || (trim($_SESSION['teacher_id']) == '')) {
    header("location: index.php");
    exit();
}*/
$session_id=$_SESSION['teacher_id'];
$result=mysqli_query($conn, "select * from teacher where teacher_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);


?>