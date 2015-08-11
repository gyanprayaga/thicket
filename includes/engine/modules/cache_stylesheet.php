<?php

/* instead of reloading the stylesheet each time, just convert it to CSS and cache it */

include('../config.php');

$image = file_get_contents(url.staticPath.'/css/style.php');

file_put_contents('style.css',$image);

?>
