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
    #maincontainer {
        min-height: 605px;
    }
    </style>


</head>

<body>

    <?php include 'partials/db_connect.php'; ?>
    <?php include 'partials/header.php'; ?>

    <!-- Search results strts here -->
    <div class="container my-3" id="maincontainer">
        <h1>Search Results for "<?php echo $_GET['search'];?>"</h1>
        <hr>
        <?php
        $noresult=true;
        $query=$_GET["search"];
    $sql=" SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$query')";
    $result=mysqli_query($connect,$sql);
    while ($row=mysqli_fetch_assoc($result)) {
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        $thread_id=$row['thread_id'];
        $noresult=false;
        $url='thread.php?threadid='.$thread_id;
    echo '  <div class="results">
                <h3><a href="' . $url . '" class="text-dark" style="text-decoration: none">' . $title . '</a></h3>
                <p>' . $desc . '</p>
            </div> 
            <hr>';
    }

    if ($noresult) {
        echo '<div class="jumbotron jumbotron-fluid pb-0" id="boxed">
        <div class="container">
          <p class="display-4">No Results found</p>
          <p class="lead">It looks like there arent many great matches for your search.</p>
        </div>
      </div>';
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