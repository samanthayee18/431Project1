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

$db = new mysqli("mariadb","cs431s22","ohnaes9M","cs431s22");

if(mysqli_connect_errno()) {

    echo"<p>Error: Could not connect to database.<br/>
    Please try again later.</p>";
    exit;
}

$query = "SELECT * FROM user_q WHERE email='".$email ." ' and password1 = '".$password ." '";

$result = mysqli_query($db,$query);

$row = mysqli_num_rows($result);
$returnvalue = mysqli_fetch_assoc($result);

if($row>0){
    
    $_SESSION["signup_error"] = "It looks like there's already an account with this username or email!";
    header('location:signup.php');

}else{
    unset($_SESSION['signup_error']);
    $query="INSERT INTO user_q (Username, Email, Password1) VALUES('$username','$email','$password')";
    $new_user_result = mysqli_query($db,$query);
    $new_user = mysqli_fetch_assoc($new_user_result);
    $_SESSION["loggedin"] = $loggedin;
    $_SESSION["user_id"] = $new_user["user_id"];
    header('location:index.php');
}
$db->close();
?>
