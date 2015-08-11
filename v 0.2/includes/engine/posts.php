<?php

include_once('dbconnect.php');

session_start();

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
	
	// grabbing the upvotes for the post
	$getvotes = mysqli_query($link, "SELECT count(*) AS votes FROM upvotes WHERE post_id='".$id."'");
	$dataz=mysqli_fetch_assoc($getvotes);
	$votes = $dataz['votes'];
		
	$uid = $_SESSION['uid'];
	
	// checking if it's my own vote
	$getvotes_u = mysqli_query($link, "SELECT user_id FROM upvotes WHERE post_id='$id' AND user_id='$uid'");
	$upvote_exists = false;

	if ($i == 1) {
		echo "<li class='first'>";	
	}
	else {
		echo "<li>";
	}
	
	
	while($therow_u = mysqli_fetch_array($getvotes_u)) {
		if ($uid == $therow_u['user_id']) {
			echo "<button class='upvote voted' id='$id'>$votes</button>";			
		}
		$upvote_exists = true;
	}
	
	if (!$upvote_exists) {
		echo "<button class='upvote' id='$id'>$votes</button>";						
	}


	// $ptype = 'callback'; use for debugging post view
	
	if ($ptype == 'video') {
		parse_str( parse_url( $url, PHP_URL_QUERY ), $url_stripped_id );
		$url_id = $url_stripped_id['v'];   
		
		// checking the images
		if ($url_id) {
		$gen_url_id = "http://i.embed.ly/1/image/crop?url=https://i.ytimg.com/vi/$url_id/hqdefault.jpg&key=f27c110ee1394ea4910456d12759ac9e&width=90&height=51";
		}
		else {
			$gen_url_id = "https://placeholdit.imgix.net/~text?txtsize=18&&bg=B2D126&txtclr=D12826&txt=$name&w=115&h=65";
		}
		

		// OPTIMIZE SCRIPT DOESNT WORK RIGHT NOW SO JUST PIGGYBACKING OFF EMBEDLY >>>>
		// $c_settings = array('w'=>300, 'h'=>300, 'compress'=>true);

		echo "<span class='video_thumb'><img src='$gen_url_id' border='0' alt='Video thumbnail'></span><span class='rest_of_content'><input type='hidden' value='$url_id' class='url_id_holder'><a class='content_trigger' href='$url' target='_blank'>";
	}	
	else if ($ptype == 'callback') {
		echo "<span class='rest_of_content reg'><a href='".url."/posts/$id'>";		
	}
	else {
		echo "<span class='rest_of_content reg'><a href='$url' target='_blank'>";
	}
		
	$sep_post_id = preg_replace("/[^\w]+/", "-", $name);
	$sep_post_id = strtolower($sep_post_id);

	echo "<h3>$name</h3></a><p class='date'>".ago($date)."</p><p class='comment_count'><a href='".url."/posts/$id/$sep_post_id'>View post</a></p><p class='genre collapse-mobile'><a href='".url."/search?q=$genre'>$genre</a></p><input class='spaceid' type='hidden' value='$id'></span></li>";
	
	$i++;

}


?>