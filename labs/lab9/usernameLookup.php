<?php

// Checks whether a username is already in the database

require '../../connection.php';

if(isset($_POST['username']))
{
		$sql = "SELECT username 
		FROM lab9_user
		WHERE username = :username";
		
		$stmt = $dbConn->prepare($sql);
		$stmt->execute(array(":username" => $_POST['username']));
		$record = $stmt->fetch();
		
		$output = array();
		
		if(empty($record))
		{
			$output["exist"] = "false";
		}
		else {
			$output["exist"] = "true";
		}

		echo json_encode($output);		
}
?>