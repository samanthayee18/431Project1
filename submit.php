<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- ?php include 'includes/head.php'; ? -->
    <?php include 'location:head.php'; ?>
  </head>
  
  <body>
    <!-- NAVBAR -->

    <!-- ?php  $page='submitPage';include 'components/navbar.php'; ? -->
    <?php  $page='submitPage';include 'location:navbar.php'; ?>

    <!-- END NAVBAR -->


    <!-- Header -->
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Quota!</h1>
        <p class="lead">Create your own quote cards to share with the world!</p>
    </div>


    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class ="row justify-content-center align-items-center">
                 
                    <!--    //Card Component
                <div class="card border-warning" style="width: 18rem;">
                    <div class="input-group">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="image">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">T</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Recipe Title" aria-label="Recipe-Title" aria-describedby="basic-addon1" name="title">
                    </div>
                    <div class="input-group mb-3">
                        <textarea class="form-control" aria-label="With textarea" placeholder="your quote..." name="recipe"></textarea>
                    </div>
                    <p><button class="btn btn-warning" type="submit" name="submit">Submit</button> add to library</p>
                </div>
            </div>
            -->
    </form>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>