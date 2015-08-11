		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_admin'>
					<section class='content__main'>
						<header class='content__main__header'>Admin settings</header>
						<p class='content__main__lead'>Use this admin panel to alter Thicket defaults and customize <?php echo name; ?>.</p>
						<p class='content__main__lead' style='margin-top:15px'><a href='/admin/dashboard' class="login-intent-switcher" id="admin_settings_changer" style="display:inline-block;font-size:.8em">Back to admin dashboard</a></p>
					</section>
					<section class='content__info'>
					</section>
					<section class='content__info create_video' id='mail'>
						<form style='font-size:.8em'> 
							<?php
								
								$const = get_defined_constants(true);
								
								reset($const['user']);
								while (list($key, $val) = each($const['user'])) {
									if ($val == '1') {$val = 'true';}
									if ($val == '0') {$val = 'false';}
								    echo "<label style='text-transform:none;font-size:1.2em'>$key</label><input type='text' disabled value='$val' style='width:100%;max-width:400px'>";
								}
							
							?>
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