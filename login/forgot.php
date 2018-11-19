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

            // gets the user from either the player table if player or profile if other profile type like admin, coach or team manager
            $query = "select * from player where email='$user_email'";
            $user_account  = mysqli_query($con, $query);
            $query2 = "select * from profile where email='$user_email'";
            $user_account2  = mysqli_query($con, $query2);
            // if evaluates to true if user is a player
            if(mysqli_num_rows($user_account)==1){
                // creates a temporary very secure password to be on the account until reset
                $password = md5("playerissettoberesetfam");
                $query = "update player set password='$password' where email='$user_email'";
                mysqli_query($con, $query);
                

                //PHPMailer Object
                $mail = new PHPMailer\PHPMailer\PHPMailer();

                $mail->isSMTP();                            // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                     // Enable SMTP authentication
                $mail->Username = 'ephraimnkh8@gmail.com';          // SMTP username this is where the client must enter the company email address (gmail)
                $mail->Password = 'iPhone411'; // SMTP password this is where the client must enter the company email address password (gmail)
                $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                          // TCP port to connect to

                //From email address and name
                $mail->From = "misports@help.com";
                $mail->FromName = "Mi-Sports Help";

                //To address and name
                $mail->addAddress($user_email);
                // $mail->addAddress("recepient1@example.com", "Ephraim Nkhoma"); //Recipient name is optional

                //Address to which recipient will reply
                $mail->addReplyTo("ephraimnkh8@gmail.com", "Reply");

                //CC and BCC
                // $mail->addCC("cc@example.com");
                // $mail->addBCC("bcc@example.com");

                //Send HTML or Plain Text email
                $mail->isHTML(true);

                // Below is the message subject and the body contains the actual message also altbody holds the plaintext version of the email incase browser can't load html
                $mail->Subject = "Reset Link";
                $mail->Body = "Hi Player seems you forgot your password, to reset your password go to the following link localhost:8080/newpassword.php?forgotEmail=" . $user_email; 
                $mail->AltBody = "This is the plain text version of the email content";

                // Checks if mail sent if not then reports error other wise sends message to email
                if(!$mail->send()) 
                {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } 
                else 
                {
                    echo "<script>alert('Message has been sent successfully')</script>";
                    echo "<script>location.href='login.php'</script>";
                }
                // end mail code
                
                
            } 
            // if evaluates to true if user is a coach, team manager or Admin
            else if(mysqli_num_rows($user_account2)==1){
                // creates a temporary very secure password to be on the account until reset
                $password = md5("profileissettoberesetfam");
                $query = "update profile set password='$password' where email='$user_email'";
                mysqli_query($con, $query);
                

                //PHPMailer Object
                $mail = new PHPMailer\PHPMailer\PHPMailer();

                $mail->isSMTP();                            // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                     // Enable SMTP authentication
                $mail->Username = 'ephraimnkh8@gmail.com';          // SMTP username
                $mail->Password = 'iPhone411'; // SMTP password
                $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                          // TCP port to connect to

                //From email address and name
                $mail->From = "misports@help.com";
                $mail->FromName = "Mi-Sports Help";

                //To address and name
                $mail->addAddress($user_email);
                // $mail->addAddress("recepient1@example.com", "Ephraim Nkhoma"); //Recipient name is optional

                //Address to which recipient will reply
                $mail->addReplyTo("ephraimnkh8@gmail.com", "Reply");

                //CC and BCC
                // $mail->addCC("cc@example.com");
                // $mail->addBCC("bcc@example.com");

                //Send HTML or Plain Text email
                $mail->isHTML(true);

                // Below is the message subject and the body contains the actual message also altbody holds the plaintext version of the email incase browser can't load html
                $mail->Subject = "Reset Link";
                $mail->Body = "Hi Account Holder seems you forgot your password, to reset your password go to the following link localhost:8080/newpassword.php?forgotEmail=" . $user_email; 
                $mail->AltBody = "This is the plain text version of the email content";

                // Checks if mail sent if not then reports error other wise sends message to email
                if(!$mail->send()) 
                {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } 
                else 
                {
                    echo "<script>alert('Message has been sent successfully')</script>";
                    echo "<script>location.href='login.php'</script>";
                }
                // end mail code
                
                
            } 
            // Alerts user to account not existing
            else {
                echo "<script>alert('User account doesn\'t exist please create an account')</script>";
                echo "<script>location.href='login.php'</script>";
            }
        
    }
?>