<?php

/* Designed and built by Gyan Prayaga @ Jujube for Open Source High. */

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = preg_replace('/\\.[^.\\s]{3,4}$/', '', $path);

include './includes/engine/functions.php';

/* build the DOM with class ;) */
class AppView {
    function execute() {
	    global $path;
	    construct($path);
    } 
}

/* render the app */
$AppRender = new AppView;
$AppRender->execute(); 
	
?>