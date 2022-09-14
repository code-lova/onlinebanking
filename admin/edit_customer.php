<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Update Customer Banking Profile
      </div>
      <div class="card-body">
        <h5 class="card-title">Edit/Update Customer Banking Profile </h5>
            <?php  
                    if (isset($_POST['edit_btn'])) 
            {
              $id = $_POST['edit_id'];

              $query = "SELECT * FROM users WHERE id='$id' ";
              $result = $connection->query($query);

              foreach ($result as $row) 
              {
                
          ?>

         <form action="control_script.php" method="post" class="row g-3 needs-validation" >
                              <div class="col-md-4">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="edit_username" value="<?php echo $row['username']; ?>" >
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label for="" class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="edit_name">
                              </div>
                               <div class="col-md-4">
                                <label for="date of birth" class="form-label">Date of Birth</label>
                                <input type="text" class="form-control"  name="edit_dob" value="<?php echo $row['dob']; ?>">
                              </div>
                               <div class="col-md-4">
                                <label for="" class="form-label">Mobile .No</label>
                                <input type="text" class="form-control" value="<?php echo $row['mobile']; ?>" name="edit_mobile">
                              </div>
                              <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                  <span class="input-group-text" id="email">@</span>
                                  <input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="edit_email" >
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="edit_address" value="<?php echo $row['address']; ?>">
                              </div>
                              
                              <div class="col-md-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="edit_country" class="form-control" value="<?php echo $row['country']; ?>">
                              </div>
                              <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" name="edit_zip" value="<?php echo $row['zip']; ?>">
                              </div>
                              <div class="col-md-3">
                                <label for="savings_balance" class="form-label">Saving Account Balance</label>
                                <input type="text" class="form-control" name="edit_savings_balance" value="<?php echo $row['savings_balance']; ?>">
                              </div>
                              <div class="col-md-3">
                                <label for="checking_balance" class="form-label">Checking Account Balance</label>
                                <input type="text" class="form-control" name="edit_checking_balance" value="<?php echo $row['checking_balance']; ?>">
                              </div>
                              
                              <div class="col-md-3">
                                <label for="image" class="form-label">Created</label>
                                <input type="text" class="form-control" name="edit_created" value="<?php echo $row['created']; ?>">
                              </div>

                              <div class="col-md-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" name="edit_gender" class="form-control" value="<?php echo $row['gender']; ?>">
                              </div>

                               <div class="col-md-3">
                                <label for="gender" class="form-label">Marital Status</label>
                                <input type="text" name="edit_marital_status" class="form-control" value="<?php echo $row['marital_status']; ?>">
                              </div>

                              <div class="col-md-3">
                                <label for="acc_type" class="form-label">Account Type</label>
                                <input type="text" name="edit_acc_type" class="form-control" value="<?php echo $row['acc_type']; ?>">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="form-label">Account Pin</label>
                                <input type="text" class="form-control" name="edit_acc_pin" value="<?php echo $row['acc_pin']; ?>">
                              </div>
                              <div class="col-md-3">
                                <label for="otp" class="form-label">Customer OTP</label>
                                <input type="text" readonly class="form-control" name="edit_otp" value="<?php echo $row['otp']; ?>">
                              </div>

                              
                              <div class="col-12">
                                <a href="customers" class="btn btn-outline-danger">Cancel</a>

                                <button style="float: right;" class="btn btn-outline-success" name="updatebtn" type="submit">Update data</button>
                              </div>
                            </form>
                            <?php 

                            }

                          }
                        ?>
                      
                      </div>
                </div>










<?php include('includes/footer.php'); ?>
