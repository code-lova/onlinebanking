<?php
   

 session_start();
   
 
 // Database connection
 include('database_connect.php');





if (isset($_POST['contact_btn'])) 
{

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $name   = $connection->real_escape_string($_POST['name']);
    $subject   = $connection->real_escape_string($_POST['subject']);
    $mobile   = $connection->real_escape_string($_POST['mobile']);
    $email   = $connection->real_escape_string($_POST['email']);
    $message   = $connection->real_escape_string($_POST['message']);

    $query="INSERT INTO contact(name,subject,mobile,email,message) VALUES('$name','$subject','$mobile','$email','$message')";
    $result = $connection->query($query);

    if ($result)
    {

        $_SESSION['status'] = "Your message we sent successfully..";
        $_SESSION['status_code'] = "success";
        header("location: contact");
        
    }
    else
    {
        $_SESSION['status'] = "Oops..Something Went Wrong. #1";
        $_SESSION['status_code'] = "danger";
        header("location: contact");
    }

    exit();

}

?>