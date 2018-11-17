<?php 
    // used to see if user has logged in with an account set to true in login.php
    if (!$_SESSION['loggedIn'])
        echo"<script>location.href='../login.php'</script>";
?>