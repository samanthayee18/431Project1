<?php

session_start();
$error = "It looks like there's already an account. Choose another username or password !";

$userError = "Your name is required.";
$emailError = "Your email is required.";
$passwordError = "Your password is required.";

$username=$_POST['username'];
$email= $_POST['email'];
$password = $_POST['password'];

$zero = 0;

@$db = new mysqli("mariadb","cs431s22","ohnaes9M","cs431s22");
//$db = new mysqli("mariadb","cs431s22","ohnaes9M","cs431s22");

if(mysqli_connect_errno()) {

    echo"<p>Error: Could not connect to database.<br/>
    Please try again later.</p>";
    exit;
}


if( trim($_POST['username']) == "" || trim($_POST['email']) == "" ||trim($_POST['password']) == "") {
    
 
    if( trim($_POST['username']) == ""){
        $_SESSION["usererrmsg"] = $userError;
    
    }
    if(trim($_POST['email']) == "" )  {
        $_SESSION["emailerrmsg"] = $emailError;
    
    }   

    if(trim($_POST['password']) == "" ){
        
        $_SESSION["passerrmsg"] = $passwordError;
    
        
    }   

    header('location:register.php');
}
else {
    $username = mysqli_real_escape_string($db, $username);
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    //$encryptpasswd = sha1($password);


    //$query = "SELECT Username,Email FROM user_q WHERE Email='".$email ." ' && Username = '".$username. "'";
    //$query = "SELECT Username,Email FROM user_q";
    $query = "SELECT Username FROM user_q WHERE Username = $username";
    
    $result = mysqli_query($db,$query);
    if (!$result) {
        echo "Select from administrator failed.". mysqli_error($connection);
        exit();
    }
    $row = mysqli_fetch_object($result);
  
    $db_userid = $row->Username;
    $db_email = $row->Email;

if($db_userid == $username || $db_email == $email){
    $_SESSION["error"] = $error;
    header('location:register.php');
}
else{
//$query = "INSERT INTO user_q VALUES(?,?,?,?)";
$query = "INSERT INTO user_q VALUES(?,?,?)";
$stmt = $db->prepare($query);
//$stmt->bind_param('isss',$zero,$username,$email,$encryptpasswd);
$stmt->bind_param('iss',$zero,$username,$email);
$stmt->execute();
        if($stmt->affected_rows > 0){
            echo "<p>Info inserted into the database</p>";
            header('location:../signin/signin.php');
        }   else {
            echo "<p>An error has occurred.<br/>
                The item was not added.</p>";
            
        }
}
}
?>