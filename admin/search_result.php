<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Activate Customer 
      </div>
      <div class="card-body">
        <h5 class="card-title">Users Accounts </h5>


        
            <div class="table-responsive">
                    <table class="table text-nowrap mb-0" id="table-data">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Acc.Name</th>
                          <th scope="col">Acc.Status</th>
                          <th scope="col">Acc.No</th>
                          <th scope="col">Checking</th>
                          <th scope="col">Savings</th>
                          <th scope="col">Uploads</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                          <th scope="col">Message</th>
                      </tr>
                      </thead>
                  <tbody>
              <tr>

                        <?php

                                if (isset($_GET['search'])) 
                                {
                                    $filtervalues = $_GET['search'];
                                    $sql = "SELECT * FROM users WHERE CONCAT(username,name,account_no,country) LIKE '%$filtervalues%'";
                                    $query = mysqli_query($connection, $sql);
                                    $rowCount = mysqli_num_rows($query);

                                    if(!$query)
                                        {
                                            die("SQL query failed: " . mysqli_error($connection));
                                        }

                                    if($rowCount > 0) 
                                    {
                                        while($row = mysqli_fetch_array($query)) 
                                        {
                            ?>
                   <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php
                                             
                    if ($row['is_active']==1) 
                      {
                        echo "<h4 class='text-success'>ACTIVE</h4>";
                      }else
                      {
                      echo "<h5 class='text-danger'>NOT ACTIVE</h5>";
                      }
                  ?>
              </td>
            <td><?php echo $row['account_no']; ?></td>
            <td>$<?php echo $row['checking_balance']; ?></td>
            <td>$<?php echo $row['savings_balance']; ?></td>
            <td><?php echo'<img src="../uploads/'.$row['user_image'].'" 
            width="50px;" height="50px;" alt="image" class="rounded-circle">'?></td>

            <td>
              <div class="position-relative ">
                  <form action="edit_customer" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="edit_btn" class=" btn btn-primary">
                            <i class="bi-pencil icon-text"></i>
                          </button>
                  </form>
              </div>
            </td>

            <td>
              <div class="position-relative ">
                  <form action="control_script.php" method="post">
                      <input type="hidden" name="delete_cust_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="del_cust_btn" class="btn btn-danger">
                              <i class="bi-trash icon-text"></i>
                          </button>
                  </form>
            </td>

            <td>
              <div class="position-relative ">
                  <form action="notice" method="post">
                      <input type="hidden" name="notice_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="notice_btn" class=" btn btn-success">
                            <i class="bi-chat icon-text"></i>
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
                                
                        <td colspan="5">NO Records Found</td>

                    </tr>
                <?php
                        }
                     }
                ?>
        </tbody>                           
      </table>
      <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                            <div class="d-flex mb-2 mb-md-0">Showing search Entries</div></div>

                    
    </div>
  </div>
</div>

<br/>










<?php include('includes/footer.php'); ?>
