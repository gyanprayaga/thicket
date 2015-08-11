<?php

include_once('dbconnect.php');

$post_query = mysqli_query($link, "SELECT * FROM posts ORDER BY date_created desc");

$i = 1;

function ago($time)
{
   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }

   return "$difference $periods[$j] ago";
}

while($therow = mysqli_fetch_array($post_query)) {

	$name = $therow['name'];
	$id = $therow['post_id'];
	$author = $therow['creator_id'];
	$ptype = $therow['content_type'];
	$url = $therow['url'];
	$date = $therow['date_created'];
	$description = $therow['description'];
	$genre = $therow['genre'];
	
	if (!$genre) { $genre = 'Misc'; }
	
	echo "<span class='rest_of_content reg' id='$id'><a href='$url' target='_blank'>";
		
	$sep_post_id = preg_replace("/[^\w]+/", "-", $name);
	$sep_post_id = strtolower($sep_post_id);

	echo "<h3>$name</h3></a><p class='date'>".ago($date)."</p><p class='comment_count'><a href='".url."/posts/$id/$sep_post_id'>View post</a></p><input class='spaceid' type='hidden' value='$id'></span></li>";
	
	$i++;

}


?>