<?php  session_start();   ?>

<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from codescandy.com/dashui/pages/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 21:21:49 GMT -->
<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">

<!-- Libs CSS -->

<link rel="stylesheet" href="assets/libs/prismjs/themes/prism.css">
<link rel="stylesheet" href="assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.css">
<link rel="stylesheet" href="assets/libs/prismjs/plugins/toolbar/prism-toolbar.css">
<link rel="stylesheet" href="assets/libs/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="assets/libs/dropzone/dist/dropzone.css" >
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />

<link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">






<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
    <title>Sign Up | Dash Ui - Bootstrap 5 Admin Dashboard Template</title>
  </head>

  <body>
    <!-- container -->
    <div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center g-0
        min-vh-100">
        <div class="col-lg-4 col-md-8 py-8 py-xl-0">
          <!-- Card -->
          <div class="card smooth-shadow-md">
            <!-- Card body -->
            <div class="card-body p-6">
              <div class="mb-4">
                <a href="index"><img
                    src="assets/images/brand/logo/logo-primary.svg"
                    class="mb-2" alt=""></a>
                <p class="mb-6">Please enter your user information.</p>

              </div>
              <?php

                  if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                  {
                      echo '<div class="alert alert-danger <i class="icon-bell text-danger"></i>' .$_SESSION['status'].'</div>'; 
                      unset($_SESSION['status']);
                  }
              ?>
              <!-- Form -->
              <form method="post" action="admin_script.php">
                <!-- Username -->
                <div class="mb-3">
                  <label for="username" class="form-label">Name</label>
                  <input type="text" id="name" class="form-control"
                    name="name" placeholder="Name" required="">
                </div>
                <!-- Email -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" class="form-control"
                    name="email" placeholder="Email address here" required="">
                </div>
                <!-- Password -->
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" class="form-control"
                    name="password" placeholder="**************" required="">
                </div>
                <!-- Password -->
                <div class="mb-3">
                  <label for="confirm-password" class="form-label">Confirm
                    Password</label>
                  <input type="password" id="confirm_password"
                    class="form-control" name="confirmpassword"
                    placeholder="**************" required="">
                </div>
                <!-- Checkbox -->
                
                <div>
                  <!-- Button -->
                  <button type="submit" name="reg_admin" class="btn btn-primary btn-block">
                    Create Admin Account
                  </button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/libs/feather-icons/dist/feather.min.js"></script>
<script src="../assets/libs/prismjs/components/prism-core.min.js"></script>
<script src="../assets/libs/prismjs/components/prism-markup.min.js"></script>
<script src="../assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>










<!-- clipboard -->
<script src="../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>



<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
  </body>


<!-- Mirrored from codescandy.com/dashui/pages/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 21:21:50 GMT -->
</html>