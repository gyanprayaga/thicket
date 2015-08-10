<?php
	
include('../config.php');
include('../dbconnect.php');

// sending chat messages to server

$time = $_GET["time"];

$query = mysqli_query($link, "SELECT content, sender FROM chat_messages");

while($therow = mysqli_fetch_array($query)) {
	$m_content = $therow['content'];
	$s_content = $therow['sender'];
	
	echo("<span class=chat__message><span class=chat__message__sender>$s_content</span><span class=chat__message__text>$m_content</span></span>");
}

if (!$query) {
    die("error");
}
else {
    // echo("success");
}
	
?>