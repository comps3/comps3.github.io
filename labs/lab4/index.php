<style>
	table {
		margin-left:auto;
		margin-right: auto;
	}
	td {
		background-color:#0099FF;
	}
	th {
		background-color:#0000FF;
	}
	body {
		background-color:#669999;
	}
	h1 {
		text-align:center;
		color: #FFFFFF;
	}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>index</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<h1> PHP Array Functions </h1>
	<table border ="1">
		<tr>
			<th>Code</th>
			<th>Description</th>
			<th>Output</th>
		</tr>
		<tr>
			<td>$states = array("AZ", "CA", "IL", "IN", "NY");</td>
			<td>Initializes array with five states</td>
			<td>
			<?php
				$states = array("AZ", "CA", "IL", "IN", "NY");
			?>
				
			</td>
		</tr>
		<tr>
			<td>echo count($states);</td>
			<td>Displays array size</td>
			<td>
			<?php
				echo count($states);
			?>
			</td>
		</tr>
		<tr>
			<td>foreach($state_array as $state) {
			echo $state }  
			</td>
			<td>//deletes the second index ("IL"). It doesn't REINDEX items.</td>
			<td>
			<?
			foreach($states as $state) {
				
			echo $state. " "; 
			}  

			?>
			</td>
		</tr>
			<tr>
			<td>print_r($states); </td>
			<td>Displays array content</td>
			<td>
			<?
				print_r($states); 
			?>
			</td>
		    </tr>
		    
		    
		    <tr>
			<td>array_rand($arrayName)  </td>
			<td>Displays a random array index</td>
			<td>
			<?
				echo array_rand($states);
			?>
			</td>
		    </tr>
		    
		    <tr>
			<td>rsort($arrayName)   </td>
			<td>Reverses order for array</td>
			<td>
			<?
			rsort($states);
			foreach($states as $state) {
				
				echo $state; 
				}  
				
			?>
			</td>
		    </tr>
		    
		    <tr>
			<td>array_sum($arrayName)   </td>
			<td>Gets the sum of the array</td>
			<td>
			<?
			echo array_sum($states);  
		
			?>
			</td>
		    </tr>
		    
		   	<tr>
			<td>is_array($arrayName)    </td>
			<td>Checks if its an array</td>
			<td>
			<?
			echo is_array($states);
		
			?>
			</td>
		    </tr>
		    
		   	<tr>
			<td>$states[] = "HI"</td>
			<td>Adds an element into the array</td>
			<td>
			<?
			$states[] = "HI";
			foreach($states as $state) {
			echo $state. " "; 
			} 
			?>
			</td>
		    </tr>
		    
		    
	</table>
	
  </div>
</body>
</html>
