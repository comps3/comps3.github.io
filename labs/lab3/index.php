

<!DOCTYPE html>
<style>
	.header {
		background-color: #FF6600;
		width: 100%;
		height: 450px;

	}
	body {
		margin: 0px;
		padding: 0px;
	}
	form {
		text-align:center;
	}
	h1 {
		padding-top:200px;
		text-align:center;
	}
</style>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Brian H.</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>


    <div class = "header">
    	<!-- Get is a default method -->
      <h1> Length Converter </h1>
      <form>
      	<br />
      	<br />
      	<br />
      	Enter Inches: <input type="text" name="in" />
      	<br />
      	<br />
      	Convert To:
      	<input type="radio" value="cm" name="convert"/> Centimeters
      	<input type="radio" value="yd" name="convert" /> Yards
      	<input type= "radio" value="ft" name="convert" /> Feet
      	<input type="submit" value="Convert" />
      
      <p>	
      <? 
      $errors
	  ?>
	  </p>
      	
      </form>
      
      
    </div>



</body>
</html>

<?php


	
$errors = "";

$result = 0;

if(isset($_GET['in'])) {
		
	$in = $_GET['in'];
	
	if (is_numeric($in)) {
		//echo $cm;
		$centimeters = $in * 2.54;
		$unit = $_GET['convert'];
		switch ($unit) {
			case 'cm':
				$result = $in * 2.54;
				echo " Inches: ". $in . " Centimeters: ". $result;
				break;
			case 'yd':
				$result = $in *3;
				echo " Inches: ". $in . " Yards: ". $result;
				break;
			case 'ft':
				$result = $in * 4;
				echo " Inches: ". $in . " Feet: ". $result;
				break;
			default:
				echo "Not sure bro!";
				break;
			
		}
		
	}
	else {
		$errors = "You must enter a number!";
	}
}



else {
	$errors = "No value was passed.";
}

return $errors;


?>