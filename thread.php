<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CodeDesk ~ Online Coding Forum</title>
    <link rel="stylesheet" href="thread.css">
    <style>
    #ques {
        min-height: 1000px;
    }
    </style>

</head>

<body>


    <?php include 'partials/db_connect.php'; ?>
    <?php include 'partials/header.php'; ?>
    <?php
    $id=$_GET['threadid'];
     $sql=" SELECT * FROM `threads` WHERE thread_id=$id";
     $result=mysqli_query($connect,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
         $title=$row['thread_title'];
         $desc=$row['thread_desc'];
         $thread_user_id=$row['thread_user_id'];
         
         $sql2="SELECT user_email FROM `users` where sno='$thread_user_id'";
         $result2=mysqli_query($connect,$sql2);
         $row2=mysqli_fetch_assoc($result2);
         $postedBY=$row2['user_email'];
     }
 
    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    
    if ($method=='POST') {
        
       $comment = $_POST['comment'];
       $comment = str_replace("<", "&lt;",$comment);
       $comment = str_replace(">", "&gt;",$comment);
       $sno = $_POST['sno'];
   
       $sql= "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`) 
       VALUES ( '$comment', '$id', '$sno')";
        $result=mysqli_query($connect,$sql);
        $showAlert = true;
        if ($showAlert) {
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success :)</strong> Your comment has been posted sucessfully!!!
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
 } 

    ?>


    <!-- category container starts here -->

    <div class="container my-3">


        <div class="jumbotron" id="boxed">
            <b>
                <h1 class="display-4 head my-4"> <?php echo $title;?></h1>
            </b>
            <p class="lead"><?php echo $desc;?></p>
            <hr class="my-2">
            <p>This is a peer to peer forum to share knowledge with each other.</p>
            <li>No Spam / Advertising / Self-promote in the forums</li>
            <li>Do not post copyright-infringing material</li>
            <li>Do not post “offensive” posts, links or images</li>
            <li>Do not cross post questions</li>
            <br>
            <p>Posted By ~ <b><?php echo $postedBY; ?></b></p>
        </div>

    </div>

    <hr>
    
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
        <h1 class="py-3">Post A Comment</h1>
        <!-- comment here -->
        <form action=" '. $_SERVER['REQUEST_URI'] . '" method="post">
            <p>

                <button class="btn btn-outline-danger" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Comment Here
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div id="boxed">
                    <div class="card">
                        <textarea name="comment" id="comment" rows="3" placeHolder="Place your comment here"></textarea>
                        <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                    </div>
                    <button type="submit" class="btn btn-warning my-3 ">Post Comment</button>
                </div>
            </div>
        </form>

    </div>';}
    
    else{
        // echo ' <div class="container lead">
        // <p >You Are not logged in. LogIn to Ask Question</p>
        // </div>';
        echo ' <div class="container">
        <h1 class="py-3">Ask A Question</h1>
        
        <button class="btn btn-outline-danger mx-2" data-bs-toggle="modal" data-bs-target="#loginModal"> Comment Here</button>
        </div>
        ';
    }
 ?>
    <div class="container" id="ques">


        <h1 class="py-3">Discussion</h1>
        <?php
    $id=$_GET['threadid'];
     $sql=" SELECT * FROM `comments` WHERE thread_id=$id";
     $result=mysqli_query($connect,$sql);
     $noResult=true;
     while ($row=mysqli_fetch_assoc($result)) {
        $noResult=false;
         $id=$row['comment_id'];
         $content=$row['comment_content'];
         $comment_time=$row['comment_time'];
         
         $thread_user_id=$row['comment_by'];
         $sql2="SELECT user_email FROM `users` where sno='$thread_user_id'";
         $result2=mysqli_query($connect,$sql2);
         $row2=mysqli_fetch_assoc($result2);
         $u_email=$row2['user_email'];
    
       echo' <div class="media">
            <img src="image/face5.jpg" class="mr-3" alt="..." width="50px" height="50px">
            <div class="media-body my-2">
            <b><p class="font-weignt-bold my-0">' . $u_email . '</b> <small>(' . $comment_time . ')</small></p>
                ' . $content . '
                <hr>
            </div>
        </div>';
    }
    if ($noResult) {
        echo '<div class="jumbotron jumbotron-fluid" id="boxed">
        <div class="container">
          <p class="display-4">No Comments found</p>
          <p class="lead">Be the first person to post a comment.</p>
        </div>
      </div>
        
        ';
    }
   
    ?>




    </div>
    <br>
    <?php include 'partials/footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>