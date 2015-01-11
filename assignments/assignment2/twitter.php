<style>
	.positive {
		background-color:rgba(51, 102, 0, 0.8);
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
		display: inline-block;
	}
	.negative{
		background-color:rgba(242, 36, 36, 0.5);
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
		display: inline-block;
	}
	.undecided {
		background-color:rgba(0, 0, 0, 0.8);
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
		display: inline-block;
	}
	.background {
		position: relative;
		display: inline-block;
	}
	table {
		padding-top:125px;
	}
	td {
		padding: 5px;
	}
	
</style>

<?php
require_once 'lib/twitteroauth.php';
 
define('CONSUMER_KEY', 'jqQwSVkcDB80wYvklgkiUYs52');
define('CONSUMER_SECRET', 'Ni2tc9lVCOaoC7jcU02pWpzBGxUElehxNHK2eMikGwimUaMDtJ');
define('ACCESS_TOKEN', '464381492-kq5NsFrY5V4Gk4JKSWYjQPk6ETIKzcqiguYn24v1');
define('ACCESS_TOKEN_SECRET', 'VTwrj5Qv9paPbIQXjAZyqTaKSeNTXm1GulP4ElIpHjUYA');
 
function search(array $query)
{
  $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  return $toa->get('search/tweets', $query);
}
 
$query = array(
  "q" => $_POST['hashtag'],
  // Twitter only allows a maximum of 100 results
  "count" => 97,
  "result_type" => "mixed",
  "lang" => "en",
);
  
$results = search($query);

$found = false;
$control = 0;
$positive_words = array("records", "record", "breaking" , "waiting", "diehards",
"converts", "preorder", "pre order", "broke", "order", "reserved", "trade", "expecting", "switch",
 "anxiously");
$negative_words = array("upset", "slug", "lost","sucks", "suck", "problems",  );

// Attempted to seperate the css code into its own file but positive class style did not appear.

	echo "<table border = 0; align = 'center';>";
		
			foreach($results->statuses as $result) {
					
				if ($control == 0 || $control % 10 == 0)
				{
					echo "<tr>";
				}
				
				$found = false;
			
				echo "<td>";
				echo "<div class = background>";
				echo "<img src=". $result->user->profile_image_url .">";
				
			foreach($negative_words as $word) {
					
				if(strpos($result->text, $word)) {
		 			echo "<div class = negative>";
 					echo "</div>";
					$found = true;
					break;
		 		}
			}
				
			foreach ($positive_words as $word) {
				
				if(strpos($result->text, $word) && $found == FALSE) {
		 		echo "<div class = positive>";
 				echo "</div>";
				$found = true;
				break;
				}
			}
	
				if($found == FALSE) {
					echo "<div class = undecided>";
 					echo "</div>";
				}
				
				echo "</td>";
				
				$control++;
				
				if ($control % 10 == 0 && $control != 0) {
					echo "</tr>";
					$control = 0;
				}
				
			}
		
				echo "</table>";
				echo "<br>";
?>