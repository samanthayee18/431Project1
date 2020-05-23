<?php
session_start();

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
        <?php
	if(isset($_SESSION["loggedin"])){
        ?>
                        <ul class="nav navbar-nav navbar-right">
                                <li>
                                    	<a class="btn btn-danger" href="signout.php">Sign Out</a>
                                </li>
                        </ul>
        <?php
	}
	else{
             	?>
                <ul class="nav navbar-nav navbar-right">
                        <li>
                            	<a class="nav-link" href="login.php">Login</a>
                        </li>

                        <li>
                            	<a class="nav-link" href="signup.php">Sign Up</a>
                        </li>
                </ul>
                <?php
        }
	?>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">CREATE YOUR ACCOUNT</h1>
            <blockquote class="blockquote">
                <p class="mb-0">"It is a pleasure to be able to quote lines to fit any occasion..."</p>
                <footer class="blockquote-footer"><cite title="Source Title">Abraham Lincoln</cite></footer>
            </blockquote>
        </div>
    </div>
    <?php
    if(!isset($_SESSION["loggedin"])){
    ?>
    <div class="wrapper">
        <form class="px-4" action="create_credentials.php" method="post">
 	<!--<form class="px-4" href="../signup/register.php" method="post">-->
 
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
                
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
                
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                
            
		<?php
                                if(isset($_SESSION["signup_error"])){
                                    $error = $_SESSION["signup_error"];
                                    echo "<small id='account_exists' class='form-text text-muted'>".$error."</small>";
                                }

                            ?>
            </div>
	    <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Create">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login Here</a></p>
        </form>
    </div>
    <?php
  }
  else{
  ?>
        <h1 class="display-4 text-center pt-5">You are already logged in. <a href="signout.php">Sign Out</a></h1>
  <?php
  }
  ?>
</body>

</html>

