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
        IMF Transaction Codes
      </div>
      <div class="card-body">
        <h5 class="card-title">IMF Codes </h5>

                       <?php 

                           $query = "SELECT * FROM payment1";
                           $result = $connection->query($query);
                      ?>

    <div class="table-responsive">
        <table class="table text-nowrap mb-0" id="table-data">
          <thead>
            <tr>
              <th scope="col">#NO.</th>
              <th scope="col">IMF</th>
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
                  <td><?php echo $row['imf']; ?></td>
                  <td>
                    <form action="auth.php" method="post">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_imf" class=" btn btn-danger ">
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
 
  
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">Generate IMF</button>
 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelOne" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelOne">New IMF CODE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <form action="auth.php" method="post" name="pingenerate">
          <div class="mb-3">
            <label for="pin" class="col-form-label">I.M.F. Code</label>
            <input type="text" class="form-control" id="pin" name="imf" placeholder="Generate IMF">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick="populateform(this.form.thelength.value)">Generate</button>
        <input type="text" class="form-control col-md-3" name="thelength" size=3 value="5" hidden="">

        <button type="submit"  name="imf_btn" class="btn btn-success" >Save</button>
        
      </div>
    </div>
  </div>
</div> 
</form>

</div>
</div>


<br/>
<br/>
<br/>








<?php include('includes/footer.php'); ?>
