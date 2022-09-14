<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Activate/Deactivate Customer KYC 
      </div>
      <div class="card-body">

                      <?php 

                            $results_per_page = 4;

                            // find out the number of results stored in database
                            $sql='SELECT * FROM kycdoc';
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
                            $sql='SELECT * FROM users,kycdoc WHERE users.id=kycdoc.user_id LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                            $result = mysqli_query($connection, $sql);



                        ?>
        
      <div class="table-responsive">
            <table class="table text-nowrap mb-0" id="table-data">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Account Name</th>
            <th scope="col">KYC Doc</th>
            <th scope="col">KYC Status</th>
            <th scope="col">Uploads</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>
                          <?php 

                                if (mysqli_num_rows($result) > 0) 
                                {
                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {
                            ?>
                <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td>
                        <a href="downloadkyc.php?identity_doc=<?php echo $row['identity_doc']; ?>"><?php echo $row['identity_doc']; ?></a>
                      </td>
                      <td>
                        <?php
                                             
                          if ($row['status']==1) 
                          {
                            echo "<b><p class ='text-success'>VERIFIED</p></b>";
                          }else
                          {
                            echo "<b><p class ='text-danger'>NOT VERIFIED</p></b>";
                          }
                        ?>
                      </td>

                      <td>
                        <?php echo'<img src="../uploads/'.$row['user_image'].'" 
                       width="50px;" height="50px;" alt="image" class="rounded-circle">'?>
                    </td>

                      <td>
                        <?php 
                                $status = $row['status'];
                                if($status==0) $strStatus="<a class='btn btn-outline-success' href=kycactivate.php?id=".$row['id'].">Verify</a></button>";
                                if($status==1) $strStatus="<a class='btn btn-outline-danger' href=kycdeactivator.php?id=".$row['id'].">Unverify </a></button>";
                                echo "<b>".$strStatus."";

                        ?>    
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

              ?>
          </tbody>                   
        </table>
        <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                <div class="d-flex mb-2 mb-md-0">Showing 1 to 4 Entries Per Page </div>

                    <?php 
                        // display the links to the page
                           for ($page=1;$page<=$number_of_pages;$page++) 
                           {
                            echo '<a <button class="btn btn-outline-primary" href="kyc.php?page=' . $page . '">' . $page . ' </button></a>';
                           }
                    ?>
                           
          </div>
      </div>
    </div>
  </div>











<?php include('includes/footer.php'); ?>
