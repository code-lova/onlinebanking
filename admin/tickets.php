<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Customers Ticket Area
      </div>
      <div class="card-body">
        <h5 class="card-title">Ticket Request from Customers </h5>


        <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
            <thead>
        <tr>
              <th scope="col">From</th>
              <th scope="col">Message</th>
              <th scope="col">Files</th>
              <th scope="col">Ticket Status</th>
              <th scope="col">Read</th>
              <th scope="col">Delete</th>
              <th scope="col">Reply</th>
             
        </tr>
        </thead>  
        <tbody>
          <?php
            $i=0;
            $array = $connection->query("select * from users,ticket where ticket.user_id = users.id order by date desc");
              if ($array->num_rows > 0)
              {
                while ($row = $array->fetch_assoc())
              {
            ?>
          <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                  <a href="download.php?attachment=<?php echo $row['attachment']; ?>"><?php echo $row['attachment']; ?>
                </td>
                <td>
                  <?php
                                             
                    if ($row['status']==1) 
                    {
                      echo "<b><p class ='text-success'>Read</p></b>";
                    }else
                    {
                      echo "<b><p class ='text-danger'>Unread</p></b>";
                    }

                  ?>
                </td>
                <td>
                  <?php 
                    $status = $row['status'];
                    if($status==0) $strStatus="<a class='btn btn-outline-warning' href=read.php?id=".$row['ticket_id'].">Read</a></button>";
                    if($status==1) $strStatus="<a class='btn btn-outline-danger' href=unread.php?id=".$row['ticket_id'].">Unread </a></button>";
                    echo "<b>".$strStatus."";

                  ?>
                </td>
                <td> 
                  <div class="position-relative ">
                        <form action="control_script.php" method="post">
                          <input type="hidden" name="delete_ticket_id" value="<?php echo $row['ticket_id']; ?>">
                            <button type="submit" name="delete_ticket_btn" class="btn btn-outline-danger">
                              <i class="bi-trash icon-text"></i>
                            </button>
                      </form>
                  </div>
              </td>
                <td>
                  <div class="position-relative ">
                      <form action="notice" method="post">
                          <input type="hidden" name="notice_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="notice_btn" class=" btn btn-outline-success">
                                <i class="bi-chat icon-text"></i>
                            </button>
                      </form>
                </td>
            </tr>

            <?php
                    }
                  }
                  else
                {
              ?>
              <tr>
                <td colspan="5">You Have No Tickets Yet.</td>
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
