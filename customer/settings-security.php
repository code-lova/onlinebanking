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
                            <li class="active"><a href="#">Security</a></li>
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
                                <h4 class="card-title">Security</h4>
                            </div>
                             <?php 

                           $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                           $result = $connection->query($query);

                        ?>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-4">
                                        <div class="id_card">
                                            <img src="images/id.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <?php 

                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                    ?>
                                    <div class="col-xl-6">
                                        <div class="id_info">
                                            <h3><?php echo $row['name']; ?> </h3>
                                            <p class="mb-1 mt-3">Account No.: <?php echo $row['account_no']; ?> </p>
                                            <?php
                                              $query= "SELECT * FROM kycdoc WHERE user_id='".$_SESSION['id']."' AND status = '1' ";
                                              $result = $connection->query($query);
                                              $row = mysqli_fetch_assoc($result);
                                            ?>
                                            <p class="mb-1">KYC Status: <span class="font-weight-bold">
                                                <?php
                                                if ($row) 
                                                {
                                                  echo "<b class='text-success'>VERIFIED</b>";
                                                }else
                                                {
                                                  echo "<b class='text-danger'>Unverified</b>";
                                                }
                                              ?>         
                                            </span></p>
                                            <a href="verifyid-step-2" class="btn btn-success mt-3">Upload ID</a>
                                        </div>
                                    </div>
                                </div>
                                 <?php 

                                }
                              }

                              else
                              {
                                echo "No Record Found";
                              }

                          ?>
                                <div class="row">
                                    <?php 

                                       $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                                       $result = $connection->query($query);

                                    ?>
                                    <div class="col-xl-12">
                                         <?php 

                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                    ?>
                                        <div class="phone_verify">
                                            <h4 class="card-title mb-3">Email Address</h4>
                                                <div class="row align-items-center">
                                                    <div class="mb-3 col-xl-6">
                                                        <input type="text" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="phone_verified">
                                            <h5> <span><i class="fa fa-envelope"></i></span> <a href="" class="__cf_email__" data-cfemail="sbcu@sunbeltcreditunion.com">[<?php echo $row['email']; ?>]</a></h5>
                                            <div class="verify">
                                                <div class="verified">
                                                    <span><i class="la la-check"></i></span>
                                                    <a href="#">Verified</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <?php 

                                }
                              }

                              else
                              {
                                echo "No Record Found";
                              }

                          ?>

                                 <?php 

                                       $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                                       $result = $connection->query($query);

                                    ?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <?php 

                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                    ?>
                                        <div class="phone_verify">
                                            <h4 class="card-title mb-3">Customer Phone Number</h4>
                                                <div class="row align-items-center">
                                                    <div class="mb-3 col-xl-6">
                                                        <input type="text" class="form-control"
                                                            placeholder="<?php echo $row['mobile']; ?>" readonly>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="phone_verified">
                                            <h5> <span><i class="fa fa-phone"></i></span> <?php echo $row['mobile']; ?></h5>
                                            <div class="verify">
                                                <div class="verified">
                                                    <span><i class="la la-check"></i></span>
                                                    <a href="#">Verified</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <?php 

                                }
                              }

                              else
                              {
                                echo "No Record Found";
                              }

                          ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>


 <?php include('includes/otherpagefooter.php'); ?>