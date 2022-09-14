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
                                    <h4 class="card-title"><h5 class="modal-title">Open Ticket</h5></h4>
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
                                   <form action="tscript.php" method="post" class="identity-upload">
                                
                                    <div class="mb-3">
                                        <input type="hidden" name="subject_id" value="3">
                                        <label class="form-label">Subject </label>
                                        <input type="text" name="subject" required class="form-control" placeholder="Subject of your message">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="textareaInput">Message</label>
                                        <textarea id="textareaInput" name="message" placeholder="Enter Your Message Here"
                                          rows="4" cols="27"></textarea>
                                      </div>             
                              <div class="modal-footer">
                                <button type="submit" name="message_btn" class="btn btn-primary">Send Message</button>
                            </div>
                         </form>
                                </div>
                            </div>
                        </div>
                    </div>

                   

    </div>


    </div>




    <?php include('includes/otherpagefooter.php'); ?>
