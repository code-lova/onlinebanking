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



      <?php include('includes/greetings.php'); ?>


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
                                    <center><h5>Enter your Transfer PIN</h5></center>
                                    <br>
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
                                    <form action="tscript2" method="post" class="identity-upload">
                                        <div class="identity-content">
                                           <div class="form-group basic">
                                            <input type="text" class="form-control verification-input" name="acc_pin" id="acc_pin" placeholder="•••••" maxlength="5" required>
                                        <br/>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="transfer" class="btn btn-danger btn-block btn-lg">Cancel</a>
                                            </div>
                                        <div class="col-6">
                                            <button type="submit" name="pin_btn" class="btn btn-primary btn-block btn-lg">Verify</button>

                                                </div>
                                            </div>

                                         </div>
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
