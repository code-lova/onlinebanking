<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<script src="pingenerator.js"></script>

<br/>
<br/>
<div class="card">
      <div class="card-header">
        IPN Transaction Codes
      </div>
      <div class="card-body">
        <h5 class="card-title">IPN Codes </h5>

                     <?php 
                           $query = "SELECT * FROM payment2";
                           $result = $connection->query($query);
                     ?>

      <div class="table-responsive">
          <table class="table text-nowrap mb-0" id="table-data">
            <thead>
            <tr>
              <th scope="col">#NO.</th>
              <th scope="col">ipn</th>
              <th scope="col">Actions</th>
            </tr>
            </thead>

            <tbody>
              <?php 

                        if (mysqli_num_rows($result) > 0) 
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                        {
                    ?>
              <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['ipn']; ?></td>
                  <td>
                    <form action="auth.php" method="post">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_ipn" class=" btn btn-danger ">
                                <i class="bi-trash icon-text"></i>
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
              <td colspan="5">NO Records Found</td>
          </tr>
          <?php
            }

        ?>   
      </tbody>                     
    </table>
  </div>

<br/>
<br/>
 
  
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">Generate IPN</button>
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelOne" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelOne">New IPN CODE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="auth.php" method="post" name="pingenerate">
          <div class="mb-3">
            <label for="pin" class="col-form-label">I.P.N Code</label>
            <input type="text" class="form-control" id="pin" name="ipn" placeholder="Generate ipn">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick="populateform(this.form.thelength.value)">Generate</button>
        <input type="text" class="form-control col-md-3" name="thelength" size=3 value="5" hidden="">

        <button type="submit"  name="ipn_btn" class="btn btn-success" >Save</button>
        
      </div>
    </div>
  </div>
</div> 
</form>

</div>
</div>











<?php include('includes/footer.php'); ?>
