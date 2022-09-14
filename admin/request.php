<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
       Customers Contact Area
      </div>
      <div class="card-body">
        <h5 class="card-title">Request/Contact From Customers</h5>

                    <?php
                         $query="SELECT * FROM contact ORDER BY created DESC";
                         $result= $connection->query($query)
                    ?>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
            <thead>
        <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
              <th scope="col">Mobile</th>
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
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['created']; ?></td>
                <td>
                   <div class="position-relative ">
                      <form action="control_script.php" method="post">
                        <input type="hidden" name="delconmsg_id" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="delconmsg_btn" class=" btn btn-danger">
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


