<?php 

ob_start();
session_start();
require_once('database_connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>B & M National Bank - Offshore Customer Internet Banking Profile </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->

    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>


    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="logout" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
             <h1>B & M National Bank</h1>
             <h3>Recover your account</h3>
            <h4>Your Credentials</h4>

<div id="google_translate_element"></div>
    <script type="text/javascript">
    var duplicate_google_translate_counter = 0;//this stops google adding button multiple times
    function googleTranslateElementInit() {
       if (duplicate_google_translate_counter == 0) {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
       }
       duplicate_google_translate_counter++;
    }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </div>
        <div class="section mb-5 p-2">

            
                <div class="card">
                    <div class="card-body pb-1">
                        <?php

                    if (isset($_SESSION['success']) && $_SESSION['success'] !='') 
                    {
                        echo '<div class="alert alert-success 
                        <i class="icon-bell text-success"></i>
                            ' .$_SESSION['success'].'</div>';
                        unset($_SESSION['success']);
                    }

                        if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<div class="alert alert-danger 
                        <i class="icon-bell text-danger"></i>
                            ' .$_SESSION['status'].'</div>';
                        unset($_SESSION['status']);
                    }

                 ?>
                    <form action="forgotpassword-script.php" method="post">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <strong><p style="color:green;">An OTP Code have been sent to your email address.</p></strong>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="otp">OTP</label>
                                <input type="number" class="form-control" id="otp" placeholder="Enter OTP code" name="otp" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <strong><div style="color: red; float: right;" id="countdown"></div></strong>
                                    <br/>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="New Password" name="password" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                    </div>
                </div>

                 <button type="submit" name="update_btn" class="btn btn-primary btn-block btn-lg">Update</button>
                  <br>
                  <br>
                <p><a class="text-danger" href="logout">Back to Customer Login</a></p>     
            </form>
        </div>

    </div>
    <!-- * App Capsule -->

<script>
    var timeleft = 60;
    var downloadTimer = setInterval(function(){
        if(timeleft <= 0){
            ClearInterval(downloadTimer);
            document.getElementById("countdown").innerHTML ="Finished";
        }else {
            document.getElementById("countdown").innerHTML = timeleft + " sec left";
        }
        timeleft -= 1;
        }, 1000);

</script>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <script src="vendor/toastr/toastr.min.js"></script>

    <script src="js/scripts.js"></script>



</body>


<!-- Mirrored from demo.quixlab.com/treemium-html/reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Mar 2022 08:37:54 GMT -->
</html>