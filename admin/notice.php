<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Add new Customer Profile
      </div>
      <div class="card-body">
         <?php  
                    if (isset($_POST['notice_btn'])) 
                      {
                        $id = $_POST['notice_id'];

                        $query = "SELECT * FROM users WHERE id='$id' ";
                        $result = $connection->query($query);

                        foreach ($result as $row) 
                        {
                
                   ?>
        <h5 class="card-title">Send a Notice to <?php echo $row['name'];  ?> </h5>
        
          

      <form action="control_script.php" method="post">
                  <input type="hidden" name="notice_id" value="<?php echo $row['id']; ?>">
                    
                  <div class="form-group">
                      <label for="subject">Subject</label>
                      <input type="text" class="form-control" name="subject" id="" placeholder="Enter the subject of the message">
                    </div>
                    <p></p>
                <div class="form-group"> 
                <label>Bank Department</label>
                <select class="form-select" id="department" name="department" required>
                    <option>Select Department</option>
                    <option value="Account Manager">Account Manager</option>
                    <option value="Customer Care">Customer Care</option>
                    <option value="Bank Manager">Bank Manager</option>
                </select>
              </div>
                <p></p>
                  <div class="form-group">
                      <label for="comment">Message</label>
                      <textarea class="form-control" required name="message" id="" rows="3" placeholder="Enter your message..."></textarea>
                  </div>
                  <p></p>
                 <a href="customers" class="btn btn-outline-danger">Cancel</a>

                    <button style="float: right;" type="submit" name="sendmsg_btn" class="btn btn-outline-primary float-right">Send Message 
                      <i class="bi-chat icon-text"></i>
                    </button>

                  </form>

              <?php 

              }

            }
          ?>
                      </div>
                </div>











<?php include('includes/footer.php'); ?>
