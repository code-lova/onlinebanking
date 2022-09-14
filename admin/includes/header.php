<?php

    session_start();

    include('db_admin.php');

?>

<?php
    if (!$_SESSION['name']) 
    {
        header('location: index');
    }
?>


<!DOCTYPE html>
<html lang="en">

  
<!-- Mirrored from codescandy.com/dashui/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 21:20:55 GMT -->
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

<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">






<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
    <title>Admin Dashboard | Dash Ui</title>
  </head>

