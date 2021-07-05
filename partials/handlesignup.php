<?php
$showAlert=false;
$showError=false;
if ($_SERVER['REQUEST_METHOD']=='POST') {
   include 'db_connect.php';
   $user_email = $_POST['signupEmail'];
   $pass = $_POST['signuppassword'];
   $cpass = $_POST['signupcpassword'];

   //check whether email exisit
   $existsql="select * from `users` where user_email='$user_email'";
   $result=mysqli_query($connect,$existsql);
   $numRows = mysqli_num_rows($result);
   if ($numRows>0) {
       $showError = "Username already in use";
   }
   else{
       if ($pass==$cpass) {
          $hash = password_hash($pass, PASSWORD_DEFAULT);
          $sql="INSERT INTO `users` ( `user_email`, `user_pass`, `timestmp`) 
          VALUES ( '$user_email', '$hash', current_timestamp())";
          $result=mysqli_query($connect,$sql);
          if ($result) {
           $showAlert=true;
           header("location: /forum/index.php?signupsuccess=true");
           exit();
          }
       }
       else{
        $showError = "Password do not match";
   
        
        }
    }
header("location: /forum/index.php?signupsuccess=false&error=$showError");
}



?>