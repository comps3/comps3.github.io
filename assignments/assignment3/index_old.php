
<!DOCTYPE html>
	
	
<head>
	<?php

		$noun1 = "";
		$noun2 = "";
		$noun3 = "";
		$verb1 = "";
		$verb2 = "";
		
		$nouns;
		$verbs;
		
		$display = 0;

		if(isset ($_GET['noun1']) && isset ($_GET['noun2']) && isset ($_GET['noun3']) && isset ($_GET['verb1']) && isset ($_GET['verb2'])) 
		{
			$noun1 = $_GET['noun1'];
			$noun2 = $_GET['noun2'];
			$noun3 = $_GET['noun3'];
			$verb1 = $_GET['verb1'];
			$verb2 = $_GET['verb2'];
			
			$nouns = array($noun1,$noun2,$noun3);
			$verbs = array($verb1,$verb2);
			
			$display = 1;
		}

	?>
	
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Assignment 3 - Ad Libs</title>
  <meta name="description" content="">
  <meta name="author" content="Alexh_000">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
</head>

<body>
  <div id="wrapper">
  <center>
  	<h1>Welcome! Here you can pass the time with some fun Ad Libs. Enter the requisite nouns and verbs below, which will be plugged into stories.</h1>
    <span class='classRed'>
	    <form method="get" >
	    	Noun 1: <input type="text" name="noun1">

		    <br/>
		    <br/>
		
			Noun 2: <input type="text" name="noun2">

		    <br/>
		    <br/>
		    
		    Noun 3: <input type="text" name="noun3">


		    <br/>
		    <br/>
		    
		    
		    Verb 1 (Past Tense): <input type="text" name="verb1">

		    <br/>
		    <br/>
		    
		    Verb 2 (Past Tense): <input type="text" name="verb2">
	    	<br />
	   		
		     	
		    <br/>
		    <br/>
		 
			<input type="submit" value="Submit" class="classBlue">
			<br/>
		    <br/>
		    
		    <?php
		    	if($display == 1)
				{
					shuffle($nouns);
					shuffle($verbs);
		     		echo "<br/>The $nouns[0] $verbs[0] because the $nouns[1] $verbs[1] but not because of the $nouns[2]";
		     		echo "<br/><br/>";
				
					rsort($nouns);
					rsort($verbs);
					echo "<br/>It was a dark and stormy night. The full moon shone down upon the $nouns[0] as it $verbs[0] through the misty forest. Unknown to it however, 
					there was also a $nouns[1] on the prowl. It $verbs[1] swiftly, yet silently after the $nouns[1] . Will the $nouns[2] arrive in time to save the $nouns[0] from certain doom?";
		     		echo "<br/><br/>";
					
					sort($nouns);
					sort($verbs);
					echo "<br/>The detective frowned in thought as he considered the murder mystery that lay before him.
					Was the culprit Mr. $nouns[0] , who $verbs[0]? Was it Ms. $nouns[1]? After all, she had a motive: the victim $verbs[1], which annoyed her greatly.
					And where did the $nouns[0] fit into the evidence? What a mystery, what a quandary! Truly a worthy case for Hercule Poirot, detective extraodinaire.";
		     		echo "<br/><br/>";
					
					$verbs[] = "ran";
					$verbs[] = "panicked";
					$verbs[] = "walked";
					
					$nouns[] = "Cat";
					$nouns[] = "Dog";
					$nouns[] = "Mailman";
					$nouns[] = "Vampire";
					
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];

					echo "<br/>Once upon a time, a valiant $n";
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
					echo " set out to rescue the kingdom's princess from a vile dragon. Unfortunately, he had no sword and had to use his trusty";
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
					echo " $n instead, wielding it like a mace. And so our brave hero marched forth - when suddenly a ";
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
					echo " $n $r out in ambush from the foliage! Woe be to our hero, for ".$n."s are among the deadliest creatures in the seven kingdoms. ";
					
					
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
					echo "Our hero nervously $r, eyeing the enemy, conscious of sweat lacing his palms and loosening his grip on the makeshift dragon-slaying weapon.";
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
					echo "The newcomer $r in response, before vanishing in an abrupt gout of flame. Our hero looked up to find the source of the fire, and found none other than the dragon. What will happen next?";
					
		     		echo "<br/><br/>";
				
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";
		     		
		     		$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";
		     		
		     		$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";
		     		
		     		$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";
		     		
		     		$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";
					
					$n = $nouns[array_rand($nouns)];
		     		$r = $verbs[array_rand($verbs)];
		     		echo "<br/>The $n $r.<br/>";

				}
		     ?>
		    <br/>
		    <br/>
		 </form>
	 </span>
	 </center>
  </div>
</body>
</html>
