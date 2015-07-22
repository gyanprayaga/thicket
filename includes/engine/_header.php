<html>
	<head>
		<title><?php 
				if ($titleSeparator) echo $documentTitle." ".titleSeparator." ";
				echo($websiteTitle); 
			?></title>
		<link rel='stylesheet' href='<?php echo(url.staticPath); ?>/css/style.css'>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
	</head>
	<body>
		<?php include_once('_header_bar_only.php'); ?>