<?php
$debug = false;
$link = @mysqli_connect(databasePort, databaseUser, databasePassword, database);
if (!$link) {
    die('<p class=error_paragraph>Sorry, but this page is unable to connect to the database at '.name.'. Please try again later.</p>');
    if ($debug) {
    	die(mysqli_error());
    }
}
?>