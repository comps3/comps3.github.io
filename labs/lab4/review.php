

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>review</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
  	<form>
		Enter your name: <input type="text" name="in"/>
		Enter your state: 
		<select name="states[]" size="7" multiple>
			<option value="AK">Alaska</option>
			<option value="CA">California</option>
			<option value="UT">Utah</option>
			<option value="NV">Nevada</option>
			<option value="TX">Texas</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
		</select>
		<input type="checkbox" name= 'states[]' value="OR"/>Oregon
		<input type="checkbox" name= 'states[]' value="WA"/>Washington
		<input type="checkbox" name= 'states[]' value="ND"/>North Dakota
		<input type="submit" value="Submit">
	
	</form>
  </div>
</body>

</html>

<?php
if(isset($_GET['in'])) {
	$userName = $_GET['in'];
	echo "Hello " . $userName. "<br>";
}

	if (isset($_GET['in'])) {
		$state_array = $_GET['states'];
	foreach($state_array as $state) {
		echo $state . "<br>";
	}
  }
?>