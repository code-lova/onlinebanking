<?php 

include('includes/header.php');
include('includes/sidebar.php'); 
include('includes/navbar.php'); 

?>

<br/>
<br/>
<div class="card">
      <div class="card-header">
       Contact US
      </div>
      <div class="card-body">
        <strong><h3 class="card-title">We can help you Manage your Projects</h3></strong>

<p>
We are programmers who specializes in, or is specifically engaged in, the development of World Wide Web applications using a client–server model. 
</p>
<p>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">Click to send a message</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelOne" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelOne">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email Address:</label>
            <input type="email" class="form-control" id="email" name="email" required="" placeholder="Enter your email">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="text_area" name="text_area" required="" placeholder="We reply as soon as possible.."></textarea>
          </div>
        <div class="modal-footer">
      	<button type="submit" name="contact_btn" class="btn btn-primary">Send message</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div> 
</p>

   </div> 
</div>










<?php include('includes/footer.php'); ?>
