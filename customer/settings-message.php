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


                    <div class="col-6">
                        <ul class="text-right breadcrumbs list-unstyle">
                            <li><a href="settings">Settings </a></li>
                            <li class="active"><a href="#">Message</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="container">
                <div class="row">
                   <?php include('includes/securitytab.php'); ?>
                    <div class="col-xl-9 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Messages From Bank</h4>
                            </div>
                            <div class="card-body">
                        <?php 
                              $array = $connection->query("select * from message where message.user_id = '$_SESSION[id]' order by date desc");
                              if ($array->num_rows > 0)
                              {
                                while ($row = $array->fetch_assoc())
                                {
                        ?>

                                <div class="form">
                                    <ul class="linked_account">
                                        <li>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex">
                                                        <span class="me-3"><i class="fa fa-bank"></i></span>
                                                        <div class="flex-grow-1">
                                                            <h5 class="mt-0 mb-1">From: <?php echo $row['department']; ?> </h5>
                                                            <p>Subject: <?php echo $row['subject']; ?></p>
                                                            <p>Message: <?php echo $row['message']; ?></p>
                                                            <p>Date/time: <?php echo $row['date']; ?></p>
                                                            <p><a type="button" href="settings-support" class="btn btn-primary">Reply</a></p>
                                                        </div>
                                                        
                                                    </div>
                                                    <hr>
                                               
                                                </div>
                                                 <?php
                                                  }
                                                    }else{ echo "you have no messages yet";} 
                                             ?>
                                               
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>


 <?php include('includes/otherpagefooter.php'); ?>