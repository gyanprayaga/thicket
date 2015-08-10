
		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_home'>
					<section class='content__main content__main--split content__main--left'>
						<header class='content__main__header'>Login</header>
						<form method='post' action='<?php echo(url.staticPath); ?>/engine/modules/form_process_login.php' class='login-form' novalidate>
							<p class='content__main__paragraph'>
							<?php if ($error = $_GET['error']) {echo "<p class='text_error' style='color:red;font-weight:400'>$error</p>"; } ?>
								<label for='username' class='login-form__label'>Email address</label>
								<input id='username' name='username' class='login-form__input' autofocus type='email' style='width:220px' required>
							</p>
							<p class='content__main__paragraph'>
								<label for='password' class='login-form__label'>Password</label>
								<input id='password' name='password'  style='width:220px' class='login-form__input' type='password' required>
								<input type='hidden' name='csrf_token' value='<?php echo $csrf_token; ?>'>
							</p>							
							<input class='login-form__submit' type='submit' value='Login'>
						</form>
						<br><div id='ga_login' class="g-signin2" data-width="210" data-height="40" data-longtitle="true" data-onsuccess="onSignIn"></div>
					</section>
					<section class='content__main content__main--split content__main--right'>
						<header class='content__main__header'>Register</header>
						<p class='content__main__paragraph'>Register on Thicket to build your site with our tools and API. It's free, and we don't do anything bad with your private information.</p>			
						<div id='ga_signup_holder' class='hidden'><p style='color:gray;font-weight:400;font-size:.9em'>Click the button below to register on Thicket with your Google account.</p><div id='ga_signup' class='g-signin2' data-width='210' data-height='40' data-longtitle='true' data-onsuccess='onRegister'></div></div>
						<p class='content__main__lead'><a href='#register' class='login-intent-switcher'>Create an account</a></p>
				</div>
			</div>
			
			<!-- MODAL POPUP -->
			<div id='modal_close_btn'><i class="material-icons">&#xE5CD;</i></div>
			<div id="video-modal" class="modal hide in"></div>
	      	<div id='bg_mask'></div>
	      	
	      	 <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
	      	<?php include_once('_footer.php'); ?>