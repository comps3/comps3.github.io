<!DOCTYPE html>
<head>
    
    <link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
    <link href="style.css" rel="stylesheet" type="text/css">
    
    <?php
    	//Sets variables
        $noun1 = ""; 
        $noun2 = "";
        $noun3 = "";
		$nouns4 = "";
		$Pnoun1 = "";
        $Pnoun2 = "";
        $Pnoun3 = "";
		$Pnoun4 = "";
        $verb1 = "";
        $verb2 = "";
		$verb3 = "";
		$verb4 = "";
		$adverb1 = "";
		$adjective1  = "";
		$adjective2 = "";
		$adjective3 = "";
		$adjective4 = "";
		$time1 = "";
		$time2 = "";
		$place1 = "";
		$place2 = "";
        $nouns;
        $Pnouns;
        $verbs;
		$adjectives;
		$time;
		$place;
        $display = 0;
		$fields_filled = false;
		
		//Places variables into various arrays
        if(isset ($_GET['noun1']) && isset ($_GET['noun2']) && isset ($_GET['noun3']) && isset ($_GET['noun4']) 
        && isset ($_GET['Pnoun1']) && isset ($_GET['Pnoun2']) && isset ($_GET['Pnoun3']) && isset ($_GET['Pnoun4']) 
        && isset ($_GET['verb1']) && isset ($_GET['verb2']) && isset ($_GET['verb3'])&& isset ($_GET['verb4'])
        && isset ($_GET['adjective1']) && isset ($_GET['adjective2']) && isset ($_GET['adjective3']) && isset ($_GET['adjective4'])
		&& isset ($_GET['time1']) && isset ($_GET['time2']) && isset ($_GET['place1']) && isset ($_GET['place2']) ){
            $noun1 = $_GET['noun1'];
            $noun2 = $_GET['noun2'];
            $noun3 = $_GET['noun3'];
			$noun4 = $_GET['noun4'];
			$Pnoun1 = $_GET['Pnoun1'];
            $Pnoun2 = $_GET['Pnoun2'];
            $Pnoun3 = $_GET['Pnoun3'];
            $Pnoun4 = $_GET['Pnoun4'];
            $verb1 = $_GET['verb1'];
            $verb2 = $_GET['verb2'];
			$verb3 = $_GET['verb3'];
            $verb4 = $_GET['verb4'];
			$adjective1 = $_GET['adjective1'];
            $adjective2 = $_GET['adjective2'];
            $adjective3 = $_GET['adjective3'];
			$adjective4 = $_GET['adjective4'];
			$time1 = $_GET['time1'];
            $time2 = $_GET['time2'];
			$place1 = $_GET['place1'];
            $place2 = $_GET['place2'];
			$adverb1 = $_GET['adverb'];
			$nouns = array($noun1,$noun2,$noun3,$noun4);
			
			$nouns[] = "Cat";
			$nouns[] = "Vampire";
			
			$Pnouns = array($Pnoun1,$Pnoun2,$Pnoun3,$Pnoun4);
            $verbs = array($verb1,$verb2,$verb3,$verb4);
            $adjectives = array($adjective1,$adjective2,$adjective3,$adjective4);
			$time = array($time1,$time2);
            $place = array($place1,$place2);
            $display = 1;
			$fields_filled = true;
        }
		else {
			// If the person does not enter all fields, let's provide a sample
			$display = 0;
			echo "<h3> Runaway Bride Proposal Mad Lib</h3>";
			echo "<p>Look, I gurantee there'll be well-known(Adjective) times. I guarantee that at some crack(Noun)
			, 3.51(Number) or both of us is gonna want to get out of this animal(Noun). But I also guarantee that if I don't ask you to
			be graceful(Adjective), I'll submerge(Verb) it for the rest of my poverty(Noun), because I know, in my windpipe(Body Part)
			, you're the Worried one for me.</p>"; 
			
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
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<center>
 	<a href="index.php">Start Over</a>
 	</center>
  <div id="wrapper">
 	
    <span class='classRed'>
    	<!-- Sets up the form to collect the variables -->
         
            <?php
                if($display == 1)
                {
                    shuffle($nouns); //Shuffles the nouns to provide unique response
                    shuffle($verbs);
					shuffle($adjectives);
					shuffle($Pnouns);
					//Begins the Madlibs
					
					// Randomly select one madlib for the reader
					$selection = rand(0, 8);
					
					if($selection == 0) 
					{
						echo "<h3>A Fool Moon</h3>";
	                    echo "<br/><p>It was a dark and stormy night. 
	                    The full moon shone down upon the $adjectives[0] $Pnouns[0] as it $verbs[0] through the misty forest. 
	                    Unbeknownst to $Pnouns[0] however,     there was also a $Pnouns[1] on the prowl. 
	                    It $verbs[1] swiftly, yet silently after the $adjectives[1] $nouns[1] . Will the $adjectives[2] 
	                    $Pnouns[2] arrive in time to save the $nouns[0] from certain doom?</p>";
	                    echo "<br/><br/>";
					}
					
					else if ($selection == 1) {
                    sort($nouns);
                    sort($verbs);
					sort($adjectives);
                    sort($Pnouns);
					echo "<h3>The Detectives Story</h3>";
                    echo "<br/><p>The detective frowned in thought as he considered the murder mystery that lay before him.
                    Was the culprit Mr. $Pnouns[0], who $adverb1 $verbs[0]? Was it Ms. $Pnouns[1]? After all, she had a motive: the victim $verbs[1], which annoyed her greatly.
                    And where did the $adjectives[1] $nouns[0] fit into the evidence? What a mystery, what a quandary! Truly a worthy case for Hercule Poirot, $adjectives[2] detective extraordinaire.</p>";
                    echo "<br/><br/>";
                    }
                    
                    else if ($selection == 2) {
                    echo "<h3>The Raven - Edgar Allen Poe</h3>";
                    echo "<br/><p>Once upon a midnight $adjectives[0], while I pondered $adjectives[1] and $adjectives[2],
                    Over many a quaint and curious $nouns[0] of forgotten $nouns[1]. While I $verbs[0], nearly napping, suddenly there came a $nouns[2], 
                    As of $nouns[3] gently rapping, rapping at my $place[1] door. ``Tis some $nouns[1],` I muttered, `tapping at my $place[1] door - Only this, and nothing more.`
                    Ah, distinctly I remember it was in the $adjectives[0] December, And each separate $verbs[3] ember wrought its $nouns[2] upon the floor. Eagerly I $verbs[0] the morrow;
                    - $adjectives[2] I had sought to borrow From my $nouns[1] surcease of sorrow - sorrow for the lost Lenore - For the $adjectives[0] and $adjectives[2] maiden 
                    whom the angels named $Pnouns[3] - Nameless here for evermore. </p><br/><br/>";
					}

					else if ($selection == 3) {
                    echo "<h3>Thriller - Micheal Jackson</h3>";
                    echo "<br/><p>It`s close to $time[0] and something $adjectives[0] lurking in the $nouns[2] 
                    Under the $nouns[1] light you see a sight that almost $verbs[3]s your heart 
                    You try to $verbs[2] but $nouns[0] takes the $nouns[1] before you make it You start to freeze 
                    as horror $verbs[1] you right between the bodyparts, You're $verbs[0] cause this is $adjectives[2], 
                    $adjectives[2] night And no ones gonna save you from the $Pnouns[2] about to $verbs[0] 
                    You know its $adjectives[3], $adjectives[1] night You`re $verbs[1] ing for your $nouns[3] inside a killer, 
                    $adjectives[0] tonight.</p> <br/><br/>";
                    }
                    
					else if ($selection == 4) { 
                    echo "<h3>Yesterday - Beetles</h3>";
                    echo "<br/><p>Yesterday, all my $nouns[0] seemed so $adjectives[0] 
                    Now it $verbs[3] as though theyre here to $verbs[2] Oh, I $verbs[1] in yesterday. $Pnouns[1], 
                    Im not half the $nouns[2] I used to be, There`s a $nouns[1] $verbs[1] over me. 
                    Oh, yesterday came $Pnouns[1] . Why she had to $verbs[0] I don`t know she wouldn`t $verbs[1]. 
                    I said something $adjectives[2], now I long for yesterday. Yesterday, love was such an $adjectives[1] $nouns[1] 
                    to play. Now I need a $nouns[0] to $verbs[1] away. Oh, I $verbs[2] in yesterday. </p><br/><br/>"; 
                    }
                    
                    else if ($selection == 5) {
                    echo "<h3>Romeo & Juliet - Shakespear</h3>";
                    echo "<br/><p>Two $nouns[2]s, both alike in dignity, in fair $place[0], where we lay our scene, 
                    From ancient $nouns[1] break to new mutiny, Where civil blood makes civil hands unclean. 
                    From forth the fatal loins of these two foes A pair of star-cross`d $nouns[0] take their life; 
                    Whole misadventured piteous overthrows Do with their $nouns[2] bury their parents` strife. 
                    The fearful passage of their $adjectives[3] love, And the continuance of their parents` rage, Which, 
                    but their children`s end, nought could $verbs[2], Is now the $nouns[2] hours` traffic of our stage; 
                    The which if you with $adjectives[2] $Pnouns[0] attend, What here shall $verbs[3], our toil shall strive to mend. </p><br/><br/>"; 
					}
					
					else if ($selection == 6) {
					echo "<h3>What Does the ... </h3>";
                    echo "<br/><p>The $Pnouns[0] $verbs[0] because $Pnouns[1]  $verbs[1] the 
                    $adjectives[0] $adjectives[1] $nouns[1] but not because of the 
                    $adjectives[2] $nouns[2]</p>";
                    echo "<br/><br/>";
                    }
                    
                    else if ($selection == 7) {
                    	echo "<h3>Be Kind... </h3>";
                    	echo "<p>Be kind to your $nouns[0]-footed $nouns[1] <br>
                    	For a duck may be somebody's $nouns[2] <br>
                    	Be kind to your $nouns[1] in $place[0] <br>
                    	Where the weather is always $adjectives[0] <br>
                    	You may think that is the $nouns[3]...<br>
            			Well it is.<p>";
                    					
                    }
                    
				    else if($selection == 8) {
				    	echo "<h3> Driving Tips </h3>";
						echo "<p>Driving to $place[0] can be fun if you follow this $adjectives[0] advice: <br>
						When approaching a $nouns[0] on the right, always blow your $nouns[1] <br>
						Before making a $adjectives[1] turn, always stick your $nouns[2] out of the window <br>
						Every 2000 miles, have your $nouns[3] inspected <br>
						When approaching a school, watch out for $adjectives[2] $Pnouns[0].
						Above all, drive $adverb1. The person you save may know you!";
				    }				
                   
                   if ($fields_filled == true) 
                   {
                   	echo "<br/><br/><br/><h3> Randomness: </h3>";
                    rsort($nouns);
                    rsort($verbs);
					$n = $nouns[array_rand($nouns)];
					$Pn = $Pnouns[array_rand($Pnouns)];
                    $r = $verbs[array_rand($verbs)];
                	$a = $adjectives[array_rand($adjectives)];
					echo "<p>The $a $n $r.</p>"; 
                    $n = $nouns[array_rand($nouns)];
					$Pn = $Pnouns[array_rand($Pnouns)];
                    $r = $verbs[array_rand($verbs)];
                	$a = $adjectives[array_rand($adjectives)];
					echo "<p>The $a $n $r.</p>";
                    $n = $nouns[array_rand($nouns)];
					$Pn = $Pnouns[array_rand($Pnouns)];
                    $r = $verbs[array_rand($verbs)];
                	$a = $adjectives[array_rand($adjectives)];
					echo "<p>The $a $n $r.</p>";
                    $n = $nouns[array_rand($nouns)];
					$Pn = $Pnouns[array_rand($Pnouns)];
                    $r = $verbs[array_rand($verbs)];
                	$a = $adjectives[array_rand($adjectives)];
					echo "<p>The $a $n $r.</p>";
					}
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


