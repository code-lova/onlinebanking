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
                <div class="row">
                    
                    
                            
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Please complete the form to Proceed</h4>
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
                                        <form method="post" action="tscript2.php" name="myform" class="personal_validate">
                                            <div class="row">
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Account Name</label>
                                                    <input type="text" class="form-control" name="acc_name" id="acc_name" placeholder="Enter Account Name" required>
                                                </div>
                                                <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">

                                                <input type="hidden" name="savings"  value="offshore_personal">

                                                <input type="hidden" name="trac_type" class="form-control" value="Debit">

                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Account No.</label>
                                                    <input type="number" class="form-control" maxlength="12" name="account_no" id="account_no" placeholder="Enter Account No" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Bank Name</label>
                                                     <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Bank Address</label>
                                                    <input type="text" class="form-control" name="bank_addrs" id="bank_addrs" placeholder="Enter Bank Address" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Swift Code</label>
                                                      <input type="text" class="form-control" name="swift" id="swift" placeholder="Enter Swift Code" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                        <?php
                           $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                           $result = $connection->query($query);
                           if (mysqli_num_rows($result) > 0) 
                          {
                            while ($row = mysqli_fetch_assoc($result)) 
                          {
                        ?>
                                                    <label class="me-sm-2">Amount</label>
                                                    <input type="number" id="amount" class="form-control" name="amount" placeholder="Enter Amount" min="100" max="<?php echo $row['savings_balance']; ?>" required>
                                                    <?php 
                                                    }
                                                  }
                                                ?>
                                                </div>
                                                 <p></p>
                                                <div class="btn-group mb-3">
                                                    <a type="button" href="transfer" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" name="transfer_btn" class="btn btn-success">Proceed</button>
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


    </div>




    <?php include('includes/otherpagefooter.php'); ?>
