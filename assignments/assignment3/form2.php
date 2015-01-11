<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Mad Libs (2/5)</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
	<span id="otherPages"><h5>Please enter four proper nouns</h5></span>
  <div class="otherForms">
  <form action="form3.php">
	<input type="text" name="Pnoun1" placeholder="Proper Noun">&nbsp;<input type="text" name="Pnoun2" placeholder="Proper Noun"><br/><br/>
	<input type="text" name="Pnoun3" placeholder="Proper Noun">&nbsp; <input type="text" name="Pnoun4" placeholder="Proper Noun"><br/><br/>
	<input type="hidden" name="noun1" value="<?php echo $_GET['noun1'];?>" />
	<input type="hidden" name="noun2" value="<?php echo $_GET['noun2'];?>" />
	<input type="hidden" name="noun3" value="<?php echo $_GET['noun3'];?>" />
	<input type="hidden" name="noun4" value="<?php echo $_GET['noun4'];?>" />
		
	<span id="button"><input type="submit" value="Go to step 3" /></span>
	</form>
  </div>
</body>
</html>
