<?php 

/* FILE OVERVIEW:
*  functions.php is the PHP file with functions called by various rendering PHP files in OSH.	
*/

function construct(&$path) {
	if ($path == '/index' or $path == '/home' or $path == '/') {
		homeView();
	}
	else if ($path == '/about') {
		aboutView();
	}
	else if ($path == '/create') {
		createView();
	}
	else if ($path == '/login') {
		loginView();
	}
	else {
		errorView('404 Not Found', errorMessage);
	}
}

include 'views.php';

?>