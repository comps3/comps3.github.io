<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css">
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Mad Libs</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
	<h3>Welcome to Madlibs!</h3>
	<h5>Here you can pass the time with some fun Ad Libs. Enter the requisite nouns and verbs below, which will be plugged into stories</h5>
  <div class="form">
		<form action="form2.php">
			<input type="text" name="noun1" placeholder="Noun"> &nbsp; <input type="text" name="noun2" placeholder="Noun"><br /><br />
			<input type="text" name="noun3" placeholder="Noun"> &nbsp; <input type="text" name="noun4" placeholder="Noun"><br /><br />
			<span id="button"><input type="submit" value="Go to Step 2"><a href="results.php"></span>
		</form>
  </div>
</body>
</html>
