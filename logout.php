<?php

session_start();
unset($_SESSION["UserId"]);
unset($_SESSION["loggedin"] );
header('location:signin/signin.php');
//$_SESSION["UserId"]
?>