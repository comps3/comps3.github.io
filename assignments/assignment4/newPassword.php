<?php

session_start();

if(!isset($_SESSION['username']))
{
	header("Location: login.php");
	
}

require '../../connection.php';

function setPassword($newPass) {
	
	global $dbConn;
	
		$sql = "UPDATE t7_admin
				SET password = :password
				WHERE adminId = :id";
			
			$stmt = $dbConn->prepare($sql);
			$stmt->execute(array(":password" => hash("sha1", $newPass), ":id" => $_SESSION['adminId']));
			echo "INFORMATION HAS BEEN UPDATED";	
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Changing Password</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	
	<center><h2>New Password</h2></center>
	
	<form method="post">
		<input type="password" name="pswd">
		<input type="submit" name="update" value="Update">
	</form>
	
	<?php
	
	if(isset($_POST['update'])) {
		
	setPassword($_POST['pswd']);
	
	}
	
	?>
	

  </div>
</body>
</html>
