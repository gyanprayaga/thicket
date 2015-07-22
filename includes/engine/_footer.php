			<footer class='content__footer'>
				&copy; <?php echo(name." ".date('Y')); ?>. All Rights Reserved. 
			</footer>
			</div>
		</div>
		<script src='http://code.jquery.com/jquery-1.11.3.min.js' type='text/javascript'></script>
		<?php 
			if (pageLoader) {
			echo "<script src='".url.staticPath."/js/pace.js' type='text/javascript'></script>";
			}
		?>	
		<script src='<?php echo(url.staticPath); ?>/js/script.js' type='text/javascript'></script>
	</body>
</html>