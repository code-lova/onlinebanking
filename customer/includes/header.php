<?php

ob_start();
session_start();
require_once('database_connect.php');

    if (!$_SESSION['name']) 
    {
        header('location: ../index');
    }
?>

 <?php 

                  $hour = date('H');

                  if ($hour >= 20)
                  {
                    $greetings = "Good Night";
                  }elseif ($hour > 17) {
                   $greetings = "Good Evening";
                  }elseif ($hour > 11) {
                   $greetings = "Good Afternoon";
                  }elseif ($hour < 12) {
                   $greetings = "Good Morning";
                  }

            ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>B & M National Bank - Offshore Customer Internet Banking Profile </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->

    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>