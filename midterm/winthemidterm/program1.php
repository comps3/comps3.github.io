<?php
	

  function displayTable($row, $col)
	{
		echo "<table align = 'center';>";
		
		$letter = null;
		$letters = array();
		$colors = array();
		$count = 0;
		$temp1 = null;
		$include1 = null;
		$include2 = null;
		
		if(isset($_GET['conference']))
		{
			$include1 = $_GET['conference'];
		
		}
		
		if(isset($_GET['conference1']))
		{
			$include2 = $_GET['conference1'];
		
		}
		// Fill the letters captain!
		
		for($i = 0; $i < $row; $i++) {
			for($j = 0; $j < $row; $j++) {
				$temp1 = chr(rand(65, 90));
				$colors[] = ord($temp1);
				$letters[] = $temp1;
				
			}
		}
		
		$letters[0] = $include1;
		
		for($i = 1; $i <= $row; $i++)
		{
			echo "<tr>";
			for($j = 1; $j <= $col; $j++) {
					
				
				if($colors[$count] < 72) {
					echo "<td style=color:red>" . $letters[$count] . "</td>";
				}
				else if($colors[$count] > 71 && $colors[$count] <= 80)
				{
					echo "<td style=color:blue>" . $letters[$count] . "</td>";
				}
				else if($colors[$count] > 80) {
					
					echo "<td style=color:green>" . $letters[$count] . "</td>";
				}

				$count++;
			}
			echo "</tr>";
		}
		echo "</table>";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>program1</title>
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
	1. Select a letter to find: 	
	<select name="conference">
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
		<option value="F">F</option>
	</select>
	<br />
	
	2. Select the number of letters to display: <br />
	<input type="radio" name="division" value="6">36
	<input type="radio" name="division" value="7" >49
	<input type="radio" name="division" value="8">64
	<input type="radio" name="division" value="9">81
	<input type="radio" name="division" value="10">100
	
	<br />
	3. Select a letter to exclude:
		<select name="conference1">
		<option value="V">V</option>
		<option value="W">W</option>
		<option value="X">X</option>
		<option value="Y">Y</option>
		<option value="Z">Z</option>
	</select>
	
	<input type="submit" value="Find letters!">
	
	</form>
	<br />
	<hr />

	<?php
	
	$size = 0;
	
		  if(isset($_GET['conference']))
			{
			$conference = $_GET['conference'];
			echo "Find the letter ". $conference;
			}
  			
			if(isset($_GET['division']))
			{
			$size = $_GET['division'];
			}
			
			displayTable($size, $size);
  			
	
	?>
	
	<br />
	<br />
	<br />
	
	  
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The page includes the basic form elements as in the Program Sample: Dropdown menus, radio buttons, submit button</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>When submitting the form, a "Find the Letter x" header is displayed, where "x" is the letter selected by the user</td>
      <td width="20" align="center">10</td>
    </tr> 
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>When submitting the form, a table is created and filled with random letters</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>4</td>
      <td>The size of the table corresponds to the one selected by the user </td>
      <td align="center">10</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
       <td>5</td>
       <td>The letter selected by the user is shown only once</td>
       <td align="center">10</td>
     </tr> 
 <tr style="background-color:#FFC0C0">
       <td>6</td>
       <td>The "letter to exclude" is not shown within the table</td>
       <td align="center">10</td>
     </tr> 
      <tr style="background-color:#99E999">
       <td>7</td>
       <td>The letters are shown in the right colors: red, blue, and green </td>
       <td align="center">10</td>
     </tr> 
      <tr style="background-color:#FFC0C0">
       <td>8</td>
       <td>At least five CSS rules are included</td>
       <td align="center">5</td>
     </tr>           
     <tr style="background-color:#99E999">
      <td>9</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b>47</td>
    </tr> 
  </tbody></table>
  
  	<br />
	<br />
	<br />

	
  </div>
</body>
</html>
