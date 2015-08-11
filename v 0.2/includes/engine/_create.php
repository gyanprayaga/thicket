		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_home'>
					<section class='content__main'>
						<header class='content__main__header'>Submit content</header>
						<p class='content__main__lead'>Default text to submit content on Thicket.</p>
					</section>
					<section class='content__info'>
						<div class='content__info__main' id='main'>
							Ready to publish? Just fill in the form below to submit your content.
						</div>
					</section>
					<section class='content__info create_video' id='mail'>
						<form id='joinform' method="post" action="<?php echo(staticPath); ?>/engine/modules/create_process.php"> 
				          <div class="left">	
							<?php if ($error = $_GET['error']) {echo "<p class='text_error' style='color:red;font-weight:400'>$error</p>"; } ?>
				          <p><label for="name-input">Video Name*</label><input id="name-input" type="text" name="Title" id="Title" autofocus required placeholder="Your video's title"></p>
				          <p><label for="title-input">Video URL (on YouTube)*</label><input id="title-input" type="text" name="Project" id="Project" required placeholder="Your video's link on YouTube"></p>
				          <p><label for="message-input" id="msg-label">Description*</label><textarea name="Project_Message" id="Project_Message" placeholder="A brief description of your video" required></textarea></p>
				            </div>
				            <div class="right">
				          <p><label for="timeline-input">Category*</label>
					          <select name='Category' id='timeline-input' required>
						          <option value='' disabled selected>Select a category</option>
						          <option value='category1'>Cool category</option>
						          <option value='category2'>Another cool category</option>
						         </select>
						        </p>
				          <p><input type="submit" value="Submit!" class="button contact-btn" ></p>
				            </div>
				        </form>
					</section>					
				</div>
			</div>
			
			<!-- MODAL POPUP -->
			<div id='modal_close_btn'><i class="material-icons">&#xE5CD;</i></div>
			<div id="video-modal" class="modal hide in"></div>
	      	<div id='bg_mask'></div>
	      	
	      	<?php include_once('_footer.php'); ?>