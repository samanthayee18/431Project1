<?php
session_start();
$error = "username or password incorrect!";
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

$query = "SELECT * FROM user_q";

$result = mysqli_query($db,$query);

$row = mysqli_num_rows($result);
$Returnvalue = mysqli_fetch_assoc($result);

if($row==0){
    $_SESSION["error"] = $error;
    header('location:signin.php');

}else{
    $_SESSION["loggedin"] = $loggedin;
    $_SESSION["UserId"] = $Returnvalue["UserId"];
    header('location:../index.php');
}
$db->close();
?>