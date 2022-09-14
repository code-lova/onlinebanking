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
        <div class="container">

           <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-xl-5 col-md-6">
                            <div class="auth-form card">
                                <div class="card-header">
                                    <h4 class="card-title"><h5 class="modal-title">Requesting IMF CODE</h5></h4>
                                </div>
                                <div class="section mt-2 text-center">
                                <h5 class="card-title">International Monetary Fund (IMF) Is Required.</h5>
                                <h6 class="card-subtitle mb-1"> <p>Code of Good Practices on Transparency in Monetary and Financial Policies is required to confirm that this fund is not fraudulent.</p></h6>
                                </div>
                                <div class="section mt-2 text-center">
                                  <h4>Enter 5 digit I.M.F verification code</h4>
                              </div>
                                <div class="card-body">
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
                                    <form action="tscript.php" method="post" class="identity-upload">
                                        <div class="row">
                                            <div class="mb-3 col-xl-12">
                                                <label class="me-sm-2">IMF CODE </label>
                                               <input type="text" class="form-control verification-input" name="imf" id="imf" placeholder="•••••" maxlength="5" required>
                                            </div>
                                            

                                          <div class="text-center">
                                            <div class="btn-group mb-3">
                                                    <a type="button" href="transfer" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" name="imf_btn" class="btn btn-success">Verify</button>
                                                </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>
                                Contact your account Clearance officer on email: <b>support@bm-national.com</b> or open a ticket in support center to speak with a customer care agent to obtain IMF Authorization Code. 
                            </p>
<br>
<br>
<br>

    </div>
  </div>






    <?php include('includes/otherpagefooter.php'); ?>
