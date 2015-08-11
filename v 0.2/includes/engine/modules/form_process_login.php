<?php 

/* FILE OVERVIEW:
*  processes the form login or register through AJAX	
*/

include('../config.php');
include('../dbconnect.php');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// redirect if signed in
if ($_SESSION['name']) {
	header("Location: /");	
}

// login
else if ($username and $password) {
	$uid = mt_rand(1000000,10000000);
	$pwe = hash_hmac('sha512', 'salt' . $password, $_SERVER['site_key']);
	// echo $pwe;
    $login = mysqli_query($link, "SELECT * FROM users WHERE email='$username' AND password='$pwe'");

	while($therow = mysqli_fetch_array($login)) {
		if ($therow['password'] == $pwe) {
			// start the session
			$_SESSION['uid'] = $therow['user_id'];
			$_SESSION['upower'] = $therow['power'];
			$_SESSION['name'] = $therow['username'];
			$_SESSION['username'] = $therow['email'];
			header("Location: /");
		}
	}
	if (!$therow['password']) {
		header("Location: /login?error=The username and password do not match.");		
	}
	
}
else {
	header("Location: /login?error=Please fill out both fields to login.");
}


?>