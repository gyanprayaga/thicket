		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_home'>
					<section class='content__main'>
						<?php $search_query = $_GET['q']; ?>
						<p class='content__main__lead content__main__lead--alt'>Searching for <b class='regular'><? echo $search_query; ?></b> on <?php echo name; ?></p>
					</section>
					<section class='content__info'>
						<div class='primary-content-box visible'>
							<form action='' method='get'><input type="search" value='<? echo $search_query; ?>' class="explore-popup__search search-pane" autofocus placeholder="Search again" name="q"></form>
							<?php include_once('search.php'); ?>
						</div>
					</section>
				</div>
			</div>
			
			<!-- MODAL POPUP -->
			<div id='modal_close_btn'><i class="material-icons">&#xE5CD;</i></div>
			<div id="video-modal" class="modal hide in"></div>
	      	<div id='bg_mask'></div>
	      	
	      	<?php include_once('_footer.php'); ?>