<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Crypto Debit Transactions
      </div>
      <div class="card-body">
        <h5 class="card-title">Customer Crypto Transactions </h5>

        <?php 
                $query = "SELECT * FROM crypto_debits ORDER BY id DESC";
                $result = $connection->query($query);

            ?>

        <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
            <thead>
        <thead>
        <tr>
              <th scope="col">Made By</th>
              <th scope="col">Transaction ID</th>
              <th scope="col">Wallet Address</th>
              <th scope="col">Amount</th>
              <th scope="col">Current Status</th>
              <th scope="col">Date</th>
              <th scope="col">Change Status</th>
              <th scope="col">Actions</th>
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
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['transaction_id']; ?></td>
                <td><?php echo $row['to_address']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php if ($row['confirmations']==0) 
                  {
                    echo "<b class ='text-warning'>0 Confirmation</b>";
                  }else if($row['confirmations']==1)
                  {
                    echo "<b class ='text-info'>1 Confirmations</b>";
                  }elseif ($row['confirmations']==2)
                  {
                   echo "<b class ='text-primary'>2 Confirmations</b>";
                  }elseif ($row['confirmations']==3)
                  {
                   echo "<b class ='text-success'>3 Confirmations</b>";
                  }elseif ($row['confirmations']==4)
                  {
                   echo "<b class ='text-danger'>Expired</b>";
                  }
                 ?></td>
                <td><?php echo $row['created']; ?></td>
                <td>
              <div class="position-relative ">
                  <form action="update_confirmation.php" method="post">
                    <input type="hidden" name="updatebtc_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="updatebtc_btn" class=" btn btn-success"><i class="icofont icofont-file"></i>Update Status
                      </button>
                    </form>
                  </div>
                </td>
              <td>
                <div class="position-relative ">
                  <form action="control_script.php" method="post">
                    <input type="hidden" name="del_confirmation_id"  value="<?php echo $row['id']; ?>">
                      <button type="submit" name="del_confirmation_btn" class="btn btn-danger">
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









<?php include('includes/footer.php'); ?>
