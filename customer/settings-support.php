<?php include('includes/header.php'); ?>


    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar">

                           <?php include('includes/mobilelogo.php'); ?>

                           <?php include('includes/profilenav.php'); ?>

                           <?php include('includes/sidebar.php'); ?>

                           <?php include('includes/sidebarfooter.php'); ?>



        <?php include('includes/greetings.php'); ?>


 <div class="content-body">
            <div class="container">
                            <?php

                                  if (isset($_SESSION['success']) && $_SESSION['success'] !='') 
                                            {
                                                echo '<div class="alert alert-success 
                                                <i class="icon-bell text-success"></i>
                                                    ' .$_SESSION['success'].'</div>';
                                                unset($_SESSION['success']);
                                            }

                                    if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                                            {
                                                echo '<div class="alert alert-danger 
                                                <i class="icon-bell text-danger"></i>
                                                    ' .$_SESSION['status'].'</div>';
                                                unset($_SESSION['status']);
                                            }

                                ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Customer Support 24/7</h4>
                                <p>Open a Ticket for Request</p>
                            </div>
                            <?php 

                           $query = "SELECT * FROM ticket WHERE user_id ='".$_SESSION['id']."' order by date desc ";
                           $result = $connection->query($query);

                        ?>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-sm">
                                            <?php 

                                                if (mysqli_num_rows($result) > 0) 
                                                {
                                                    while ($row = mysqli_fetch_assoc($result)) 
                                                {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    
                                                    <td>
                                                        <span class="badge bg-danger"><?php echo $row['subject']; ?></span>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['message']; ?> 

                                                    </td>
                                                    <td>
                                                        <?php  
                                                        if ($row['status']==1) 
                                                        {
                                                          echo "<b class ='text-success'>Message Replied, check Messages </b>";
                                                        }else
                                                        {
                                                          echo "<b class ='text-danger'>Not Yet Replied</b>";
                                                        }
                                                      ?>
                                                    </td>
                                                    <td class="text-primary"><?php echo $row['date']; ?></td>
                                                    
                                                </tr>
                                                 <?php 
                                                      }
                                                    }
                                                    else
                                                    {
                                                  ?>
                                                <tr>
                                                    <td colspan="5">You have not open any ticket yet</td>
                                                </tr>
                                                <?php             
                                                    }
                                                  ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>

                                <form action="tscript.php" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                          <label for="attachment">Attach a File. <span><i class="ri-file-line"></i></span></label><p> Only PNG, JPG, and JPEG images are allowed.</p>
                                          <p>
                                          <input type="file" value="" class="form-control-file" name="attachment" placeholder="">
                                        </div>
                                          <input type="hidden" name="subject" value="">
                                        <input type="hidden" name="subject_id" value="2">
                                      <br/>
                                      <textarea name="reply_message" required placeholder="send a reply" rows="4" cols="25"></textarea>

                                      <br/>
                                  <button type="submit" name="send_btn" class="btn btn-primary m-2" >Reply</button>
                                </form>

                            <hr>
                            <center>
                <div class="row">
                    <div class="col-6">
                        <form action="tscript.php" method="post" >
                            <input type="hidden" name="delete_user_id" value="<?php echo $_SESSION['id'] ?>">
                        <button type="submit" name="delete_ticket" class="btn btn-lg btn-danger btn-block">Close Ticket</button>
                    </form>
                    </div>

                    <div class="col-6">
                        <a href="open_ticket" type="button" class="btn btn-lg btn-secondary btn-block float-right" >Open Ticket</a>
                    </div>
                </div>
            </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



</div>


 <?php include('includes/otherpagefooter.php'); ?>