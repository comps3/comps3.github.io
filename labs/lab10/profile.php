<?php

session_start();

 if (isset ($_POST['loginForm'])) {
     
    require '../../connection.php';
     
    $sql = "SELECT *
            FROM lab9_user
            WHERE username = :username
            AND password = :password";
    
    $stmt = $dbConn->prepare($sql);         
    $stmt -> execute( array(":username" => $_POST['username'],
                            ":password" => sha1($_POST['password'])));
    $result = $stmt->fetch();
    
    if (!empty($result)){
        
        echo "Welcome " . $result['firstName'] . " " . $result['lastName'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['profile_pic'] = $result['profile_pic'];
        
    }
 }


  if (isset($_POST['uploadForm'] )) {
  	
      
     echo "Name in tmp folder: " . $_FILES["fileName"]["tmp_name"] . "<br />";
     echo "File size: " . $_FILES["fileName"]["size"]. "<br />";
     echo "File type: " . $_FILES["fileName"]["type"]. "<br />";
     
     
     if (!file_exists($_SESSION['username'])) {
        mkdir($_SESSION['username']); //creates a new folder per username
     }
     
     $_SESSION['profile_pic'] = $_FILES["fileName"]["name"];
     
    require '../../connection.php';
	
	$sql = "UPDATE lab9_user 
			SET profile_pic = :pic
			WHERE username = :username";
			
	$stmt = $dbConn->prepare($sql);         
    $stmt -> execute( array(":pic" => $_SESSION['profile_pic'], 
    						":username" => $_SESSION['username']));
     
     move_uploaded_file($_FILES["fileName"]["tmp_name"], $_SESSION['username'] . "/" . $_FILES["fileName"]["name"]);
     //moves the uploaded file from the temporal folder to our own folder
    
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Lab 10: B. Huynh - Profile Page</title>
  <meta name="description" content="">
  <meta name="author" content="lara4594">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
     <link rel="stylesheet" type="text/css" href="style.css" />
   <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
</head>

<body>
  <div>


   <h2> Profile </h2>

  <?php
  
    if (empty ($_SESSION['profile_pic'])) {
        
        echo "<img src='unknown.png' width='200'>";
        
        
    } else {
        
        echo "<img src='" . $_SESSION['username']  . "/" . $_SESSION['profile_pic'] . "' />";
        
    }
    
    ?>


   <form method="post" enctype="multipart/form-data">
       
        Upload your profile picture:
        <input type="file" name="fileName" />
        <input type="submit" name="uploadForm" value="Upload Picture!" />
       
   </form>

  </div>
</body>
</html>