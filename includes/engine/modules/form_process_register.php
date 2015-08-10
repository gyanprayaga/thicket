<?php 

/* FILE OVERVIEW:
*  processes the form login or register through AJAX	
*/

include('../config.php');
include('../dbconnect.php');

// grabbing the data by POST
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$user_exists = false;

// registration
if ($name and $username and $password) {
	$uid = mt_rand(1000000,10000000);
	$pwe = hash_hmac('sha512', 'salt' . $password, $_SERVER['site_key']);
	
	// check if user already exists
	$login = mysqli_query($link, "SELECT * FROM users WHERE email='$username'");
	while($therow = mysqli_fetch_array($login)) {
		if ($username == $therow['email']) {
			$user_exists = true;
		}
	}
	
	if (!$user_exists) {
		// register
		
		if ($username == adminEmail) {
			$upower = 'admin';
		}
		else {
			$upower = 'user';
		}
		
		$create = mysqli_query($link, "INSERT INTO users (user_id,username,email,password,power) VALUES ('$uid','$name','$username','$pwe','$upower')");
		echo "success";
	}
	else {
		echo "user exists";
	}
		
}
else {
	echo "missing data";
}


?>