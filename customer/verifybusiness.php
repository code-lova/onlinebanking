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
                <?php 

                    $query = "SELECT * FROM debits WHERE user_id ='".$_SESSION['name']. "' ORDER BY id DESC LIMIT 1";
                    $result = $connection->query($query);

                    if (mysqli_num_rows($result) > 0) 
                    {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                    
                                
                ?>
                                <div class="card-body">
                                    <form action="" method="post" class="identity-upload">
                                        <div class="identity-content">
                                            <span class="icon"><i class="fa fa-shield"></i></span>
                                            <h4>Please Confirm Your Wire Transfer</h4>
                                            <p>You are sending $ <?php echo $row['amount']?> to <?php echo $row['acc_name']?>. Are you sure?
                                            </p>
                                        </div>

                                        <div class="text-center">
                                            <div class="btn-group mb-3">
                                                    <a type="button" href="transfer" class="btn btn-danger">Cancel</a>
                                                    <a type="button" href="authentication2" name="transfer_btn" class="btn btn-success">Proceed</a>
                                                </div>
                                        </div>
                                    </form>
                                     <?php 

                                        }
                                    }
                                    else
                                        {
                                      ?>
                                    <div class="identity-content">
                                        <span class="icon"><i class="fa fa-shield"></i></span>
                                            <h4>You have not performed any transaction yet</h4>
                                    </div>
                                      <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>













    <?php include('includes/otherpagefooter.php'); ?>
