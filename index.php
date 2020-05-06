<?php
    session_start();
    if(!isset($_SESSION["loggedin"] )){
      header('location:signin/signin.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <?php include 'head.php'; ?>
    <!--?php include 'includes/head.php'; ?-->
  </head>
  
  <body>
    <!-- NAVBAR -->
    <!-- ?php  $page='home';include 'components/navbar.php'; ?-->
    <?php  $page='home';include 'navbar.php'; ?>
    <!-- Header -->
    <!--?php include 'components/header.php'; ?-->
    <?php include 'header.php'; ?>

    <!-- load cards from database -->
    <?php
    $userId = $_SESSION["UserId"];
    $row = array();
    
        $db = mysqli_connect("mariadb","cs431s22","ohnaes9M","cs431s22");
        if(mysqli_connect_errno()) {

          echo"<p>Error: Could not connect to database.<br/>
          Please try again later.</p>";
          exit;    
      }

      /*
        $sql = "SELECT * FROM recipe_cards AS R
                LEFT JOIN library AS L 
                ON R.id = L.Recipe_Id AND L.User_Id = '$userId'
                WHERE  L.Recipe_Id IS NULL";
                //AND L.User_Id = '$userId'
        $result = mysqli_query($db, $sql);
      // $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
      while($resultRow = $result->fetch_assoc()){
          $row[] = $resultRow;
      }
     //  print_r($row);
     */

    ?>

 <!--
    <div class="container" id="container">
      <div class ="row justify-content-center align-items-center">
       
      // FA Arrow left
        <a href="#" id = "dec" name="dec"><i class="fas fa-angle-double-left fa-3x"></i></a>
          
      
        // Card Component 
            <div class="card border-warning" style="width: 18rem;">

            //add < back to ?php
            <img src="?php echo $row[0]['image']; ?>" class="card-img-top" alt="..." id ="img">
                <div class="card-body">
                <h5 class="card-title" id = "title"> ?php echo $row[0]['title']; ?></h5>
                <p class="card-text" id ="text"> ?php echo $row[0]['recipe_text'];?></p>

                 <form method="post" action="insert_Library.php" id ='formId'>
                 <input type="hidden" id ="myField" name="foo"  value="" />
                 

                 <p><a href="#" id ="add" class="btn btn-warning" onclick="this.form.submit()" >+</a>  add to library</p>
               </form>

                </div>
            </div>
          // FA Arrow right 
          <a href ="#" id = "inc" name="inc"><i class="fas fa-angle-double-right fa-3x"></i></a>
         
        </div>
      </div>
    </div>
    
    <div class="jumbotron jumbotron-fluid mt-4">
      <div class="container">

      </div>
    </div>


    -->
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--
    <script>
      //add < back to ?php
      var mulArray = 
            ?php echo json_encode($row, JSON_PRETTY_PRINT)?>;
        var all = document.querySelectorAll("[id='container']");


    $('#inc').click(function(){
      var current = getIndex();
      var incValue = current +1;
      if(incValue == mulArray.length){
        incValue = 0;
      }
      
     all[0].querySelector("#img").src = mulArray[incValue].image;
     all[0].querySelector("#title").innerHTML = mulArray[incValue].title;
     all[0].querySelector("#text").innerHTML = mulArray[incValue].recipe_text;
    
    });
    $('#dec').click(function(){
      var current = getIndex();

      var decValue = current -1;
      if(decValue < 0){
        decValue = mulArray.length -1;
      }
     all[0].querySelector("#img").src = mulArray[decValue].image;
     all[0].querySelector("#title").innerHTML = mulArray[decValue].title;
     all[0].querySelector("#text").innerHTML = mulArray[decValue].recipe_text;
    });


    function getIndex(){
      var index;
      for(var i =0; i<mulArray.length; i++){
        if(all[0].querySelector("#title").innerText == mulArray[i].title){
          return i;
        }

      }
     
   }
    </script>
    
   <script>

     var add = document.querySelector("#add");
    //  add.addEventListener("click",()=>{insertLibrary()});


    document.getElementById("add").onclick = function (){

    var current = getIndex();
    var recipe_id = mulArray[current].id;
    // //alert(current);
    document.getElementById('myField').value = recipe_id;
    document.getElementById("formId").submit();

    }

     function insertLibrary(){
    //    $_SESSION["UserId"]
    document.getElementById("formId").submit();
    var current = getIndex();
    var recipe_id = mulArray[current].id;
    
    // //alert(current);
    document.getElementById('myField').value = recipe_id;

  
      }
  
     </script>
    -->
  
  </body>
</html>