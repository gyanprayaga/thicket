<?php 

/* FILE OVERVIEW:
*  processes the form login or register through AJAX	
*/

include('../config.php');
include('../dbconnect.php');

session_start();
if ($_SESSION['name']) {
	$logged_in_state = true;
}
else {
	$logged_in_state = false;
}

// grabbing the data by POST
$post_id = $_POST['post_id'];

// registration
if ($post_id and $logged_in_state) {
	$delete = mysqli_query($link, "DELETE FROM posts WHERE post_id='$post_id'");
	if ($delete) {
		echo("true");
	}
	else {
		echo("false");
	}
}
else {
	echo("false");
}


?>