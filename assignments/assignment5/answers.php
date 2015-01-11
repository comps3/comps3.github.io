<?php

require '../../connection.php';

$sql = "SELECT questionNum ,answer
		FROM quiz
		WHERE questionNum = :questionNum
		AND answer = :useranswer";

	$stmt = $dbConn->prepare($sql);
	$stmt->execute(array(":questionNum" => $_POST['questionNum'] ,":useranswer" => $_POST['useranswer']));
	$results = $stmt->fetchAll();
	
	$output = array();		
	
	if(empty($results))
		{
			$output["exist"] = "false";
		}
		else {
			$output["exist"] = "true";
		}

		echo json_encode($output);		
		
		
		

?>