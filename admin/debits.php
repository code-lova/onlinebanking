<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Debit Transactions
      </div>
      <div class="card-body">

            <?php 
                $query = "SELECT * FROM debits ORDER BY id DESC";
                $result = $connection->query($query);

            ?>
        
        <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
        <thead>
        <tr>
              
              <th scope="col">#Ref No.</th>
              <th scope="col">Done By</th>
              <th scope="col">Account Name</th>
              <th scope="col">Bank Name</th>
              <th scope="col">Amount</th>
              <th scope="col">Email</th>
              <th scope="col">Account Type</th>
              <th scope="col">Current Status</th>
              <th scope="col">Change Status</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
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
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['account_type']; ?></td>
                <td>
                  <?php if ($row['status']==0) 
                  {
                    echo "<b><p class ='badge rounded-pill bg-warning'>Pending</p></b>";
                  }else if ($row['status']==1)
                  {
                    echo "<b><p class ='badge rounded-pill bg-success'>Complete</p></b>";
                  }
                  else if ($row['status']==2)
                  {
                    echo "<b><p class ='badge rounded-pill bg-danger'>Cancelled</p></b>";
                  } 
                ?>
                </td>
                <td>
                  <?php 
                    $status = $row['status'];
                    if($status==1) $strStatus="<a class='btn btn-outline-danger' href=fulfilled.php?id=".$row['id'].">Reverse</a></button>";
                    if($status==0) $strStatus="<a class='btn btn-outline-danger' href=fulfilled.php?id=".$row['id'].">Cancel</a></button>";
                    if($status==2) $strStatus="<a class='btn btn-outline-warning' href=processing.php?id=".$row['id'].">Pendnig</a></button>";
                  echo "<b>".$strStatus."";
                ?>
                </td>

              <td>
                  <div class="position-relative ">
                      <form action="edit_debit.php" method="post">
                        <input type="hidden" name="edit_debit_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="edit_debit_btn" class=" btn btn-primary ">
                              <i class="bi-pencil icon-text"></i>
                          </button>
                      </form>
                </div>
              </td>

            <td>
                <div class="position-relative ">
                  <form action="control_script.php" method="post">
                    <input type="hidden" name="del_debit_id"  value="<?php echo $row['id']; ?>">
                      <button type="submit" name="del_debit_btn" class="btn btn-danger">
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
<br/>








<?php include('includes/footer.php'); ?>
