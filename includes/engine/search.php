<?php

include_once('dbconnect.php');

if (!$search_query || $search_query == ' ') {
	echo "<script>location.href='/'</script>";
}

$post_query = mysqli_query($link, "SELECT * FROM posts WHERE name LIKE '%" . $search_query . "%' OR description LIKE '%" . $search_query . "%' OR genre LIKE '%" . $search_query ."%'");

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


	if ($i == 1) {
		echo "<li class='first'>";	
	}
	else {
		echo "<li>";
	}
	
	// $ptype = 'callback'; use for debugging post view
	
	if ($ptype == 'video') {
		parse_str( parse_url( $url, PHP_URL_QUERY ), $url_stripped_id );
		$url_id = $url_stripped_id['v'];    		
		echo "<span class='video_thumb'><img src='https://i.ytimg.com/vi/$url_id/hqdefault.jpg' alt='Video thumbnail'></span><span class='rest_of_content'><input type='hidden' value='$url_id' class='url_id_holder'><a class='content_trigger' href='$url' target='_blank'>";
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

if (!$name) {
	echo "<h3>Sorry, no results for $search_query.</h3>";
}


?>