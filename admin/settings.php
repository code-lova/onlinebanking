<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
       Admin Profile
      </div>
      <div class="card-body">
        <h3 class="card-title">Update Admin Profile </h3>

        <?php 
            $query = "SELECT * FROM admin";
            $result = $connection->query($query);
       ?>

        <form class="row g-3 needs-validation" >
          <?php 

              if (mysqli_num_rows($result) > 0) 
            {
               while ($row = mysqli_fetch_assoc($result)) 
            {
        ?>
                              <div class="col-md-6">
                                <label for="firstname" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" disabled>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                  <span class="input-group-text" id="username">@</span>
                                  <input type="text" class="form-control" id="" value="<?php echo $row['email']; ?>" name="username" disabled>
                                </div>
                              </div>
                            <?php 

                                   }
                                }

                                else
                                  {
                                    echo "No Record Found";
                                  }

                              ?>
                             </form> 

                              <form action="admin_login.php" method="post" class="row g-3 needs-validation">
                              <div class="col-md-6">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" value="" name="password" required>
                              </div>
                               <div class="col-md-6">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword"  name="cpassword" value="" required>
                              </div>
                              <div class="col-12">
                                <button class="btn btn-outline-success" name="updateadmin_btn" type="submit">Udate Admin</button>
                              </div>
                            </form>
        
                      </div>
                </div>
                











<?php include('includes/footer.php'); ?>
