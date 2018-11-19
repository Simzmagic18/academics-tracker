<?php
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['dep']) ){
        
}

else{
header("location:login.php?msg= No Access");
}
?>