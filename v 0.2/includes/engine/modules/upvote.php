<?php 

$u_id = $_POST['user_id'];
$p_id = $_POST['post_id'];
$site_token = $_POST['token'];

include('../config.php');

if (($site_token == thicketToken) and $u_id and $p_id) {
	include('../dbconnect.php');	
	
	// count if ive posted on this before
	$getvotes = mysqli_query($link, "SELECT count(*) AS votes FROM upvotes WHERE post_id='".$p_id."' AND user_id='".$u_id."'");
	$dataz=mysqli_fetch_assoc($getvotes);
	$votes = $dataz['votes'];
	
	if ($votes < 1) {
	mysqli_query($link, "INSERT INTO upvotes (post_id, user_id) VALUES('".$p_id."','".$u_id."')");
	
	// finding total votes
	$totalvotes = mysqli_query($link, "SELECT count(*) AS votes FROM upvotes WHERE post_id='".$p_id."'");
	$datav=mysqli_fetch_assoc($totalvotes);
	$tvotes = $datav['votes'];
	echo($tvotes);
	}
	else {
	echo('same') ;
	}	
}
else {
	echo "false";
}



?>