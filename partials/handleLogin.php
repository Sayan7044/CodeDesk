<?php
$showError="false";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include 'db_connect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql="Select * from users where user_email='$email'";
    $result=mysqli_query($connect,$sql);
    $numRows=mysqli_num_rows($result);
    if ($numRows==1) {
        $row=mysqli_fetch_assoc($result);
        if (password_verify($pass,$row['user_pass'])) {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['sno']=$row['sno'];
            $_SESSION['user_email']=$email;
            echo "loggedin". $email;
        }
        
        header("location:/forum/index.php?loginsuccess=true");
    
    }
    
    header("location:/forum/index.php");
}

?>