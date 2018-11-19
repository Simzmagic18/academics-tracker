<!doctype html>
<html lang="en">

<head>
    <title>Mi Sport - Log (New Password)</title>
    <link rel="icon" type="image/png" href="assets/img/favicon%20(2).png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <!-- Paper kit and Paper Dashboard CSS. -->
    <link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet">
    <!-- Fonts and icons -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/nucleo-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/mi-paper-kit-2.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- This is the placeholder for the alert that pops up after user actions -->
    <alert></alert>
    <!-- The navbar has z-index: 1; so that the if the card display with the input fields scrolls to the top of the page it overlaps the navbar, this gives the card display more space on the webpage and allows one to click the company logo to go to the landing page as with z-index:0 you can't click on the logo if the card display is too far up the page. And padding-top: 0; is there so that the company logo is pushed further up the webpage making more space for the card display. -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent" style="z-index:1; padding-top:0">
        <div class="container">
            <div class="navbar-translate">
                <!-- style="background-color: #fff" is put so that the image stands out more in the transparent navbar -->
                <a class="navbar-brand" href="index.html"><img src="assets/img/asset-1.png" style="background-color: #fff"></a>
            </div>
        </div>
    </nav>
    <!-- bg-img is the css class that contains the background image and my-filter is the css class that contains the code to overlay a dark filter over the background image -->
    <div class="bg-img">
        <div class="my-filter">
            <div class="container" style="padding-top:100px">
                <div class="row">
                    <!-- Changed the below col-md-4 to col-xl-4 as the md or xl refers to when the page should revert to mobile rows and it was changed to xl to make it more responsive as when scaling with the developer pane on chrome it would not look proper
            								Also ml and mr should refer to margin left and margin right as they seem to center the card display-->
                    <div class="col-xl-4 ml-auto mr-auto">
                        <!-- The animate css class was taken from the code from tino and tanaka to animate the card on load. And this is the card display-->
                        <div class="card card-register animate">
                            <h3 class="title" style="color:#FFF">Password Reset</h3>
                            <!-- The reason we have onsubmit="return false" is so that when clicking the button for the form it does not reload the page losing all the content of the input fields -->
                            <form action="forgotNew.php" method="POST" class="register-form" name="loginForm">
                                <label>Email</label>
                                <!-- The <forgotemail> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                <forgotemail><input name="forgotEmail" type="text" class="form-control" placeholder="Email" value="<?php echo $_GET['forgotEmail'] ?>"></forgotemail>
                                <label>Enter New Password:</label>
                                <!-- The <loginpassword> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                <loginpassword><input name="password" type="password" class="form-control" placeholder="New Password" required></loginpassword>
                                <label for="cpassword">Confirm Password:</label>
                                <!-- The <cpassword> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                <cpassword><input name="cpassword" type="password" class="form-control" placeholder="Confirm Password"></cpassword>
                                <!-- The <loginbutton> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                <button name="resetPassword" type="submit" class="btn btn-success btn-block btn-round">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-black">
        <div class="container">
            <span>
    
            </span>
        </div>
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li>
                            <a href="#">Terms and Conditions</a>
                        </li>
                        <li>
                            <a href="#">Copa</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="contact-us.html">Contact us</a>
                        </li>
                        <li>
                            <a href="#">FAQs</a>
                        </li>
                        <li>
                            <a href="">Privacy policy</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
    <!-- The following code is from the bootstrap website except the first uncommented script-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- using the non-slim version as .animate not part of the slim version and removed the integrity and crossorigin as it wasn't working -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <!--  Paper Kit Initialization and functons -->
    <script src="assets/js/paper-kit.js?v=2.1.0"></script>
    <!-- Custom JavaScript -->
    <script src="assets/js/login-register.js" type="text/javascript"></script>
    <script src="assets/js/mi-sport.js" type="text/javascript"></script>
    </body>
</html>