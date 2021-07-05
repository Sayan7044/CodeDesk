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
    <link rel="stylesheet" href="about.css">
</head>
<style>
    body {
  background-image: url("image/back3.jpg");
  background-repeat: no-repeat;
  height: 100%;
  background-size: cover;
}
</style>

<body>
    <?php include 'partials/db_connect.php';?>
    <?php include 'partials/header.php'; ?>
    <div class="container ">
        <h1 class="my-3">About Us Page</h1>
        <p>CodeDesk is a free online coding forum.</p>
        
        <p><h3>It is made for coding enthusiast, who want to explore different languages and can post their question in this
            forum. If they want to give any ans tthey can. The main motive of this forum is to raise the coding
            mentality among all over the world.</h3></p>
    </div>
    <hr>

    <h2 style="text-align:center" style="width:100%" >Created By</h2>
    <div class="row">
        
            
                <div class="container "  >
                <img src="image/sayan.jpg " class="center pic my-3" >
                    <h1>Sayan Guin</h1>
                    <p class="title">Web Developer</p>
                    <p>A engineering student pursuing Btech in CSE.</p>
                    <a href="sayanguin02@gmail.com">
                        <p>sayanguin02@gmail.com</p>
                    </a>
                    
                </div>
                    <br>
            
        



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