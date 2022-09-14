<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Edit Debit Transactions
      </div>
      <div class="card-body">
        

         <?php  
                    if (isset($_POST['edit_debit_btn'])) 
						{
							$id = $_POST['edit_debit_id'];

							$query = "SELECT * FROM debits WHERE id='$id' ";
							$result = $connection->query($query);

							foreach ($result as $row) 
							{
								
					?>

                    <!-- Form -->
                    <form action="control_script.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">

                            	<input type="hidden" name="edit_debit_id" value="<?php echo $row['id']; ?>">

                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Account Name</label>
                                    <input type="text" class="form-control" value="<?php echo $row['acc_name']; ?>" id="name" name="edit_acc_name" >
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Bank Name</label>
                                    <input type="text" class="form-control" value="<?php echo $row['bank_name']; ?>" id="name" name="edit_bank_name">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">Bank Address</label>
                                    <input type="text" class="form-control" value="<?php echo $row['bank_addrs']; ?>" id="address" name="edit_bank_addrs">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">Swift</label>
                                    <input type="text" class="form-control" value="<?php echo $row['swift']; ?>" id="swift" name="edit_swift" >
                                </div>
                                 <div class="form-group col-12 col-md-6">
                                    <label for="email">Account No.</label>
                                    <input type="text" class="form-control" value="<?php echo $row['account_no']; ?>" id="accountno" name="edit_account_no">
                                </div>
                                 <div class="form-group col-12 col-md-6">
                                    <label for="email">Amount</label>
                                    <input type="text" class="form-control" value="<?php echo $row['amount']; ?>" id="amount" name="edit_amount" >
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="edit_email" >
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">Transaction Type</label>
                                    <input type="text" class="form-control" value="<?php echo $row['trac_type']; ?>" id="trac_type" name="edit_trac_type" >
                                </div>
                                 <div class="form-group col-12 col-md-6">
                                    <label for="email">Reference</label>
                                    <input type="text" class="form-control" value="<?php echo $row['reference']; ?>" id="reference" name="edit_reference" >
                                </div>
                                 <div class="form-group col-12 col-md-6">
                                    <label for="email">Status</label>
                                    <input type="text" class="form-control" disabled value="<?php
                                             
                                             if ($row['status']==1) 
                                             {
                                                echo "Completed";
                                             }else
                                             {
                                                echo "Pending";
                                             }
                                             ?>" id="status" name="edit_status">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label for="email">Date</label>
                                    <input type="text" class="form-control" value="<?php echo $row['created']; ?>" id="created" name="edit_created">
                                </div>
                                 
                                </div>
                               <br/>
                            
               
                         <a href="debits" class="btn btn-outline-danger float-right">Cancel</a> 
                           <button style="float: right;" type="submit" name="update_debit_btn" class="btn btn-outline-success float-right">Update</button>
                        </form>
                    <!-- End Form -->

                    		<?php 

							}

						}
					?>







</div>
</div>




<?php include('includes/footer.php'); ?>
