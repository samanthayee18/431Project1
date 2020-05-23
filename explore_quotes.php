<?php
  session_start();
  $dbhost = "mariadb";
  $dbuser = "cs431s22";
  $dbpass = "ohnaes9M";
  $dbname = "cs431s22";
  $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  unset($_SESSION['signup_error']);
  unset($_SESSION['login_error']);
?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css"/>
  <link rel="stylesheet" href="styles.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"/>
</head>

<body style="overflow-x: hidden;">


  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Quota</a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="your_quotes.php">Your Quotes</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="explore_quotes.php">Explore Quotes<span class="sr-only">(current)</span></a>
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
      <h1 class="display-4">EXPLORE QUOTES</h1>
      <blockquote class="blockquote">
        <p class="mb-0">"It is a pleasure to be able to quote lines to fit any occasion..."</p>
        <footer class="blockquote-footer"><cite title="Source Title">Abraham Lincoln</cite></footer>
      </blockquote>
    </div>
  </div>
  <form id="searchForm" class="px-5">
    <div class="d-flex justify-content-center lead">
      <label class="form-check-label" for="philosophicalCB">Select Quote Categories (At Least One):</label>
      <div class="pb-3 px-3">
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="philoCheck">
                <label class="form-check-label" for="philosophicalCB">Philosophical</label>
        </div>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="motivCheck">
                <label class="form-check-label" for="motivationalCB">Motivational</label>
        </div>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="funnyCheck">
                <label class="form-check-label" for="funnyCB">Funny</label>
        </div>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="loveCheck">
                <label class="form-check-label" for="loveCB">Love</label>
        </div>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="poetryCheck">
                <label class="form-check-label" for="poetryCB">Poetry</label>
        </div>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="otherCheck">
                <label class="form-check-label" for="otherCB">Other</label>
        </div>

        </div>
      </div>
    <div class="d-flex justify-content-center form-row">
      <div class="col-md-9">
        <div class="input-group">        
          <input type="text" class="form-control form-control-lg" id="searchTerm" placeholder="Search Quotes, People and Sources...">
        </div>
      </div>
    </div>
  </form>
  <div class="d-flex justify-content-center p-3">
    <div id="quoteResults" class="card-columns">
	
    </div>
  </div>
  <script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
</body>
