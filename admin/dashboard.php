
<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 
include('subfunction.php');

?>


       
        <!-- Container fluid -->
        <div class="bg-primary pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <!-- Page header -->
              <div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">Dashboard</h3>
                  </div>
                  <div>
                    <a href="add_customer" class="btn btn-white">Create an Account</a>
                  </div>
                </div>
              </div>
            </div>
             <?php 

                        $query="SELECT id FROM debits ORDER BY id ";
                        $result= $connection->query($query);

                        $row= mysqli_num_rows($result);

                    ?>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0"><strong class="text-muted">Cash Debits: #<?php echo "$row"; ?></strong> </h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                      <i data-feather="activity"></i>
                    </div>
                  </div>
                  
                  <!-- project number -->
                  <div>
                    <h4 class="fw-bold text-muted">UpTotal</h4>
                    <p></p>
                     <?php
                        $query = "SELECT SUM(amount) AS count FROM debits";
                        $result= $connection->query($query);

                        $record = $result->fetch_array();
                        $total = $record['count'];

                    ?>
                    <p class="text-danger">Total-$: <?php echo $total; ?></p>
                    <?php
                        $query = "SELECT SUM(amount) AS count FROM crypto_debits";
                        $result= $connection->query($query);

                        $record = $result->fetch_array();
                        $total = $record['count'];

                    ?>

                    <p class="text-danger">Total-₿: <?php echo $total; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                  <?php
                        $query = "SELECT SUM(savings_balance) AS count FROM users";
                        $result= $connection->query($query);

                        $record = $result->fetch_array();
                        $total = $record['count'];

                    ?>
                    <?php
                        $query = "SELECT SUM(checking_balance) AS count FROM users";
                        $result= $connection->query($query);

                        $record = $result->fetch_array();
                        $total2 = $record['count'];

                    ?>
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0 text-muted">Total Funds</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                      <i data-feather="dollar-sign"></i>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h3 class="fw-bold text-muted">$<?php echo $actual; ?></h3>
                    <p class="text-primary">Checking: $<?php echo $total2; ?></p>
                    <p>Savings: $<?php echo $total; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <?php 

                        $query="SELECT id FROM users ORDER BY id ";
                        $result= $connection->query($query);

                        $row= mysqli_num_rows($result);

                    ?>
                    <?php

                            $query = "SELECT * FROM users WHERE is_active = '0' ";
                            $result = $connection->query($query);

                            $num= mysqli_num_rows($result);
  
                        ?>
                         <?php

                            $query = "SELECT * FROM users WHERE is_active = '1' ";
                            $result = $connection->query($query);

                            $act= mysqli_num_rows($result);

                        ?>
              <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0 text-muted">Total Customers</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                      <i class="bi bi-people fs-4"></i>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h3 class="fw-bold text-muted"> # <?php echo "$row"; ?></h3>
                    <p class="text-success">Active: # <?php echo "$act"; ?></p>
                    <p class="text-danger">Not Active: # <?php echo "$num"; ?></p>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card rounded-3">
                <?php 

                        $query="SELECT message_id FROM message ORDER BY message_id ";
                        $result= $connection->query($query);

                        $row= mysqli_num_rows($result);

                    ?>

                    <?php

                            $query = "SELECT * FROM ticket WHERE subject_id = '2' ";
                            $result = $connection->query($query);

                            $subId= mysqli_num_rows($result);

                        ?>

                        <?php 

                        $query="SELECT ticket_id FROM ticket ORDER BY ticket_id ";
                        $result= $connection->query($query);

                        $ticketNO= mysqli_num_rows($result);

                    ?>

                    <?php

                            $query = "SELECT * FROM ticket WHERE status = '0' ";
                            $result = $connection->query($query);

                            $unRead= mysqli_num_rows($result);
  
                        ?>

                         <?php

                            $query = "SELECT * FROM ticket WHERE status = '1' ";
                            $result = $connection->query($query);

                            $read= mysqli_num_rows($result);

                        ?>
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0 text-muted">Sent Notice: # <?php echo "$row"; ?></h4>
                      <b class="text-info">Replied: # <?php echo "$subId"; ?> </b>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                      <i class="bi bi-messenger"></i>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h4 class="fw-bold text-primary-hover">Open Tickets:# <?php echo "$ticketNO"; ?></h4>
                    <p class="text-success">Read: # <?php echo "$read"; ?></p>
                    <p class="text-danger">Unread: # <?php echo "$unRead"; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <!-- row  -->
          <div class="row my-6">
            <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-6 mb-xl-0">
              <!-- card  -->
              <div class="card h-100">
                <!-- card body  -->
                <div class="card-body">
                  <div class="d-flex align-items-center
                    justify-content-between">
                    <div>
                      <h4 class="mb-0">Transaction Stats </h4>
                    </div>
                    <!-- dropdown  -->
                    <div class="dropdown dropstart">
                      <a class="text-muted text-primary-hover" href="#"
                        role="button" id="dropdownTask" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="icon-xxs" data-feather="more-vertical"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownTask">
                        <a class="dropdown-item" href="#">View</a>
                      </div>
                    </div>
                  </div>
                  <!-- chart  -->
                  <div class="mb-8">
                    <div id="perfomanceChart"></div>
                  </div>
                  <!-- icon with content  -->
            <?php 
                $query = "SELECT * FROM debits WHERE status = '1'";
                $result = $connection->query($query);
                $row= mysqli_num_rows($result);

            ?>
                  <div class="d-flex align-items-center justify-content-around">
                    <div class="text-center">
                      <i class="icon-sm text-success"
                        data-feather="check-circle"></i>
                      <h1 class="mt-3 fw-bold mb-1"><?php echo "$row"; ?>%</h1>
                      <p>Completed</p>
                    </div>
            <?php 
                $query = "SELECT * FROM debits WHERE status = '0'";
                $result = $connection->query($query);
                $row= mysqli_num_rows($result);

            ?>
                    <div class="text-center">
                      <i class="icon-sm text-warning"
                        data-feather="trending-up"></i>
                      <h1 class="mt-3 fw-bold mb-1"><?php echo "$row"; ?>%</h1>
                      <p>Pending</p>
                    </div>

            <?php 
                $query = "SELECT * FROM debits WHERE status = '2'";
                $result = $connection->query($query);
                $row= mysqli_num_rows($result);

            ?>
                    <div class="text-center">
                      <i class="icon-sm text-danger"
                        data-feather="trending-down"></i>
                      <h1 class="mt-3 fw-bold mb-1"><?php echo "$row"; ?>%</h1>
                      <p>Cancelled</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- card  -->
            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
              <div class="card h-100">
                <!-- card header  -->
              <?php
                $sql="SELECT * FROM contact WHERE status='0'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_num_rows($result);
              ?>
                <div class="card-header bg-white border-bottom-0 py-4">

                  <p class="text-nowrap"><strong>Contact/Request Area:<b class="text-success"><a class="text-success" href="readcontactmessage.php"> You have <?php echo "$row"; ?> Messages.</a></b></strong></p>

             
                  <h4 class="mb-0">Customers Banking Profiles </h4>
                </div>
                <!-- table  -->
                <?php
                $sql='SELECT * FROM users';
                $result = mysqli_query($connection, $sql);

                ?>
                <div class="table-responsive">
                  <table class="table text-nowrap">
                    <thead class="table-light">
                      <tr>
                        <th>Name</th>
                        <th>Bank Account</th>
                        <th>Last Activity</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                         while($row = mysqli_fetch_array($result)) {
  
                      ?>
                      <tr>
                        <td class="align-middle">
                          <div class="d-flex align-items-center">
                            <?php echo'<img src="../uploads/'.$row['user_image'].'" 
                              width="50px;" height="50px;" alt="image" class="rounded-circle">'?>
                            <div class="ms-3 lh-1">
                              <h5 class="fw-bold mb-1"><?php echo $row['name']; ?></h5>
                              <p class="mb-0"><?php echo $row['email']; ?></p>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle"><?php echo $row['account_no']; ?></td>
                        <td class="align-middle"><?php echo $row['lastactivity']; ?></td>
                        <td class="align-middle">
                          <div class="dropdown dropstart">
                            <a class="text-muted text-primary-hover" href="#"
                              role="button" id="dropdownTeamOne"
                              data-bs-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              <i class="icon-xxs" data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu"
                              aria-labelledby="dropdownTeamOne">
                              <a class="dropdown-item" href="customers">view</a>
                              
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                      <?php 

                          }
                                           
                      ?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include('includes/footer.php'); ?>
    