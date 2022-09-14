<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Customers Banking Profiles
      </div>
      <div class="card-body">
        <br/>
         <div class="input-group">
                    


                        <?php 

                            $results_per_page = 4;

                            // find out the number of results stored in database
                            $sql='SELECT * FROM users';
                            $result = mysqli_query($connection, $sql);
                            $number_of_results = mysqli_num_rows($result);

                            // determine number of total pages available
                            $number_of_pages = ceil($number_of_results/$results_per_page);

                            // determine which page number visitor is currently on
                            if (!isset($_GET['page'])) {
                              $page = 1;
                            } else {
                              $page = $_GET['page'];
                            }

                            // determine the sql LIMIT starting number for the results on the displaying page
                            $this_page_first_result = ($page-1)*$results_per_page;

                            // retrieve selected results from database and display them on page
                            $sql='SELECT * FROM users LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                            $result = mysqli_query($connection, $sql);

                        ?>





<div class="table-responsive">
  <table class="table text-nowrap mb-0" id="table-data">
    <thead>
      <tr>
        <th scope="col">Acc.Name</th>
        <th scope="col">Acc.Status</th>
        <th scope="col">Acc.No</th>
        <th scope="col">Username</th>
        <th scope="col">Business</th>
        <th scope="col">Personal</th>
        <th scope="col">Uploads</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Message</th>
        <th scope="col">Alert</th>
      </tr>
    </thead>
<tbody>
  <?php 

      while($row = mysqli_fetch_array($result)) {
  
?>
                                   
  <tr>
          
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
            <td><?php echo $row['username']; ?></td>
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
            <td>
              <div class="position-relative ">
                  <form action="credit_user" method="post">
                      <input type="hidden" name="credit_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="credit_btn" class=" btn btn-warning">
                            <i class="bi-bell icon-text"></i>
                        </button>
                </form>
            </td>
        </tr>
      <?php 

          }
                           
      ?>
    </tbody>                          
  </table>
<div class="card-footer d-block d-md-flex align-items-center d-print-none">
                            <div class="d-flex mb-2 mb-md-0">Showing 1 to 4 Entries Per Page</div></div>

                    <?php 
                        // display the links to the page
                           for ($page=1;$page<=$number_of_pages;$page++) 
                           {
                            echo '<a <button class="btn btn-outline-primary" href="users.php?page=' . $page . '">' . $page . ' </button></a>';
                           }
                    ?>

                    </div>
              </div>
          </div>
    


<?php include('includes/footer.php'); ?>
