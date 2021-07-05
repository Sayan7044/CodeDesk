<?php
session_start();

echo '<nav class="navbar  navbar-expand-lg navbar-dark bg-dark" position:fixed>
<div class="container-fluid">
    <a class="navbar-brand" href="/forum">CodeDesk</a>
    <i class="fa fa-key icon"> <img src="image/desk.jpg" alt="key" width="70" height="50"> </i>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/forum">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Top Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                $sql="select category_name, category_id  from `categories` limit 5";
                $result=mysqli_query($connect,$sql);
                while ($row=mysqli_fetch_assoc($result)) {
                   echo '<li><a class="dropdown-item" href="http://localhost/forum/threadslist.php?catid=' . $row['category_id'] . '">' . $row['category_name'] .'</a></li>';
                    
                }
                   
                    
               echo' </ul>
            </li>
            <li class="nav-item">
        
                <a class="nav-link scroll-down " href="contact.php"  style=>Contact Us</a>
            </li>
        </ul>
        <div class=" btn-group">';

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
            echo ' <form class="d-flex form-inline" method="get" action="search.php">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-danger mx-2" type="submit">Search</button>
           <p class="text-light my-1">'.$_SESSION['user_email'].'</p>
           <a href="partials/logout.php" class="btn btn-outline-success mx-2"  >LogOut</a>
           </form>';
        }
        else{
        
              echo  '<form class="d-flex form-inline" >
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger"  type="submit">Search</button>
                
                </form>
                
                <button class="btn btn-outline-warning mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-info " data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
                
                </div>';
            }
               
   echo '</div>
</div>
</nav>';

include 'partials/loginModal.php';
include 'partials/signupModal.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true' ) {
    echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
    <strong>SignUp Successful :)</strong> You can now Login to CodeDesk.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

    ?>