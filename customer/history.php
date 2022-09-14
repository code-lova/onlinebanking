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
            <?php 

              $query = "SELECT * FROM debits WHERE user_id = '".$_SESSION['name']."' ORDER BY id DESC";
              $result = $connection->query($query);

            ?>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Transaction History</h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-sm">
                                            <tbody>
                                                 <?php 

                                                    if (mysqli_num_rows($result) > 0) 
                                                     {
                                                    while ($row = mysqli_fetch_assoc($result)) 
                                                     {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php if ($row['status']==0) 
                                                         {
                                                            echo "<span class='sold-thumb'><i class='la la-arrow-down'></i>
                                                        </span>";
                                                         }else if($row['status']==2)
                                                         {
                                                            echo "<span class='sold-thumb'><i class='la la-arrow-down'></i>
                                                        </span>";
                                                         }elseif ($row['status']==1)
                                                         {
                                                           echo "<span class='buy-thumb'><i class='la la-arrow-down'></i>
                                                        </span>";
                                                         } 
                                                        ?>
                                                       
                                                    </td>

                                                    <td>
                                                        #<?php echo $row['reference']; ?>
                                                    </td>

                                                    <td>
                                                        <?php if ($row['status']==0) 
                                                         {
                                                            echo "<span class='badge bg-warning'>Pending</span>";
                                                         }else if($row['status']==2)
                                                         {
                                                            echo "<span class='badge bg-danger'>Expired</span>";
                                                         }elseif ($row['status']==1)
                                                         {
                                                           echo "<span class='badge bg-success'>Completed</span>";
                                                         } 
                                                        ?>
                                                       
                                                    </td>
                                                    <td>
                                                        <?php echo $row['created']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $row['account_type']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['trac_type']; ?>
                                                    </td>
                                                    <td class="text-secondary">$<?php echo $row['amount']; ?></td>
                                                    <td> 
                                                        <form action="receipt.php" method="post">
                                                        <input type="hidden" name="view_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="view_btn" class=" btn btn-icon btn-primary">VIEW
                                                            </button>
                                                        </form>  
                                                    </td>
                                                </tr>
                                                 <?php 

                                                    }
                                                }

                                                else
                                                {
                                              ?>
                                              <tr>
                                                <td colspan="5">You have not performed any Transaction yet</td>
                                              </tr>
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
        </div>


    </div>



    <?php include('includes/otherpagefooter.php'); ?>
