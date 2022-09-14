<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
       Customers Loan Request Area
      </div>
      <div class="card-body">
        <h5 class="card-title">Loan Request From Customers</h5>

                    <?php
                         $query="SELECT * FROM loan ORDER BY created DESC";
                         $result= $connection->query($query)
                    ?>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
            <thead>
        <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">Gender</th>
              <th scope="col">Marital Status</th>
              <th scope="col">Purpose of Loan</th>
              <th scope="col">Loan Amount</th>
              <th scope="col">Loan Term</th>
              <th scope="col">Country</th>
              <th scope="col">Date</th>
              <th scope="col">Delete</th>
              
        </tr>
        </thead>  
        <tbody>
          <?php
               if (mysqli_num_rows($result) > 0) 
                {
              while ($row = mysqli_fetch_array($result))
            {
          ?>
           <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['marital_status']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['term']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td><?php echo $row['created']; ?></td>
                <td>
                   <div class="position-relative ">
                      <form action="control_script.php" method="post">
                        <input type="hidden" name="dellonemsg_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="dellonemsg_btn" class=" btn btn-danger">
                            <i class="bi-trash icon-text"></i>
                          </button>
                      </form>
                  </div>
                </td>
            </tr>
              <?php
                  }
                
                }
                else
                {
              ?>
              <tr>
                <td colspan="5">You Have No Messages Yet.</td>
              </tr>
              <?php
                }    
              ?>                         
        </table>
        </div>
      </div>
    </div>



<br/>








<?php include('includes/footer.php'); ?>


