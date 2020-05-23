<?php
  session_start();
  unset($_SESSION['signup_error']);
  unset($_SESSION['login_error']);
  $dbhost = "mariadb";
  $dbuser = "cs431s22";
  $dbpass = "ohnaes9M";
  $dbname = "cs431s22";

  $sql = "SELECT * FROM quotes";
  $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  $result = $db->query($sql);

  $quotes = array();
  while($row = $result->fetch_assoc()) {
    $quotes[] = $row;
  }
  
  
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
      <h1>WELCOME TO QUOTA</h1>
      <blockquote class="blockquote">
        <p class="mb-0">Create, share and discover quotes.</p>
	<footer class="blockquote-footer"><cite title="Source Title">Live life one line at a time.</cite></footer>        
      </blockquote>
    </div>
  </div>

  
  <div id="textCarousel" style="width: 50vw; margin: auto;" class="carousel slide py-5 pb-3 bg-primary text-white rounded" data-ride="carousel">
  	<div class="carousel-inner text-center">
		
    		<div class="carousel-item active" data-interval="3000">
			
			<img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/NYCS-bull-trans-1.svg" alt="1">
			<h2 class="display-4 text-center d-inline align-middle">Create an account.</h2>
			
		</div>
    		<div class="carousel-item" id="step2" data-interval="3000">              
			<img src="https://upload.wikimedia.org/wikipedia/commons/6/61/NYCS-bull-trans-2.svg" alt="2">
			<h2 class="display-4 text-center d-inline align-middle">Publish your Quotes.</h2>
		</div>
    		<div class="carousel-item" id="step3" data-interval="3000">		
			<img src="https://upload.wikimedia.org/wikipedia/commons/2/25/NYCS-bull-trans-3.svg" alt="3">
  			<h2 class="display-4 text-center d-inline align-middle">Find Quotes you Love!</h2>
		</div>
  	</div>
  </div>

  
  <div class="d-flex justify-content-center p-3 pt-5">
    <div class="card-columns">

      <?php
        for ($x = sizeof($quotes)-1; $x >= 0; $x--){ ?>
          <div id="quotePreview" style="background-color: <?php echo $quotes[$x]['rgbVal']?>;" class="card p-3 text-<?php echo $quotes[$x]['text_color']?>">
            <blockquote class="blockquote mb-0 card-body">
              <p id="quoteText">"<?php echo $quotes[$x]['quote']?>"</p>
                <footer>
                  <small>-</small>
                  <small id="authorText">
                    <?php echo $quotes[$x]['author']?>
                  </small>
                  <small>, <cite id="sourceText" title="Source Title"><?php echo $quotes[$x]['source']?></cite></small>
                </footer>
             </blockquote>
             </div>

        <?php
        }
      ?>
    </div>
  </div>

  <script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
</body>







