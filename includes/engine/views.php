<?php
	
// this is the rendering file, it creates the DOM based on the conditions

include('config.php');
		
// HOME VIEW
function homeView() {
	$render = 'home';
	renderHeader($render);
	include_once('_'.$render.'.php');
}

function aboutView() {
	$render = 'about';
	renderHeader($render);
	include_once('_'.$render.'.php');
}

function createView() {
	$render = 'create';
	renderHeader($render);
	include_once('_'.$render.'.php');
}

function loginView() {
	$render = 'login';
	include_once('_'.$render.'.php');
}

function errorView($errorTitle, $errorMessage) {
	$render = '404';
	$documentTitle = $errorTitle;
	$documentMessage = $errorMessage;
	$websiteTitle = name;
	include_once('_'.$render.'.php');
}

function renderHeader($location) {
	// listing variables called in header file
	$titleSeparator = true;
	if ($location == 'home') {
		$titleSeparator = false;
	}
	$documentTitle = ucfirst($location);
	$websiteTitle = name;

	include_once('_header.php');
}

function renderSpecificScripts($location) {}

function renderFooter($location) {}



?>