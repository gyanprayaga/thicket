		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_home'>
					<section class='content__main'>
						<header class='content__main__header'>Create your own video</header>
						<p class='content__main__lead'>Making video lessons is fun and exciting. We've put together a few sample videos (our sketch comedy series called "What the FisX" as well as a series of "How to" videos to get you started.</p>
					</section>
					<section class='content__info'>
						<div class='content__info__main' id='main'>
							Ready to publish? Just fill in the form below to submit your video for review.
						</div>
					</section>
					<section class='content__info' id='mail'>
						<form id='joinform' method="post" action="contact.engine"> 
				          <div class="left">
				              <p><label for="text-input">Full Name*</label><input name="Name" id="Name" autofocus type="text" required requiredmessage="A name would be helpful" ></p>
				          <p><label for="email-input">Email Address*</label><input name="Email" id="Email" type="email" required requiredmessage="An email address, please" pattern="^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9]+$"></p>
				          <p><label for="title-input">Video URL (on YouTube)*</label><input id="title-input" type="text" name="Project" id="Project" required placeholder="Your video's title"></p>
				          <p><label for="message-input" id="msg-label">Description*</label><textarea name="Project_Message" id="Project_Message" placeholder="A brief description of your video" required></textarea></p>
				            </div>
				            <div class="right">
				          <p><label for="timeline-input">Category*</label>
					          <select id='timeline-input' required>
						          <option disabled selected>Choose a video category</option>
						          <option>What is a variable</option>
						          <option>the Manhattan Project</option>
						          <option>Gravity</option>
						          <option>Newton's 3rd Law</option>
						          <option>Sound</option>
						          <option>Complementary and Supplementary Angles</option>
						          <option>Thermal Energy</option>
						          <option>American Revolution </option>

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