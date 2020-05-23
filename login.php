<?php
session_start();
unset($_SESSION['signup_error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" />
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Quota</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="your_quotes.php">Your Quotes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="explore_quotes.php">Explore Quotes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create_quote.php">Create a Quote</a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a class="nav-link active" href="login.php">Login</a>
            </li>
            <li>
                <div class="btn-nav">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">LOGIN TO YOUR ACCOUNT</h1>
            <blockquote class="blockquote">
                <p class="mb-0">"It is a pleasure to be able to quote lines to fit any occasion..."</p>
                <footer class="blockquote-footer"><cite title="Source Title">Abraham Lincoln</cite></footer>
            </blockquote>
        </div>
    </div>
    <?php
    if(!isset($_SESSION["loggedin"])){
    ?>
    <form action="check_credentials.php" method="post" enctype="multipart/form-data">
        <div class="px-4" id="signin">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <?php
                                if(isset($_SESSION["login_error"])){
                                    $error = $_SESSION["login_error"];
                                    echo "<small id='passwordHelp' class='form-text text-muted'>".$error."</small>";
                                }

                            ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Sign In</button>
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Need to make an account? <a href="signup.php">Sign Up Here</a></p>
        </div>
        </div>
    </form>
    <?php
  }
  else{
  ?>
    	<h1 class="display-4 text-center pt-5">You are already logged in.' <a href="signout.php">Sign Out</a></h1>
  <?php
  }
  ?>
    <script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
</body>

</html>
