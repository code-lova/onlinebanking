<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Your Sent Messasges
      </div>
      <div class="card-body">
        <h5 class="card-title">Sent Messages  </h5>


        <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
            <thead>
        <tr>
              <th scope="col">To</th>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
              <th scope="col">Bank Department</th>
              <th scope="col">Actions</th>
              
        </tr>
        </thead>  
        <tbody>
          <?php
              $i=0;
              $array = $connection->query("select * from message,users where users.id = message.user_id order by date desc");
              if ($array->num_rows > 0)
              {
                while ($row = $array->fetch_assoc())
              {
            ?>
          <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php  echo $row['department']?></td>
                <td>
                  <div class="position-relative ">
                        <form action="control_script.php" method="post">
                            <input type="hidden" name="del_mesg_id" value="<?php echo $row['message_id']; ?>">
                                <button type="submit" name="del_mesg_btn"  class="btn btn-outline-danger">
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
                <td colspan="5">You Have Not Sent Any Message Yet.</td>
              </tr>
              <?php
                }    
              ?>                          
        </table>
        </div>
      </div>
    </div>

<br/>
<br/>









<?php include('includes/footer.php'); ?>
