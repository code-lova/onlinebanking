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
                            <div class="card-header border-0">
                                <h4 class="card-title">Payment</h4>
                            </div>
                            <div class="card-body pt-0">
                                <p>Transfer charges is USD35 per transaction.</p>
            <p>International transfer may take 1-2weeks depending on your bank & country.</p>
              <div class="card">
          <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">TRANSACTION SUMMARY </h6>
                <div class="header-elements">
                  <div class="list-icons">
                </div>
              </div>
          </div>
          <div class="card-body">
             <div class="form-group row">
                 
    <div class="c-layout-sidebar-content" style="margin-top: -30px;">
      <div class="c-margin-t-30"></div>
      <div class="c-margin-t-20"></div>
      <div class="row c-margin-b-40 myview-account1">
        <div class="c-content-product-2 c-bg-white">
          <div class="col-md-12" style="width: 100%;">
            <div class="c-info-list">           
              <p class="c-desc c-font-16 c-font-thin"></p>

          <?php  
            if (isset($_POST['view_btn'])) 
            {
              $id = $_POST['view_id'];

              $query = "SELECT * FROM debits WHERE id='$id' ";
              $result = $connection->query($query);

              foreach ($result as $row) 
            {
                
          ?> 

              <table class="table" style="color:#666;">
                <tbody>
               <tr>
                  <td colspan="2" style="border-top: none;">
                    <br>A Debit of $<?php echo $row['amount']; ?>  was performed on your account.
                    Details of this transaction below.</td>
                     <a href="history"><< Go Back</a>
                </tr>
                <td type="hidden" name="view_id" value="<?php echo $row['id']; ?>">
                  </td>

                <tr>
                  <td valign="top"><strong>TRANSACTION TYPE</strong>
                    <br><?php echo $row['trac_type']; ?><br><br>
                    <strong>FROM</strong><br><?php echo $row['account_type']; ?><br><br>

                    <strong>AMOUNT TRANSFERED</strong><br><span style="font-size:30px; font-weight:bold;">$<?php echo $row['amount']; ?></span><br><br>


                    <?php 

                           $query = "SELECT * FROM users WHERE name ='".$_SESSION['name']."' ";
                           $result = $connection->query($query);
                           if (mysqli_num_rows($result) > 0) 
                                {
                                    while ($row = mysqli_fetch_assoc($result)) 
                                {

                        ?>

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

                    <strong>AVAILABLE BALANCE</strong><br><span style="font-size:30px; font-weight:bold;">$<?php echo $actual; ?></span><br><br>
                     <strong>TRANSFER FEE</strong><br><span style="font-size:30px; font-weight:bold;">$35</span><br><br>
                     <?php 

                                }
                            }

                            else
                            {
                                echo "No Record Found";
                            }

                        ?>
                  </td>
                  <td valign="top">
                    <?php

                    $query="SELECT * FROM debits WHERE id='$id' ";
                    $result = $connection->query($query);
                    foreach($result AS $row)
                    {
                   ?>
                    <strong>ACCOUNT NAME</strong><br><?php echo $row['acc_name']; ?><br><br>
                    <strong>BANK NAME</strong><br><?php echo $row['bank_name']; ?><br><br>
                    <strong>ACCOUNT NUMBER</strong><br><?php echo $row['account_no']; ?><br><br>
                    <strong>SWIFT CODE</strong><br><?php echo $row['swift']; ?><br><br>
                    <strong>MEDIUM</strong><br>NET-TELLER<br><br>
                    <strong>NET-TELLER ID</strong><br>#<?php echo $row['reference']; ?><br><br>

                  </td>
                </tr>

                <tr>
                  <td colspan="2" style="border:none;">
                    <table class="table">
                      <tbody><tr>
                        

                        <td>

                          
                          
                              Payment <?php if ($row['status']==0) 
                                             {
                                                echo "<b class ='text-warning'>Pending</b>";
                                             }else if($row['status']==2)
                                             {
                                                echo "<b class ='text-danger'>Expired</b>";
                                             }elseif ($row['status']==1)
                                             {
                                               echo "<b class ='text-success'>Completed</b>";
                                             } 
                                        ?>.....
                                <span class="glyphicon glyphicon-chevron-right"> </span></button>
                          </a>
                        </td>
                        <td>
                    <?php              

                   }

                  ?>
                      </td>
                  </tr>
                    </tbody>
                </table>

                  </td>
                </tr>


              </tbody></table>
            </div>

          </div>
        </div>
      </div>
    </div>

          </div>
        </div>
        <!-- /basic layout -->
      </div>
       <?php 

              }

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


    </div>



    <?php include('includes/otherpagefooter.php'); ?>
