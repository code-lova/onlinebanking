<?php
include('database_connect.php');

include('includes/header.php'); 
?>

<?php include('includes/navbarheader.php'); ?>




<div class="content-wrapper">

<div class="breadcrumb-wrap bg-spring">
<img src="assets/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
<img src="assets/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
<img src="assets/img/breadcrumb/br-shape-3.png" alt="Image" class="br-shape-three moveHorizontal sm-none">
<img src="assets/img/breadcrumb/br-shape-4.png" alt="Image" class="br-shape-four moveVertical sm-none">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-7 col-md-8 col-sm-8">
<div class="breadcrumb-title">
<h2>Verify Account</h2>
<ul class="breadcrumb-menu list-style">
<li><a href="index">Home </a></li>
 <li>Verify</li>
</ul>
</div>
</div>
<div class="col-lg-5 col-md-4 col-sm-4 xs-none">
<div class="breadcrumb-img">
<img src="assets/img/breadcrumb/br-shape-5.png" alt="Image" class="br-shape-five animationFramesTwo">
<img src="assets/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
<img src="assets/img/breadcrumb/breadcrumb-2.png" alt="Image">
</div>
</div>
</div>
</div>
</div>


<section class="Login-wrap ptb-100">
<div class="container">
<div class="row">
<div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
<div class="login-form-wrap">
<div class="login-header">
<h3>Almost There..!!</h3>
<p>Please check your email address for account details and OTP verification code.</p>
</div>
							<?php
                                    if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                                            {
                                                echo '<div class="alert alert-danger 
                                                <i class="icon-bell text-danger"></i>
                                                    ' .$_SESSION['status'].'</div>';
                                                unset($_SESSION['status']);
                                            }

                                ?>
<div class="login-form">
<div class="login-body">
<form class="form-wrap" action="vcode_script.php" method="post">
<div class="row">
<div class="col-lg-12">
<div class="form-group">
<input id="text" name="vcode" type="number" placeholder="Enter verification code here..!!" required>
</div>
</div>

<div class="col-lg-12">
<div class="form-group">
<button type="submit" name="vcode_btn" class="btn style1">Verify</button>
</div>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

</div>



<?php include('includes/footer.php'); ?>