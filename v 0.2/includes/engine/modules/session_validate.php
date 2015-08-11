<?php 

/* FILE OVERVIEW:
*  processes the form login or register through AJAX	
*/

include('../config.php');
include('../dbconnect.php');

if ($_POST['token'] == thicketToken) {
	session_start();
	
	// redirect if signed in
	if ($_SESSION['uid']) {
		echo $_SESSION['uid'];	
	}
	else {
		echo "false";
	}
}
else {
	echo "false";
}


?>