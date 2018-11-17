<?php
    // these files are used to enable the capbility of sending emails on localhost to an email address
    require_once "vendor/autoload.php";
    require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
    // session_start is used to start a php session and then the $con is used to make a connection to the database so password change can take place
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "mi-sports";
    $useraccount_pid = false;

    $con = mysqli_connect($host, $user, $pass, $db);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    } else {
        // get the email of user who forgot their password and make it a session variable also get the password and confirm password if the data is given by the newpassword.php page if the user used login.php then password and confirm password will be empty as they don't exist on that page
        $user_email = $_POST['forgotEmail'];
        $_SESSION['user_email'] = $user_email;
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // make sure new password is confirmed
        if ($password != $cpassword){
            echo "<script>alert('Please make sure passwords match')</script>";
            echo "<script>location.href='newpassword.php?forgotEmail=".$user_email ."'</script>";
        }
        else {
            //sets and encrypts new password and resets account and notifies user
            $password = md5($password);
            $query = "update player set password='$password' where email='$user_email'";
            mysqli_query($con, $query);
            $query2 = "update profile set password='$password' where email='$user_email'";
            mysqli_query($con, $query2);
            echo "<script>alert('User account reset for " . $user_email . "')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
?>