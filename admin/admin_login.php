<?php
   

 session_start();
   
 
 // Database connection
 include('db_admin.php');

    

   if(isset($_POST['adminlogin_btn'])) 
    {
        $email_signin        = $_POST['email_signin'];
        $password_signin     = $_POST['password_signin'];

    

        // Query openig to the database
        $sql = "SELECT * From admin WHERE email = '{$email_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

         // Check if Admin exist in database
        if($rowCount <= 0) 
        {
           $_SESSION['status'] = "Admin Does Not Exist";
         header('location: index');

        } else 
           {
                // Fetch user data and store in php session
                  while($row = mysqli_fetch_array($query)) 
                {
                    $id            = $row['id'];
                    $email_now         = $row['email'];
                    $name      = $row['name'];
                    $pass_word     = $row['password'];
              }

                  // Verify password
                  $password = password_verify($password_signin, $pass_word);

                  // Allow only verified user
        if($email_signin == $email_now && $password_signin == $password) 
        {
               header("Location: dashboard");
                       
               $_SESSION['id'] = $id;
               $_SESSION['email'] = $email;
               $_SESSION['name'] = $name;
        
        } 

         else {
                 $_SESSION['status'] = "Email/Password Not Match.";
             header('location: index');
              }
                
           }

    }






if (isset($_POST['updateadmin_btn']))
{
  
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];


  if ($password === $cpassword) 
  {
  

  $password = $connection->real_escape_string($_POST['password']);
  $cpassword = $connection->real_escape_string($_POST['cpassword']);

  // Password hash
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $query ="UPDATE admin SET password='$hashedPassword' ";
   $result = $connection->query($query);

   if ($result) 
      {
          //echo "yes";
          $_SESSION['status'] = "Admin Password Udated Successfully..!!";
          $_SESSION['status_code'] = "success";
          header('location: settings');
      }
      else
      {
          $_SESSION['status'] = "Adimin Password NOT Udated";
          $_SESSION['status_code'] = "error";
          header('location: settings');
      }    
  }
  
  else
  {
    $_SESSION['status'] = "Password Does Not Match";
    $_SESSION['status_code'] = "warning";  
      header('location: settings');
  }

}




    

?>    