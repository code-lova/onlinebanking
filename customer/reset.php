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



    <div id="main-wrapper">

        <div class="authincation section-padding">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center" style="margin-top: -50px;">
                    <div class="col-xl-5 col-md-6">
                        <div class="mini-logo text-center my-5">
                            <a href=""><img src="images/bmlogo.png" alt="" style="width: 200px;"></a>
                        </div>
                        <div class="auth-form card" style="margin-top: -50px;">
                            <div class="card-header justify-content-center">
                                <h4 class="card-title">Reset password</h4>
                            </div>
                            <div class="card-body">
                        <?php
                                if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                            {
                                echo '<div class="alert alert-danger 
                                <i class="icon-bell text-danger"></i>
                                    ' .$_SESSION['status'].'</div>';
                                unset($_SESSION['status']);
                            }

                         ?>
                                <form action="forgotpassword-script.php" method="post">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="email_check_btn" class="btn btn-success w-100">Continue</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <a class="text-primary" href="login">Go backLogin </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <script src="vendors/jquery/jquery.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

      
    <script src="vendors/validator/jquery.validate.js"></script>
    <script src="vendors/validator/validator-init.js"></script>

    <script src="js/scripts.js"></script>


</body>


<!-- Mirrored from demo.quixlab.com/treemium-html/reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Mar 2022 08:37:54 GMT -->
</html>