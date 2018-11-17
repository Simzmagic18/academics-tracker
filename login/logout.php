<?php
    // PHP methods to fully logout user 
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    
    //direct user to the login page.
    echo"<script>location.href='../login.php'</script>"; 
?>


