<?php include('includes/header.php'); ?>


    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar">

                           <?php include('includes/mobilelogo.php'); ?>

                           <?php include('includes/profilenav.php'); ?>

                           <?php include('includes/sidebar.php'); ?>

                           <?php include('includes/sidebarfooter.php'); ?>



       



        <div class="content-body">
            <div class="verification section-padding">
                <div class="container h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-xl-5 col-md-6">
                            <div class="auth-form card">
                                <!-- <div class="card-header">
                                <h4 class="card-title">Link a Debit card</h4>
                            </div> -->
                                <div class="card-body">
                                    <form action="" class="identity-upload">
                                        <div class="identity-content">
                                            <span class="icon"><i class="fa fa-shield"></i></span>
                                            <?php
                                            if (isset($_SESSION['success']) && $_SESSION['success'] !='') 
                                            {
                                                echo '<div class="alert alert-success 
                                                <i class="icon-bell text-success"></i>
                                                    ' .$_SESSION['success'].'</div>';
                                                unset($_SESSION['success']);
                                            }
                                            ?>
                                            <h4>Your ID have been submitted successfully.</h4>
                                            <p>Please hold, while we verify your ID document, as it may take up to 24hrs or less to complete verification.
                                            </p>
                                        </div>

                                        <div class="text-center">
                                            <a type="button" href="settings-security" class="btn btn-success ps-5 pe-5">Continue</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



 <?php include('includes/otherpagefooter.php'); ?>