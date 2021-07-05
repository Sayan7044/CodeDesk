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
    <link rel="stylesheet" href="contact.css">
    <style>
    #ques {
        min-height: 800px;
    }
    </style>
</head>

<body>

    <?php include 'partials/db_connect.php';?>
    <?php include 'partials/header.php'; ?>
    <?php
        if (($_SERVER['REQUEST_METHOD']=='POST')){
        
            $name = $_POST['name'];
            $email = $_POST['email'];
            $desc = $_POST['desc'];
         
            $sql = "INSERT INTO `mycontactus` (`name`, `email`, `concern`, `date`) VALUES ('$name', '$email', '$desc', current_timestamp())";
            $result = mysqli_query($connect,$sql);

            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your entry has been submitted successfully!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }

            else{
                // echo "The record is not inserted succesfully due to the error --->". mysqli_error($connect);
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your entry has been submitted successfully!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        }
            

        ?>
    <div class="container " id="ques">
        <div class="container my-3">
            <h1 class="text-center">Contact US</h1>
            <div id="boxed" class="my-3">
                <h1>Please enter your Details</h1>
                <form action="/forum/contact.php" method="POST">

                    <div class="">
                        <h4><label for="name" class="form-label">Name</label></h4>
                        <input type="name" class="form-control" width="50px" id="name" aria-describedby="emailHelp"
                            name="name">
                        <div id="emailHelp" class="form-text">We'll never share your name with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <h4><label for="email" class="form-label">Email address</label></h4>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <h4><label for="desc" class="form-label">Description</label></h4>
                        <textarea name="desc" id="desc" cols="10" rows="10" class="form-control"></textarea>

                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
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