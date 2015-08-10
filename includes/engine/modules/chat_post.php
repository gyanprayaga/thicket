<?php
	
include('../config.php');
include('../dbconnect.php');

// sending chat messages to server

$sender = $_POST["sender"];
$content = str_replace("'", "&#39;", $_POST["content"]);
$content = strip_tags($content);
$location = $_POST["location"];
$time = $_POST["time"];

$query = mysqli_query($link, "INSERT INTO chat_messages (content, sender, location, time, new) VALUES ('$content','$sender','$location','$time','1')");

if (!$query) {
    die("error");
}
else {
    echo("success");
}
	
?>