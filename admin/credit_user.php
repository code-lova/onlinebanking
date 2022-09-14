<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Credit This User
      </div>
      <div class="card-body">
         <?php  
                    if (isset($_POST['credit_btn'])) 
                      {
                        $id = $_POST['credit_id'];

                        $query = "SELECT * FROM users WHERE id='$id' ";
                        $result = $connection->query($query);

                        foreach ($result as $row) 
                        {
                
                   ?>
        <h5 class="card-title">Customer Name: <?php echo $row['name'];  ?> </h5>
        <h5 class="card-title">Customer Acc NO: <?php echo $row['account_no'];  ?> </h5>
       
        
          

      <form method="post" action="credit_script.php" name="myform" class="personal_validate">
        <input type="hidden" name="credit_id" value="<?php echo $row['id']; ?>">
                                            <div class="row">
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Account Name</label>
                                                    <input type="text" class="form-control" name="acc_name" id="acc_name" placeholder="Enter Senders Acc Name" required>
                                                </div>
                                                
                                                <input type="hidden" name="email" value="<?php echo $row['email'];?>">

                                                <input type="hidden" name="user_id" value="<?php echo $row['name'];?>">

                                                 <input type="hidden" name="checking"  value="Offshore_Business">

                                                <input type="hidden" name="trac_type" class="form-control" value="Credit">

                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Account No.</label>
                                                    <input type="number" class="form-control" maxlength="12" name="account_no" id="account_no" placeholder="Enter senders Account No" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Bank Name</label>
                                                     <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter senders Bank Name" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Bank Address</label>
                                                    <input type="text" class="form-control" name="bank_addrs" id="bank_addrs" placeholder="Enter senders Bank Address" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Swift Code</label>
                                                      <input type="text" class="form-control" name="swift" id="swift" placeholder="Enter senders Swift Code" required>
                                                </div>
                                                <div class="mb-3 col-xl-6">
                                                    <label class="me-sm-2">Amount</label>
                                                    <input type="number" id="amount" class="form-control" name="amount" placeholder="Enter Amount to send" required>
                                                    
                                                </div>
                                                 <p></p>
                                                <div class="btn-group mb-3">
                                                    <a type="button" href="customers" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" name="transfer_btn" class="btn btn-success">Proceed</button>
                                                </div>
                                            </div>
                                        </form>
                                      <?php 

                                      }

                                    }
                                  ?>
                      </div>
                </div>











<?php include('includes/footer.php'); ?>
