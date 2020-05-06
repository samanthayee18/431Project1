<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-warning">
        <a class="navbar-brand" href="#">Quota</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if($page=='home'){echo 'active';}?>" href="index.php">Home</a>
            </li>
           
           <!-- //add < back infront of ?php
            <li class="nav-item">
              <a class="nav-link ?php if($page=='library'){echo 'active';}?>" href="library.php">Library</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ?php if($page=='submitPage'){echo 'active';}?>" href="submit.php">Submit</a>  
            </li>
            <li class="nav-item">
              <a class="nav-link ?php if($page=='logout'){echo 'active';}?>" href="logout.php">Logout</a>  
            </li>
-->

            <li class="nav-item">
              <a class="nav-link ?php if($page=='logout'){echo 'active';}?>" href="logout.php">Logout</a>  
            </li>

          </ul>
        </div>
      </nav>
