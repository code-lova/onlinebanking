<?php
// Initialize the session
session_start();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ../index");
exit;
?>