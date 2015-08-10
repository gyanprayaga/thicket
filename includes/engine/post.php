<?php

include_once('dbconnect.php');

$postId = dirname($postId);

$post_query = mysqli_query($link, "SELECT * FROM posts WHERE post_id='$postId'");

$i = 1;

session_start();

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
	$p_name = $therow['name'];
	$p_id = $therow['post_id'];
	$p_author = $therow['creator_id'];
	$p_ptype = $therow['content_type'];
	$p_url = $therow['url'];
	$p_date = $therow['date_created'];
	$p_description = $therow['description'];
	$p_genre = $therow['genre'];
	
	if (!$p_genre) { $p_genre = 'Misc'; }
	
	if ($p_ptype == 'video') {
		parse_str( parse_url( $p_url, PHP_URL_QUERY ), $url_stripped_id );
		$url_id_p = $url_stripped_id['v']; 	
	}
	
	// grabbing the upvotes for the post
	$getvotes = mysqli_query($link, "SELECT count(*) AS votes FROM upvotes WHERE post_id='".$p_id."'");
	$dataz=mysqli_fetch_assoc($getvotes);
	$votes = $dataz['votes'];
		
	$uid = $_SESSION['uid'];
	
	// checking if it's my own vote
	$getvotes_u = mysqli_query($link, "SELECT user_id FROM upvotes WHERE post_id='$p_id' AND user_id='$uid'");
	$upvote_exists = false;
	
}

if (!$p_name) {
	echo("<script>document.location.href ='".url."/404';</script>");
}

?>