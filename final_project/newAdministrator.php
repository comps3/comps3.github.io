<?php

require '../connection.php';

session_start();

if(!isset($_SESSION['username']))
{
	header("Location: login.php");
	
}

if(isset($_POST['promotion']))
{
	$sql = "INSERT INTO car_admin
			(username, password, firstname, lastname)
			VALUES(:username, :password, :firstname, :lastname)";
			
	$stmt = $dbConn->prepare($sql);
	$stmt->execute(array(":firstname" => $_POST['firstName'], ":lastname" => $_POST['lastName'],
						":username" => $_POST['newuserid'], ":password" => hash("sha1" , $_POST['password'])));
						
	echo "New administrator has been successfully added.";
	header("Location: admin.php");
						
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>newAdministrator</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<form method="post">
		<input type="text" name="firstName" placeholder="First Name" /><br /><br/>
		<input type="text" name="lastName" placeholder="Last Name" /><br /><br/>
		<input type="text" name="newuserid" placeholder="Username" /><br /><br/>
		<input type="password" name="password" placeholder="Password" /><br /><br/>
		<input type="submit" name="promotion" value="Register" /><br /><br />
	</form>

  </div>
</body>
</html>
