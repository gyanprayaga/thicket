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
$name = $_POST['Title'];
$url = $_POST['Project'];
$description = $_POST['Project_Message'];
$category = $_POST['Category'];

// rand string generator
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// registration
if ($name and $url and $description and $category and $logged_in_state) {
	$add = mysqli_query($link, "INSERT INTO posts (post_id,name,url,content_type,creator_id,date_created,description, genre) VALUES ('".generateRandomString()."','$name','$url','video','".$_SESSION['uid']."','".time()."','$description', '$category')");
	if ($add) {
		header("Location: ".url);
	}
	else {
		header("Location: /create?error=The post could not be added.");	
	}
}
else {
	header("Location: /create?error=Complete all fields before submitting the post.");
}


?>