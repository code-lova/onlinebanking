<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Completed Transactions 
      </div>
      <div class="card-body">

                        <?php 

                           $query = "SELECT * FROM debits WHERE status ='1' ORDER BY id DESC";
                           $result = $connection->query($query);

                         ?>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
            <thead>
        <thead>
        <tr>
              <th scope="col">#Ref No.</th>
              <th scope="col">Done By</th>
              <th scope="col">Account Name</th>
              <th scope="col">Bank Name</th>
              <th scope="col">Amount</th>
              <th scope="col">Current Status</th>
              <th scope="col">Date</th>
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
                <td>#<?php echo $row['reference']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['acc_name']; ?></td>
                <td><?php echo $row['bank_name']; ?></td>
                <td>$<?php echo $row['amount']; ?></td>
                <td>
                  <?php if ($row['status']==1) 
                    {
                      echo "<b><p class ='badge rounded-pill bg-success'>Transfer Completed</p></b>";
                    }
                  ?>     
              </td>
                <td><?php echo $row['created']; ?></td>
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
        </div>
      </div>
    </div>


<br/>
<br/>
<br/>








<?php include('includes/footer.php'); ?>
