<?php

/* Designed and built by Gyan Prayaga for Thicket. */
/*

( )_ ( )     _        ( )           ( )_ 
| ,_)| |__  (_)   ___ | |/')    __  | ,_)
| |  |  _ `\| | /'___)| , <   /'__`\| |  
| |_ | | | || |( (___ | |\`\ (  ___/| |_ 
`\__)(_) (_)(_)`\____)(_) (_)`\____)`\__)

** Thicket was designed and built by Gyan Prayaga (gyan.biz) as a
** robust, compatible, and easy-to-deploy MVC framework for forums, 
** voting sites, personal bookmarking sites, and more. 
**
** Enjoy! 
**
*/

include_once('includes/engine/config.php');

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = preg_replace('/\\.[^.\\s]{3,4}$/', '', $root.$path);

$path = str_replace(url,'',$path);
if (!$path) {
$path = '/';
}

include './includes/engine/functions.php';

class AppView {
    function execute() {
	    global $path;
	    construct($path);
    } 
}

$AppRender = new AppView;
$AppRender->execute(); 
	
?>
