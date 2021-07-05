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
    <link rel="stylesheet" href="index.css">
    <style>
    #ques {
        min-height: 2000px;
    }
    </style>
    

</head>

<body>

    <?php include 'partials/db_connect.php'; ?>
    <?php include 'partials/header.php'; ?>
    <!-- slider strts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image/abs1.jpg" class="d-block  w-100 " width="100" height="715" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                        <h1 class="header">Welcome To CodeDesk</h1>
                        <h4 class="desc">Online Coding Forum</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="image/abs3.jpg" class="d-block w-100" width="100" height="715" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="header">Welcome To CodeDesk</h1>
                        <h4 class="desc">Online Coding Forum</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="image/abs4.jpg" class="d-block w-100" width="100" height="715" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="header">Welcome To CodeDesk</h1>
                        <h4 class="desc">Online Coding Forum</h4>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <hr>
    </div>

    <!-- category fetch starts here -->
    <div class="container my-3" id="ques">
        <h2 class="text-center">CodeDesk ~ Browse Categories</h2>
        <div class="row">
            <!-- fetch all Categories -->
            <?php
            $sql="SELECT * FROM `categories`";
            $result=mysqli_query($connect,$sql);
            while ($row=mysqli_fetch_assoc($result)) {
                // echo $row['category_id'];
                // echo $row['category_name'];
                $id=$row['category_id'];
                $cat=$row['category_name'];
                $desc=$row['category_description'];
                echo '<div class="col-md-3 my-3">
                <div class="card" style="width: 18rem;">
               
                    <img src="image/logo'.$id.'.jpg" class="card-img-top pic" alt="..." >
                    
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadslist.php?catid=' . $id . '">' . $cat . '</a></h5>
                        <p class="card-text">' . substr($desc,0,90) .'...</p>
                        <a href="threadslist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                    </div>
                    </div>
                </div>';
            }
   ?>
   </div>

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