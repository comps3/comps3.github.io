<?php

$errors = "";

if(isset($_GET['cm'])) {
		
	$cm = $_GET['cm'];
	
	if (is_numeric($cm)) {
		//echo $cm;
		$inches = $cm * 0.393701;
		echo " Centimeters: ". $cm . " Inches: ". $inches;
	}
	else {
		$errors = "You must enter a number!";
	}
}



else {
	$errors = "No value was passed.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Brian H. Conversion</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<?= $errors ?>
  </div>
</body>
</html>
