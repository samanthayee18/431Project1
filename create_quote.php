<?php
  session_start();
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
        <li class="nav-item">
          <a class="nav-link" href="explore_quotes.php">Explore Quotes</a>
        </li>
        <li class="nav-item active">
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
      <h1 class="display-4">CREATE A QUOTE</h1>
      <blockquote class="blockquote">
        <p class="mb-0">"I'm discovering that everybody is a closet quotesmith. Just give them a chance."</p>
        <footer class="blockquote-footer"><cite title="Source Title">Robert Brault</cite></footer>
      </blockquote>
    </div>
  </div>
  <?php
  if(isset($_SESSION["loggedin"])){
  ?>
  <form id="quoteFormId" class="needs-validation">
    <div class="row px-4">
      <div class="col-md-3 mb-3">
        <label for="author">Author</label>
        <input onkeyup="updateAuthorText(this)" type="text" class="form-control" id="author" placeholder="e.g. Yoda, Abraham Lincoln, Kobe Bryant" required>
      </div>
      <div class="col">
        <label for="source">Source</label>
        <input onkeyup="updateSourceText(this)" type="text" class="form-control" id="source" placeholder="e.g. Joe Rogan Podcast: Episode 20, The 7 Habits of Highly Effective People, The Office: Season 1, Episode 3" required>
      </div>
    </div>
    <div class="form-group px-4">
      <label for="quote">Quote</label>
      <textarea onkeyup="updateQuoteText(this)" class="form-control" id="quote" rows="4" placeholder="e.g. To be, or not to be, that is the question. (No quotation marks required)" required></textarea>
    </div>
    <div class="form-group px-4">
      <label>Select at least one category for your quote:</label>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="isPhilosophical">
        <label class="form-check-label" for="philosophy">Philosophical</label>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="isMotivational">
        <label class="form-check-label" for="motivational">Motivational</label>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="isFunny">
        <label class="form-check-label" for="funny">Funny</label>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="isLove">
        <label class="form-check-label" for="love">Love</label>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="isPoetry">
        <label class="form-check-label" for="poetry">Poetry</label>
      </div>
      <div class="form-group form-check">
        <input onclick="isOther(this)" type="checkbox" id="other" class="form-check-input">
        <label class="form-check-label" for="poetry">Other</label>
      </div>
      <input style="max-width: 30%" placeholder="Enter a category that fits your quote" type="text" class="d-none" id="otherCategory">

    </div>
    <div class="form-group px-4">
      <label>Select a background color for your quote card:</label>
    </br>
      <div class="color-picker"></div>
    </br>
      <label>Select the text color for your quote card:</label>
    </br>
      <button id="blackText" onclick="textColorToBlack()" type="button" class="btn btn-light btn-lg">Black Text</button>
      <button id="whiteText" onclick="textColorToWhite()" type="button" class="btn btn-dark btn-lg">White Text</button>
    </div>

    <div style="max-width: 30%;" id="quoteCard" class="form-group px-4">
      <div id="quotePreview" style="background-color: rgb(233, 231, 231);" class="card p-3 text-black">
        <blockquote class="blockquote mb-0 card-body">
          <p id="quoteText">"Hello"</p>
            <footer>
              <small>-</small>
              <small id="authorText">
                Someone famous
              </small>
              <small id="sourceVisible" class="d-none">, <cite id="sourceText" title="Source Title">Source Title</cite></small>
            </footer>
        </blockquote>
      </div>
    </div>

    <div class="form-group px-4">
      <button id="createQuoteBtn" class="btn btn-primary has-spinner" type="submit">
          <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
            Create Quote
        </button>
    </div>

  </form>
  <?php
  }
  else{	
  ?>
	<h1 class="display-4 text-center p-5">You must login before you get quotin'. <a href="login.php">Login Here</a></h1>
  <?php
  }
  ?>
<script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
<script>
  let preview = document.getElementById('quotePreview');
  const pickr = Pickr.create({
    el: '.color-picker',
    theme: 'nano', // or 'monolith', or 'nano'
    comparison: false,
    default: '#ededed',
    

    components: {

        // Main components
        preview: true,
        opacity: true,
        hue: true,

        // Input / output Options
        interaction: {
            hex: false,
            rgba: false,
            hsla: false,
            hsva: false,
            cmyk: false,
            input: true,
            cancel: false,
            clear: false,
            save: false

        }
    }
  });

  pickr.on('change', (...args)=> {
    let color = args[0].toHEXA().toString();
    preview.style.backgroundColor = color;
    
  });


  
</script>
</body>
