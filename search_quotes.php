<?php
     	$db = mysqli_connect('mariadb', 'cs431s22', 'ohnaes9M', 'cs431s22');
        if (mysqli_connect_errno()) {
           print json_encode(['success' => false]);
           exit;
        }


	$searchTerm = $_POST['searchTerm'];
        $isPhilosophical = $_POST['isPhilosophical'];
        $isMotivational = $_POST['isMotivational'];
        $isFunny = $_POST['isFunny'];
        $isLove = $_POST['isLove'];
        $isPoetry = $_POST['isPoetry'];
        $isOther = $_POST['isOther'];

	$categoryArr = array();
		
	$query = "SELECT * FROM quotes WHERE ((author LIKE '%".$searchTerm."%') OR (quote LIKE '%".$searchTerm."%') OR (source LIKE '%".$searchTerm."%') OR (otherCategory LIKE '%".$searchTerm."%')) AND ((isPhilosophical = ".$isPhilosophical.") OR (isMotivational = ".$isMotivational.") OR (isFunny = ".$isFunny.") OR (isLove = ".$isLove.") OR (isPoetry = ".$isPoetry.") OR (isOther = ".$isOther."))";
  
  	$result = $db->query($query);

  	$quotes = array();
  	while($row = $result->fetch_assoc()) {
    		$quotes[] = $row;
  	}
        print json_encode($quotes);
?>
