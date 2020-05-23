<?php
	session_start();
	$db = mysqli_connect('mariadb', 'cs431s22', 'ohnaes9M', 'cs431s22');
	if (mysqli_connect_errno()) {
	   print json_encode(['success' => false]);
	   exit;
	}

	
	$author = $_POST['author'];
	$source = $_POST['source'];
	$quote = $_POST['quote'];
	$isPhilosophical = $_POST['isPhilosophical'];
	$isMotivational = $_POST['isMotivational'];
	$isFunny = $_POST['isFunny'];
	$isLove = $_POST['isLove'];
	$isPoetry = $_POST['isPoetry'];
	$isOther = $_POST['isOther'];
	$otherCategory = isset($_POST['otherCategory']) ? $_POST['otherCategory'] : '';
	$text_color = $_POST['text_color'];
	$rgbVal =  $_POST['rgbVal'];
	$user_id = $_SESSION["user_id"];
	console.log("HELLO");
	$query = "INSERT INTO quotes (author, source, quote, isPhilosophical, isMotivational, isFunny, isLove, isPoetry, isOther, otherCategory, text_color, rgbVal, user_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param('sssiiiiiissss', $author, $source, $quote, $isPhilosophical, $isMotivational, $isFunny, $isLove, $isPoetry, $isOther, $otherCategory, $text_color, $rgbVal, $user_id);
	if ($stmt->execute()) { 
  	 print json_encode("success");
	} else {
   	 print json_encode("falied");
	}
?>
