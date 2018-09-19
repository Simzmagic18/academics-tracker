<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['guardian_id']) || (trim($_SESSION['guardian_id']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['guardian_id'];

?>