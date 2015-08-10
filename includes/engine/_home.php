		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_home'>
					<section class='content__main'>
						<? if (chatEnabled) {include_once('_chat.php'); } ?>
						<p class='content__main__lead'><? if (tagline and taglineVisible) { echo tagline;} ?></p>
					</section>
					<style>
					
						.content__info h1 {
						color:#333;
						text-align:center;
						font-size:1.7em;
						line-height:1.4;
						padding-top:20px;
						}
						
						.content__info h3 {
						font-size:1.6em;
						font-weight:300;
						margin-bottom:0;
						margin-top:30px;
						}
						
						.content__info p {
						line-height:1.5;
						font-weight:400;
						}
						
						.content__info code {
						background-color:whitesmoke;
						border-radius:3px;
						font-size:.9em;
						padding-left:2px;
						padding-right:2px;
						font-family:'Consolas',Monaco,arial,sans-serif;
						}
						.aligned-cta {
						text-align:center;
						margin-bottom:50px;
						margin-top:50px;
						font-size:1.2em;
						border-bottom:2px solid whitesmoke;
						padding-bottom:65px;
						}
						
						.login-intent-switcher {
						font-weight:600;
						letter-spacing:1px;
						outline:12px solid whitesmoke;
						padding-left:15px;
						padding-right:15px;
						display:block;
						max-width:300px;
						width:90%;
						margin:auto;
						}
						
						.login-intent-switcher.second {
						margin-top: 35px;
						/* opacity: .6; */
						font-weight: 600;
						letter-spacing: 0;
						outline: 7px solid white;
						width: 95%;
						/* max-width: 260px; */
						background-color: #D4D4D4;
						color: #313131;
						/* border: 2px solid #696969; */
						}
					</style>
					<section class='content__info'>
						<h1>Build beautiful, robust community websites in minutes.</h1>
						<p class='aligned-cta'><a href='download' class='login-intent-switcher'>Build with Thicket online</a> <a href='download' class='login-intent-switcher second'>Download Thicket (for developers)</a></p>
						<h3>Zero install</h3>
						<p>Just download our package and read the documentation to run Thicket on your site. Or, if you don't want to delve into the code, you can run create a Thicket account and customize your website to your heart's content with our beautiful online dashboard.</p>
						<h3>Scalable</h3>
						<p>Adding pages is as easy as modifying the <code>views.php</code> file. Change colors, fonts, content, and more from a single <code>config.php</code> file. As your users and posts grow, Thicket grows with it.</p>

						<h3>Familiar</h3>
						<p>PHP? Sure, why not. It's a familiar language known to millions of people. Now you don't have to worry about paying a premium for development in a relatively obscure language or framework.</p>

					</section>
				</div>
			</div>
			
			<!-- MODAL POPUP -->
			<div id='modal_close_btn'><i class="material-icons">&#xE5CD;</i></div>
			<div id="video-modal" class="modal hide in"></div>
	      	<div id='bg_mask'></div>
	      	
	      	<!-- HARMLESS VALUES WITH USER NAME, EMAIL -->
	      	<input type='hidden' value='<?php echo $_SESSION['name']; ?>' id='thicketdata-name'>
	      	<input type='hidden' value='<?php echo $_SESSION['username']; ?>' id='thicketdata-username'>
	      	<input type='hidden' value='<?php echo $_SESSION['uid']; ?>' id='thicketdata-uid'>
	      	
	      	<?php include_once('_footer.php'); ?>