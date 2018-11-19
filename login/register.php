<!doctype html>
<html lang="en">

<head>
    <title>Mi Sport - Log</title>
    <link rel="icon" type="image/png" href="assets/img/favicon%20(2).png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Paper kit and Paper Dashboard CSS. -->
    <link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet">
    <!-- Fonts and icons -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/nucleo-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/mi-paper-kit-2.css" rel="stylesheet" type="text/css">
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtJnOn1ISiBr1gSWUAdVRCkWab_FtcIno&libraries=places"></script> -->
</head>

<body>
    <!-- This is the placeholder for the alert that pops up after user actions -->
    <alert></alert>
    <!-- The navbar has z-index: 1; so that the if the card display with the input fields scrolls to the top of the page it overlaps the navbar, this gives the card display more space on the webpage and allows one to click the company logo to go to the landing page as with z-index:0 you can't click on the logo if the card display is too far up the page. And padding-top: 0; is there so that the company logo is pushed further up the webpage making more space for the card display. -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent" style="z-index:1; padding-top:0;">
        <div class="container">
            <div class="navbar-translate">
                <!-- style="background-color: #fff" is put so that the image is made stands out more on the transparent navbar -->
                <a class="navbar-brand" href="../index.html"><img src="assets/img/asset-1.png" style="background-color: #fff;"></a>
            </div>
        </div>
    </nav>
    <div class="bg-img">
        <div class="my-filter">
            <!-- the style="padding-top" is not here as it does not matter here -->
            <div class="container registration">
                <div class="row">
                    <!-- Changed the below col-md-4 to col-xl-4 as the md or xl refers to when the page should revert to mobile rows and it was changed to xl to make it more responsive as when scaling with the developer pane on chrome it would not look proper
  					Also ml and mr should refer to margin left and margin right as they seem to center the card-register-->
                    <div class="col-xl-4 ml-auto mr-auto">
                        <!-- The animate css class was taken from the code from tino and tanaka to animate the card on load. And this is the card display-->
                        <div class="card card-register" style="padding-top:10px; padding-bottom:10px">
                            <!-- This is the progress numbers at the top of the registration form. mi-page-item is a custom css class I created based on the paper kit 2 css -->
                            <ul class="pagination" style="margin: 0 auto;">
                                <li class="mi-page-item active" id="1">
                                    <a class="page-link" onclick="changePage(0)">1</a>
                                </li>
                                <li class="mi-page-item" id="2">
                                    <a class="page-link" onclick="changePage(1)">2</a>
                                </li>
                                <li class="mi-page-item" id="3">
                                    <a class="page-link" onclick="changePage(2)">3</a>
                                </li>
                                <li class="mi-page-item" id="4">
                                    <a class="page-link" onclick="changePage(3)">4</a>
                                </li>
                                <li class="mi-page-item" id="5">
                                    <a class="page-link" onclick="changePage(4)">5</a>
                                </li>
                            </ul>
                            <!-- The reason we have onsubmit="return false" is so that when clicking the button for the form it does not reload the page losing all the content of the input fields -->
                            <form action="register-form.php" method="POST" class="register-form" name="form">
                            <!-- <form class="register-form" name="form" onsubmit="return false"> -->
                                <h3 class="title" style="color:#FFF; padding:0">Register an account:</h3>
                                <!-- The class page refers to a page of input fields in the registration form -->
                                <div class="page">
                                    <!-- This is used to animate each page on a page change -->
                                    <div class="animate">
                                        <h5 class="title" style="color:#FFF; padding:0">Account Setup</h5>
                                        <label>Email</label>
                                        <!-- The <email> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <email><input name="email" type="email" class="form-control" placeholder="Email"></email>
                                        <label for="password">Password</label>
                                        <!-- The <password> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <password><input name="password" type="password" class="form-control" placeholder="Password"></password>
                                        <label for="cpassword">Confirm Password</label>
                                        <!-- The <cpassword> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <cpassword><input name="cpassword" type="password" class="form-control" placeholder="Confirm Password"></cpassword>
                                        <label>School/Club Name</label>
                                        <!-- The <scname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <scname>
                                            <input placeholder="School/Club Name" type="text" name="schoolClubName" class="form-control">
                                        </scname>
                                        <br>
                                    </div>
                                </div>
                                <div class="page">
                                    <div class="animate">
                                        <h5 class="title" style="color:#FFF">Personal Details</h5>
                                        <label>First Name</label>
                                        <!-- The <fname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <fname><input name="firstName" type="text" class="form-control" placeholder="First Name"></fname>
                                        <label>Last Name</label>
                                        <!-- The <lname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <lname><input name="lastName" type="text" class="form-control" placeholder="Last Name"></lname>
                                        <label>Nickname</label>
                                        <!-- The <nname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <nname><input name="nickname" type="text" class="form-control" placeholder="Nickname"></nname>
                                        <label>Height (cm)</label>
                                        <!-- The <nname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <height><input name="height" type="number" class="form-control" placeholder="Height"></height>
                                        <label>Weight (kg)</label>
                                        <!-- The <nname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <weight><input name="weight" type="number" class="form-control" placeholder="Weight"></weight><br>
                                    </div>
                                </div>
                                <div class="page">
                                    <div class="animate">
                                        <h5 class="title" style="color:#FFF">Personal Contact Infomation</h5>
                                        <!-- autocomplete="potato" is currently the only way to get autocomplete to stop in chrome -->
                                        <label>Phone Number</label>
                                        <!-- The <phonenumber> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <phonenumber><input name="phoneNumber" type="text" class="form-control" placeholder="Phone Number"></phonenumber>
                                        <label>Home Address</label>
                                        <!-- The <homeaddress> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function. Also make sure that the placeholder, name and id of the home address input field do not contain the words address in them as this will turn on autocomplete and stop it from being able to be turned off, which will mean autocomplete will block the google autocomplete -->
                                        <!-- <homeaddress><input name="home" type="text" class="form-control" id="home" onFocus="geolocate()" autocomplete="potato"></homeaddress> -->
                                        <homeaddress><input name="home" type="text" class="form-control" id="home" placeholder="Enter your Address"></homeaddress>
                                        <label>City</label>
                                        <!-- The <City> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <city><input name="city" type="text" class="form-control" placeholder="City" id="locality"></city>
                                        <label>Country</label>
                                        <!-- The <Country> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <country><input name="country" type="text" class="form-control" placeholder="Country" id="country"></country>
                                        <label>Postal Code</label>
                                        <!-- The <Postal Code> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <postalcode><input name="postalcode" type="text" class="form-control" placeholder="Postal Code" id="postal_code"></postalcode><br>
                                        <br>
                                    </div>
                                </div>
                                <div class="page">
                                    <div class="animate">
                                        <h5 class="title" style="color: #fff">Parent/Guardian info</h5>
                                        <!-- pg means parent/guardian -->
                                        <label>Parent/Guardian First Name</label>
                                        <!-- The <pgfname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <pgfname>
                                            <input name="pgFirstName" type="text" class="form-control" placeholder="Parent/Guardian First Name">
                                        </pgfname>
                                        <label>Parent/Guardian Last Name</label>
                                        <!-- The <pglname> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <pglname>
                                            <input name="pgLastName" type="text" class="form-control" placeholder="Parent/Guardian Last Name">
                                        </pglname>
                                        <label>Parent/Guardian Email</label>
                                        <!-- The <pgemail> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <pgemail>
                                            <input name="pgEmail" type="email" class="form-control" placeholder="Parent/Guardian Email">
                                        </pgemail>
                                        <label>Parent/Guardian Phone Number</label>
                                        <!-- The <pgphonenumber> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <pgphonenumber>
                                            <input name="pgPhoneNumber" type="text" class="form-control" placeholder="Parent/Guardian Phone Number">
                                        </pgphonenumber>
                                        <br>
                                    </div>
                                </div>

                                <div class="page">
                                    <div class="animate">
                                        <h5 class="title" style="color:#FFF">Birthdate & Gender</h5>
                                        <label>Date of Birth</label>
                                        <!-- The <bday> element is used for the replacing the html code between the elements open and close tags, so you can replace the code between the element with anything using jquery .html() function -->
                                        <bday>
                                            <input placeholder="yyyy/mm/dd" type="date" name="dateOfBirth" class="form-control">
                                        </bday>
                                        <label>Gender</label><br>
                                        <!-- In order to make buttons work give them the same name -->
                                        <div class="form-check-radio">
                                            <label class="form-check-label" style="margin: 0 auto">
                                                <input class="form-check-input" type="radio" name="genderRadio" id="femaleRadio" value="Female">
                                                Female
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                        <div class="form-check-radio">
                                            <label class="form-check-label" style="margin: 0">
                                                <input class="form-check-input" type="radio" name="genderRadio" id="maleRadio" value="Male">
                                                Male
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <!-- <input type="submit" value="Create Account" class="btn btn-success btn-block btn-round" onclick="createAccount()"> -->
                                <!-- I have added type="submit",  and  formmethod="post"-->
                                <button id="create-account-btn" name="create" type="submit" class="btn btn-success btn-block btn-round" onclick="createAccount()"
                                    style="margin-bottom:15px">Create Account</button>
                                <!-- <button id="create-account-btn" name="create" class="btn btn-success btn-block btn-round" onclick="createAccount()"
                                        style="margin-bottom:15px">Create Account</button> -->
                            </form>
                            <!-- Navigation buttons at the bottom of the page -->
                            <ul class="pagination" style="margin: 0 auto">
                                <li class="mi-page-item" title="Previous">
                                    <a class="page-link" href="#" aria-label="Previous" id="prev-btn">
                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="mi-page-item" title="Next">
                                    <a class="page-link" href="#" aria-label="Next" id="next-btn">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Create account button for the last page -->
                            <!-- <input type="submit" id="create-account-btn" class="btn btn-success btn-block btn-round" value="Create Account" onclick="register.php"> -->
                            <!-- <button id="create-account-btn" class="btn btn-success btn-block btn-round" onclick="createAccount()">Create Account</button>  -->
                            <!-- Button to cancel account creation at any time and return to landing page -->
                            <a href="../index.html" class="btn btn-link btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The following code is from the bootstrap website except the first uncommented script-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- using the non-slim version as .animate not part of the slim version and removed the integrity and crossorigin as it wasn't working -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!--  Paper Kit Initialization and functons -->
    <script src="assets/js/paper-kit.js?v=2.1.0"></script>
    <!-- Custom JavaScript -->
    <script src="assets/js/login-register.js" type="text/javascript"></script>
    <script src="assets/js/mi-sport.js" type="text/javascript"></script>
    <!-- <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtJnOn1ISiBr1gSWUAdVRCkWab_FtcIno&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
        //     street_number: 'short_name',
        //     route: 'long_name',
            locality: 'long_name',
        //     administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            console.log("in initAutocomplete()");
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('home')),
                { types: ['geocode'] });

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            console.log("in fillInAddress()");
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            console.log("in geolocate()");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkj6pdHW7c-D3mlRgfqZxDmFdvLh9hLT0&libraries=places&callback=initAutocomplete" async defer>
    </script> -->
</body>

</html>