<?php
	
// this is the rendering file, it creates the DOM based on the conditions

session_start();

include('config.php');
		
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
	renderHeader($render);
	include_once('_'.$render.'.php');
}

function searchView() {
	$render = 'search';
	renderHeader($render);
	include_once('_'.$render.'.php');
}

function postView($postIdString) {
	$postId = str_replace("/posts/", "", $postIdString);
	if (!$postId or $postId == '') {
		header("Location: ".url);
	}
	else {
		$render = 'post';
		renderHeader($render);
		include_once('post.php');
		include_once('_'.$render.'.php');
	}
}

function errorView($errorTitle, $errorMessage) {
	$render = '404';
	$documentTitle = $errorTitle;
	$documentMessage = $errorMessage;
	$websiteTitle = name;
	include_once('_'.$render.'.php');
}

function adminView() {
	if ($_SESSION['upower'] == 'admin') {
		$render = 'admin';
		renderHeader($render);
		include_once('_'.$render.'.php');		
	}
	else {
		header("Location: /");	
	}
}

function adminDashboardView() {
	if ($_SESSION['upower'] == 'admin') {
		$render = 'dashboard';
		renderHeader($render);
		include_once('_'.$render.'.php');		
	}
	else {
		header("Location: /");	
	}
}

function logout() {
	session_destroy();
	header("Location: /");
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