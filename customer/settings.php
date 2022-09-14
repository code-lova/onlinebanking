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

                        
                <div class="row">
                    <?php include('includes/securitytab.php'); ?>
                    <div class="col-xl-9 col-md-8">
                        <div class="row">
                            <div class="col-xl-6">
                                 <?php 

                           $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                           $result = $connection->query($query);

                        ?>
                                <div class="card">
                                    <div class="card-header">
                                        <?php 

                                            if (mysqli_num_rows($result) > 0) 
                                            {
                                                while ($row = mysqli_fetch_assoc($result)) 
                                            {
                                        ?>
                                        <h4 class="card-title">Customer Banking Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="tscript.php" method="post" enctype="multipart/form-data">
                                             <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <div class="row">
                                                <div class="mb-3 col-xl-12">
                                                    <label class="me-sm-2">Customer Name</label>
                                                    <input type="text" name="edit_name" value="<?php echo $row['name']; ?>" class="form-control" >
                                                </div>
                                                <div class="mb-3 col-xl-12">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img class="me-3 rounded-circle me-0 me-sm-3"
                                                            src="../uploads/<?php echo $row['user_image']?>" width="55" height="55" alt="">
                                                        <div class="flex-grow-1">
                                                            <h4 class="mb-0"><?php echo $row['name']; ?></h4>
                                                            <p class="mb-0">Max file size is 20mb
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="file-upload-wrapper" data-text="Change Photo">
                                                        <input name="file-upload-field" name="edit_userpic" type="file"
                                                            class="file-upload-field" value="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" name="pbutton1" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
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
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Customer Password Settings</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="tscript.php" method="post">
                                            <div class="row">
                                                <div class="mb-3 col-xl-12">
                    
                                                <input type="password" name="oldpassword" class="form-control" placeholder="Enter Old Password" required>
                                                </div>
                                                 <div class="mb-3 col-xl-12">
                                                    
                                                <input type="password" name="newpassword" class="form-control" placeholder="Enter New Password" required>
                                                </div>
                                                <div class="mb-3 col-xl-12">
                                                    
                                                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password**********" required>
                                                    <p class="mt-2 mb-0">Enable two factor authencation on the security
                                                        page
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" name="update_user_password" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                             <?php 

                           $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                           $result = $connection->query($query);

                        ?>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <?php 

                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                            while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                    ?>
                                        <h4 class="card-title">Personal Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="tscript.php" name="myform" class="personal_validate">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <div class="row">
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Account Status</label>
                                                    <input type="text" class="form-control text-success" Value="Active" name="status" readonly>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Username</label>
                                                    <input type="text" class="form-control text-success" Value="<?php echo $row['username']; ?>" name="edit_username">
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Email</label>
                                                    <input type="email" name="edit_email" value="<?php echo $row['email']; ?>" class="form-control">
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Date of birth</label>
                                                    <input type="date" value="<?php echo $row['dob']; ?>" class="form-control" id="datepicker" name="edit_dob">
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Account Type</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['acc_type']; ?>" name="acc_type" readonly>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Mobile</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['mobile']; ?>" name="edit_mobile">
                                                </div>
                                               
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Postal Code</label>
                                                    <input type="text" name="edit_zip" value="<?php echo $row['zip']; ?>" class="form-control">
                                                </div>
                                                 <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Address</label>
                                                    <input type="text" name="edit_address" value="<?php echo $row['address']; ?>" class="form-control">
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Country</label>
                                                    <input type="text" name="edit_country" value="<?php echo $row['country']; ?>" class="form-control">
                                                </div>

                                                <div class="mb-3 col-12">
                                                    <button type="submit" name="update_user" class="btn btn-success ps-5 pe-5">Update</button>
                                                </div>
                                            </div>
                                        </form>
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

 <?php include('includes/otherpagefooter.php'); ?>