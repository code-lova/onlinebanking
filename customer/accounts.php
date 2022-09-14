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

                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <?php 

                           $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']."' ";
                           $result = $connection->query($query); 

                                if (mysqli_num_rows($result) > 0) 
                                {
                                    while ($row = mysqli_fetch_assoc($result)) 
                                {
                            ?>
                        <div class="card profile_card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img class="me-3 rounded-circle me-0 me-sm-3" src="../uploads/<?php echo $row['user_image']?>" width="60"
                                        height="60" alt="">
                                    <div class="flex-grow-1">
                                        <span>Customer Profile</span>
                                        <h4 class="mb-2"><?php echo $row['name']; ?></h4>
                                        <p class="mb-1"> <span><i class="fa fa-phone me-2 text-primary"></i></span>+<?php echo $row['mobile']; ?></p>
                                        <p class="mb-1"> <span><i class="fa fa-envelope me-2 text-primary"></i></span>[<?php echo $row['email']; ?>]
                                        </p>
                                    </div>
                                </div>

                                <ul class="card-profile__info">
                                    <li>
                                        <h5 class="me-4">Address</h5>
                                        <span class="text-muted"><?php echo $row['address']; ?></span>
                                    </li>
                                    <li class="mb-1">
                                        <h5 class="me-4">Last Login</h5>
                                        <span><?php echo $row['lastactivity']; ?></span>
                                    </li>
                                    <li>
                                        <h5 class="text-dark me-4">Account Status</h5>
                                        <span class="text-success">ACTIVE
                                        </span>
                                    </li>
                                </ul>
                                <div class="social-icons">
                                   <a type="button" href="settings" class="btn btn-primary">Update</a>
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
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="card acc_balance">
                            <div class="card-header">
                    <?php 

                        $query="SELECT id FROM debits WHERE user_id ='".$_SESSION['name']. "' ORDER BY id ";
                        $result= $connection->query($query);

                        $row= mysqli_num_rows($result);

                    ?>
                                <h4 class="card-title">Offshore Account Activities</h4>
                            </div>
                            <div class="card-body">
                                <span>Statistical Details</span>
                               
                                <div class="d-flex justify-content-between my-4">
                                    <div>
                                        <p class="mb-1">Beneficiaries</p>
                                        <h4 class="text-primary"># <?php echo "$row"; ?></h4>
                                    </div>
                                    <div>
                                        <p class="mb-1">Total Withdraws</p>
                                        <h4 class="text-secondary"># <?php echo "$row"; ?></h4>
                                    </div>
                                </div>
                                 <?php 

                                    $query="SELECT id FROM debits WHERE user_id ='".$_SESSION['name']. "' AND status = '0' ORDER BY id ";
                                    $result= $connection->query($query);

                                    $row= mysqli_num_rows($result);

                                ?>
                                <div class="d-flex justify-content-between my-4">
                                    <div>
                                        <p class="mb-1">Pending Transactions</p>
                                        <h4 class="text-warning"># <?php echo "$row"; ?></h4>
                                    </div>
                                    <?php 

                                        $query="SELECT id FROM debits WHERE user_id ='".$_SESSION['name']. "' AND status = '2' ORDER BY id ";
                                        $result= $connection->query($query);

                                        $row= mysqli_num_rows($result);

                                    ?>
                                    <div>
                                        <p class="mb-1">Cancelled Transfers</p>
                                        <h4 class="text-danger"># <?php echo "$row"; ?></h4>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Customer Account Details</h4>
                            </div>
                            <div class="card-body">
                                <form action="#">
                                    <div class="mb-3">
                                        <div class="input-group mb-3">
                    <?php 

                         $query = "SELECT SUM(savings_balance) AS count FROM users WHERE id ='".$_SESSION['id']. "'";
                         $result= $connection->query($query);

                         $record = $result->fetch_array();
                         $credit = $record['count'];
                                               


                        $query = "SELECT SUM(checking_balance) AS count FROM users WHERE id ='".$_SESSION['id']. "'";
                        $result= $connection->query($query);

                        $record = $result->fetch_array();
                        $total = $record['count'];

                        $actual =  $credit + $total;
                ?>
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"><i class="fa fa-money"></i></label>
                                            </div>
                                            <input type="text" class="form-control" placeholder="<?php echo $actual; ?> USD [Available Balance]">
                                        </div>
                                    </div>
                                     <?php 

                                        $query = "SELECT * FROM users WHERE id ='".$_SESSION['id']. "'";
                                        $result = $connection->query($query);

                                        if (mysqli_num_rows($result) > 0) 
                                        {
                                        while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                                    
                                    ?>
                                    <div class="mb-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"><i class="fa fa-bank"></i></label>
                                            </div>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['account_no']; ?>">
                                        </div>
                                    </div>
                                     <div class="mb-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"><i class="fa fa-cc"></i></label>
                                            </div>
                                            <input type="text" class="form-control" placeholder="<?php echo $row['acc_type']; ?>">
                                        </div>
                                    </div>

                                    <a type="button" href="transfer" class="btn btn-primary w-100">Send Money Now</a>
                                </form>

                                <?php 

                                    }
                                }else
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
