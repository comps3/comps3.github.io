<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 <link href="style.css" rel="stylesheet" type="text/css">
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Mad Libs (5/5)</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div class="form">
  	<form action="results.php">
	<input type="text" name="time1" placeholder="Time">&nbsp;<input type="text" name="time2" placeholder="Time"><br/><br/>
	<input type="text" name="place1" placeholder="Place">&nbsp; <input type="text" name="place2" placeholder="Place"><br/><br/>
	
	<input type="hidden" name="noun1" value="<?php echo $_GET['noun1'];?>" />
	<input type="hidden" name="noun2" value="<?php echo $_GET['noun2'];?>" />
	<input type="hidden" name="noun3" value="<?php echo $_GET['noun3'];?>" />
	<input type="hidden" name="noun4" value="<?php echo $_GET['noun4'];?>" />
   	<input type="hidden" name="Pnoun1" value="<?php echo $_GET['Pnoun1'];?>" />
	<input type="hidden" name="Pnoun2" value="<?php echo $_GET['Pnoun2'];?>" />
	<input type="hidden" name="Pnoun3" value="<?php echo $_GET['Pnoun3'];?>" />
	<input type="hidden" name="Pnoun4" value="<?php echo $_GET['Pnoun4'];?>" />
	<input type="hidden" name="verb1" value="<?php echo $_GET['verb1'];?>" />
	<input type="hidden" name="verb2" value="<?php echo $_GET['verb2'];?>" />
	<input type="hidden" name="verb3" value="<?php echo $_GET['verb3'];?>" />
	<input type="hidden" name="verb4" value="<?php echo $_GET['verb4'];?>" />
	<input type="hidden" name="adverb" value="<?php echo $_GET['adverb'];?>" />
	<input type="hidden" name="adjective1" value="<?php echo $_GET['adjective1'];?>" />
	<input type="hidden" name="adjective2" value="<?php echo $_GET['adjective2'];?>" />
	<input type="hidden" name="adjective3" value="<?php echo $_GET['adjective3'];?>" />
	<input type="hidden" name="adjective4" value="<?php echo $_GET['adjective4'];?>" />
	<input type="submit" value="Let funnies happen!" />
	</form>
  </div>
</body>
</html>
