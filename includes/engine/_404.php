<?php session_start(); 
	
	if ($location == 'login') {
		if ($_SESSION['username']) {
		header("Location: /");	
		}	
	}
	
?>
<html>
	<head>
		<title><?php echo($documentTitle); ?> / <?php echo($websiteTitle); ?></title>
		<link rel='stylesheet' href='<?php echo(url.staticPath); ?>/css/style.php'>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
	</head>
	<body class="404 error">
		<?php include_once('_header_bar_only.php'); ?>
		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_home'>
					<section class='content__main'>
						<p class='content__main__lead error_header'>404 Not Found</p>
					</section>
					<section class='content__info'>
						<div class='content__info__main error_paragraph not_found' id='main'>
							<?php echo $documentMessage; ?>
						</div>
					</section>
				</div>
	      	<?php include_once('_footer.php'); ?>
	</body>
</html>