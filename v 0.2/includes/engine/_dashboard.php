		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested'  id='state_admin'>
					<section class='content__admin__switcher'>
						<ul class='content__admin__switcher__list'>
							<li><a class='admin_view_switcher active' id='home' href='#'>Dashboard</a></li>
							<li><a class='admin_view_switcher' id='posts' href='#'>Posts</a></li>
							<li><a class='admin_view_switcher' id='users' href='#'>Users</a></li>
							<li><a class='admin_view_switcher' id='pages' href='#'>Pages</a></li>
							<h3 class='admin_external_header'>Reference</h3>
							<li><a class='admin_external_links' href='//thicket.readme.io/docs' target='_blank'>Documentation</a></li>
							<li><a class='admin_external_links' href='//thicket.readme.io/support' target='_blank'>Support</a></li>
							<li><a href='/admin/settings' class="login-intent-switcher" id='admin_settings_changer' style='margin-top:35px'>View site settings</a></li>
						</ul>
					</section>
					<section class='content__main admin-screen' id='home_screen'>
						<header class='content__main__header' id='home_screen'><img src='//gyan.biz/thicket/logo3.png' alt='Thicket logo' width='110'></header>
						<p class='content__main__lead'>Thanks for building <?php echo name; ?> with Thicket! Use the links on the left panel to manage your site.</p>
					</section>	
					<section class='content__main admin-screen hidden' id='posts_screen'>
						<header class='content__main__header'>Manage posts</header>
						<p class='content__main__lead'>Manage the posts on <? echo name; ?> below.</p>
						<? include_once('posts-simple.php'); ?>
					</section>		
					<section class='content__main admin-screen hidden' id='users_screen'>
						<header class='content__main__header'>Manage users</header>
						<p class='content__main__lead'>Review the documentation for information on how to add, edit, or remove users.</p>
					</section>		
					<section class='content__main admin-screen hidden' id='pages_screen'>
						<header class='content__main__header'>Manage pages</header>
						<p class='content__main__lead'>Review the documentation for information on how to add, edit, or remove pages.</p>
					</section>					
				</div>
			</div>
			
			<!-- MODAL POPUP -->
			<div id='modal_close_btn'><i class="material-icons">&#xE5CD;</i></div>
			<div id="video-modal" class="modal hide in"></div>
	      	<div id='bg_mask'></div>
	      	
	      	<?php include_once('_footer.php'); ?>