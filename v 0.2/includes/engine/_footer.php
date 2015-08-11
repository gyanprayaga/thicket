			<footer class='content__footer'>
				&copy; <?php echo(name." ".date('Y')); ?>. All Rights Reserved. 
			</footer>
			</div>
		</div>
		<input type='hidden' id='thicket_site_identifier' value='<? echo url; ?>'>
		<script src='http://code.jquery.com/jquery-1.11.3.min.js' type='text/javascript'></script>
		<?php 
			if (jsInject) {
				echo "<script src='".jsInject."' type='text/javascript'></script>";
			}
			if (pageLoader) {
				echo "<script src='".url.staticPath."/js/pace.js' type='text/javascript'></script>";
			}
		?>	
		<script src='<?php echo(url.staticPath); ?>/js/script.js' type='text/javascript'></script>
		<? if ($render == 'search') { echo "<script type='text/javascript'>highlightSearch('$search_query')</script>"; }
		if ($render == 'dashboard') { echo "<script type='text/javascript'>appendDelete()</script>"; } 
			if ($render == 'post') {
				if ( strlen($p_name) > 17) {
					$p_name = substr($p_name, 0, 18)."...";
				}
				echo "<script type='text/javascript'>
				var pname = '".$p_name."';
				document.title = pname + ' / Post on ".name."'
				
			</script>"; }
		?> 
	</body>
</html>