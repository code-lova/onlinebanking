<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        Update BTC Confirmation Transaction. 
      </div>
      <div class="card-body">
       
        <?php  
                    if (isset($_POST['updatebtc_btn'])) 
                      {
                        $id = $_POST['updatebtc_id'];

                        $query = "SELECT * FROM crypto_debits WHERE id='$id' ";
                        $result = $connection->query($query);

                        foreach ($result as $row) 
                        {
                
                   ?> 

        <p>Update Confirmation for Crypto-Transaction.<b> <?php echo $row['transaction_id'];  ?></b>.<p> Sender: <b><?php echo $row['user_id'];  ?></b></p> <p>Current Transaction Status: <?php if ($row['confirmations']==0) 
                                                                 {
                                                                    echo "<b class ='text-warning'>0 Confirmation</b>";
                                                                 }else if($row['confirmations']==1)
                                                                 {
                                                                    echo "<b class ='text-info'>1 Confirmations</b>";
                                                                 }elseif ($row['confirmations']==2)
                                                                 {
                                                                   echo "<b class ='text-primary'>2 Confirmations</b>";
                                                                 }elseif ($row['confirmations']==3)
                                                                 {
                                                                    echo "<b class ='text-success'>3 Confirmations</b>";
                                                                 }elseif ($row['confirmations']==4)
                                                                 {
                                                                    echo "<b class ='text-danger'>Expired</b>";
                                                                 }


                                                                 ?>
                                                                  
                                                                 </p></p>
                                                    
                                                            <hr>
                                                            <form action="control_script.php" method="post">
                                                            
                                                               <input type="hidden" name="updatebtc_id" value="<?php echo $row['id']; ?>">
                                                                                
                                                                      <div class="col">
                                                                            <label class="col-sm-2 col-form-label">Update Confirmations</label>
                                                                            <div class="col-sm-10">
                                                                      <select name="edit_confirmation" class="form-select">
                                                                            <option value="0">0 Confirmation</option>
                                                                            <option value="1">1 Confirmations </option>
                                                                            <option value="2">2 Confirmations</option>
                                                                            <option value="3">3 Confirmations</option>
                                                                            <option value="4">Expired</option>
                                                                        </select>
                                                                            </div>
                                                                            </div>
                                                                             <hr>
                                          <a href="wallet"type="submit" class="btn btn-danger">Cancel</a>

                                            <button style="float: right;" type="submit" name="updateconfirm_btn" class="btn btn-success float-right">Update Confirmation
                                            </button>
                                        </div>
                                  </form>
                                <?php 
                                }
                              }
                          ?>
                      </div>
                </div>
                                 
</div>
</div>


<?php include('includes/footer.php'); ?>