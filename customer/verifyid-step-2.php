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
                                    <form  method="post" action="kyc_script.php" enctype="multipart/form-data" class="identity-upload">

                                        <div class="identity-content">
                                            <h4>Upload your ID card</h4>
                                            <span>(Driving License or Government ID card)</span>

                                            <p>Uploading your ID helps as ensure the safety and security of your Finance.
                                            </p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="me-sm-2">Upload ID </label>
                                            <?php
                                            if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                                            {
                                                echo '<div class="alert alert-danger 
                                                <i class="icon-bell text-danger"></i>
                                                    ' .$_SESSION['status'].'</div>';
                                                unset($_SESSION['status']);
                                            }
                                            ?>
                                            <span class="float-right">Maximum file size is 2mb</span>
                                            <div class="file-upload-wrapper" data-text="ID.jpg">
                                                <input name="identity" type="file" class="file-upload-field">
                                            </div>
                                        </div>
                                        

                                        <div class="text-center">
                                            <button type="submit" name="kyc_btn" class="btn btn-success ps-5 pe-5">Submit</button>
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