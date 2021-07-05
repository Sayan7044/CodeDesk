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
    $id=$_GET['catid'];
     $sql=" SELECT * FROM `categories` WHERE category_id=$id";
     $result=mysqli_query($connect,$sql);
     while ($row=mysqli_fetch_assoc($result)) {
         $catname=$row['category_name'];
         $catdesc=$row['category_description'];
     }
  
    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    if ($method=='POST') {
        
       $th_title = $_POST['title'];
       $th_title = str_replace("<", "&lt;",$th_title);
       $th_title = str_replace(">", "&gt;",$th_title);
    //    echo $th_title;
       $th_desc = $_POST['desc'];
       $th_desc = str_replace("<", "&lt;",$th_desc);
       $th_desc = str_replace(">", "&gt;",$th_desc);
       $sno = $_POST['sno']; 
       
    //    echo $th_desc;
       $sql= "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) 
              VALUES ( '$th_title', '$th_desc', '$id','$sno')";
        $result=mysqli_query($connect,$sql);
        $showAlert = true;
        if ($showAlert) {
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success :)</strong> Your Problem has been posted sucessfully!!!
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
 } 

    ?>


    <!-- category container starts here -->

    <div class="container my-3">


        <div class="jumbotron" id="boxed">
            <b>
                <h1 class="display-4 head my-4">Welcome to <?php echo $catname;?> Forum</h1>
            </b>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-2">
            <p>This is a peer to peer forum to share knowledge with each other.</p>
            <li>No Spam / Advertising / Self-promote in the forums</li>
            <li>Do not post copyright-infringing material</li>
            <li>Do not post “offensive” posts, links or images</li>
            <li>Do not cross post questions</li>
            <br>
            <!-- <h4>Posted By~ <b>Anonymus User</b></h4> -->
        </div>

    </div>

    <hr>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
       
        echo '<div class="container">
        <h1 class="py-3">Ask A Question</h1>
        
        
        <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
        
        <p>
        
        <button class="btn  btn-outline-success" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Click Here To Ask Question
        </button>
        </p>
    <div class="collapse" id="collapseExample">
    <div id="boxed">
    <!-- <div class="card"> -->
    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    <!-- </div> -->
    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
    <br>
    <label for="exampleFormControlTextarea1" class="form-label">Elaborate your problem.</label>
    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
    <button type="submit" class="btn btn-warning my-3">Submit</button>
    </div>
    </div>
    </div>
    </form>
    
    </div>';
    }

    else{
        // echo ' <div class="container lead">
        // <p >You Are not logged in. LogIn to Ask Question</p>
        // </div>';
        echo ' <div class="container">
        <h1 class="py-3">Ask A Question</h1>
        
        <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Click Here To Ask Question</button>
        </div>
        ';
    }


    ?>


    <hr>
    <div class="container  " id="ques">
        <h1 class="py-3">Browse Questions</h1>
        <?php
    $id=$_GET['catid'];
     $sql=" SELECT * FROM `threads` WHERE thread_cat_id=$id";
     $result=mysqli_query($connect,$sql);
     $noResult=true;
     while ($row=mysqli_fetch_assoc($result)) {
        $noResult=false;
         $id=$row['thread_id'];
         $title=$row['thread_title'];
         $desc=$row['thread_desc'];
         $thread_time=$row['timestamp'];
         $thread_user_id=$row['thread_user_id'];
         
         $sql2="SELECT user_email FROM `users` where sno='$thread_user_id'";
         $result2=mysqli_query($connect,$sql2);
         $row2=mysqli_fetch_assoc($result2);
        //  echo var_dump ($row2);
        //  echo var_dump($thread_user_id);
        
    
       echo' <div class="media">
            <img src="image/face5.jpg" class="mr-3" alt="..." width="50px" height="50px">
        <i><b><p class="font-weignt-bold my-0">' . $row2['user_email'] . '</b> <small>(' . $thread_time . ')</small></p></i>
            <div class="media-body my-2">
                <h5 class="mt-0 "> <a class="text-dark" href="thread.php?threadid=' . $id .'" style="text-decoration:none"> ' . $title . '</a></h5>
                <p>' . $desc . '</p>
                <hr>
            </div>
        </div>';
    }
    
    if ($noResult) {
        echo '<div class="jumbotron jumbotron-fluid" id="boxed">
        <div class="container">
          <p class="display-4">No Threads found</p>
          <p class="lead">Be the first person to post a Question.</p>
        </div>
      </div>
        
        ';
    }
   
    ?>





        <!-- <div class="media">
            <img src="image/face5.jpg" class="mr-3" alt="..." width="50px" height="50px">
            <div class="media-body">
                <h5 class="mt-0">Media heading</h5>
                <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's
                    beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is
                    jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
            </div>
        </div>

        -->
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