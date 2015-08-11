		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_home'>
					<section class='content__main'>
						<? if (chatEnabled) {include_once('_chat.php'); } ?>
						<p class='content__main__lead'><? if (tagline) { echo tagline; } ?></p>
					</section>
					<section class='content__info'>
						<?
						if (database == 'thicket_fake_db') {
							echo "<p class='error_paragraph' style='color:black;background-color:whitesmoke;padding:20px;line-height:1.5;border-top:2px solid darkred;border-radius:3px'><b>Almost done!</b> To finish installation of your Thicket site, enter your database credentials in <code style='font-size:.9em;font-family:Monaco,Consolas,serif;background-color:white;padding-left:3px;padding-right:3px'>/includes/engine/config.php</code>. Also, make sure you modified your .htaccess file.<br><br>If you need any help, visit <a href='http://gyan.biz/thicket' target='_blank'>gyan.biz/thicket</a> for documentation and support.</p>";
						}
						?>
						<div class='primary-content-box' id='main'>
							<?php include_once('posts.php'); ?>						
						</div>
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