				<?php simple_twitter() ?>
			</div>
			<!-- ENDS main-wrapper -->
		</div>		
		<!-- ENDS MAIN -->	
		
		<!-- FOOTER -->
		<div id="footer">
		<div <?php simple_degree() ?>>
			<!-- wrapper -->
			<div class="wrapper">
				<?php simple_follow() ?>
				<!-- footer-cols -->
				<ul class="footer-cols">
					<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar(Footer)) : ?>
					<?php endif; ?>			
				</ul>
				<!-- footer-cols -->
			</div>
			<!-- ENDS footer-wrapper -->
		</div>
		</div>
		<!-- ENDS FOOTER -->

		<!-- BOTTOM -->
		<div id="bottom">
			<!-- wrapper -->
			<div class="wrapper">
				<?php echo get_option('simple_footer'); ?>
			</div>
			<!-- ENDS bottom-wrapper -->
		</div>
		<!-- ENDS BOTTOM -->

		<!-- start cufon -->
		<script type="text/javascript"> Cufon.now(); </script>
		<!-- ENDS start cufon -->		
		<?php wp_footer() ?>
	</body>
</html>