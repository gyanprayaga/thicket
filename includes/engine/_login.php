<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <form action="?" method="POST">
			<form method='post' action='<?php echo(staticPath); ?>/engine/modules/form_process.php' class='login-form' novalidate>
			<p class='content__main__paragraph'>
				<label for='username' class='login-form__label'>Email address</label>
				<input id='username' name='username' class='login-form__input' autofocus type='email' required>
			</p>
			<p class='content__main__paragraph'>
				<label for='password' class='login-form__label'>Password</label>
				<input id='password' name='password' class='login-form__input' type='password' required>
			</p>
			<input class='login-form__submit' type='submit' value='Login'>
		</form>
		<div class="g-recaptcha" data-sitekey="6Lc-MwoTAAAAACy6tCOphPSj54PK7d_q93cjvndD"></div>
    </form>
  </body>
</html>