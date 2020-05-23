<?php
session_start();
$error = "Username or Password incorrect!";
$loggedin ="true";
$email = $_POST['email'];
$password= $_POST['password'];

//create connection
$db = mysqli_connect("mariadb","cs431s22","ohnaes9M","cs431s22");
//check connection
if(mysqli_connect_errno()){
    echo "<Error: Could not connect to database.<br/>
    Please try again later.</p>";
    exit;
}
//If wanted to ec=ncrypt the password add lines below
//$encryptpasswd = sha1($password);

$query = "SELECT * FROM user_q WHERE email='".$email ." ' and password1 = '".$password ." '";

$result = mysqli_query($db,$query);

$row = mysqli_num_rows($result);
$returnvalue = mysqli_fetch_assoc($result);

if($row==0){
    $_SESSION["login_error"] = $error;
    header('location:login.php');

}else{
    unset($_SESSION['error']);
    $_SESSION["loggedin"] = $loggedin;
    $_SESSION["user_id"] = $returnvalue["user_id"];
    header('location:index.php');
}
$db->close();
?>
