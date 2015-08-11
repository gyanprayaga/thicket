		<div class='body--nested'>
			<div class='body--main'>
				<div class='body--main__nested body--main__nested--post'>
					<section class='content__main'>
							<?php 								
							// grabbing the upvote and displaying it
							
							while($therow_u = mysqli_fetch_array($getvotes_u)) {
								if ($uid == $therow_u['user_id']) {
									echo "<button class='upvote voted post_upvote' id='$p_id'>$votes</button>";			
								}
								$upvote_exists = true;
							}
							
							if (!$upvote_exists) {
								echo "<button class='upvote post_upvote' id='$p_id'>$votes</button>";
							}
							?>	
							<p class='content__main__lead content__main__lead--postheader'>							
							<? if ($p_ptype != 'video') {echo "<a class='post--link' href='$p_url' target='_blank'>$p_name</a>";} else {echo "<b>$p_name</b>"; }  ?>
						<p class='content__info__paragraph content__info__paragraph--post--alt'><? if ($p_ptype != 'video') {echo $p_url;} else {echo "<iframe style='border: 1px solid black;
    border-radius: 2px;' width='560' height='315' src='https://www.youtube.com/embed/$url_id_p?autoplay=true' frameborder='0'></iframe>"; }  ?></p>
					</section>
					<section class='content__info'>
						<div class='content__info__main' id='main'><p class='content__info__paragraph content__info__paragraph--subtitle'><?php echo $p_description; ?></p></div>
					</section>
					
					<section class='content__comments'>
						<header class='content__comments__header'>Discussion</header>
						<div class='content__comments__content'>
							<div id='disqus_thread'></div>
							<noscript>Please enable JavaScript to view the <a href='http://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>
							<script>
							   /* * * DON'T EDIT BELOW THIS LINE * * */
							   disqus_shortname='opensourcehigh';
							    (function() {
							        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
							        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
							        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
							    })();
	    					</script>
						</div>
					</section>
				</div>
			</div>
			
			<!-- MODAL POPUP -->
			<div id='modal_close_btn'><i class="material-icons">&#xE5CD;</i></div>
			<div id="video-modal" class="modal hide in"></div>
	      	<div id='bg_mask'></div>
	      	
	      	<?php include_once('_footer.php'); ?>