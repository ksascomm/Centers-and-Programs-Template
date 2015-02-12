		<div id="container-foot">
			
			<div id="footer">
				
				<div id="footer-left">
						<ul id="social-media">
							<li class="facebook"><a href="http://www.facebook.com"><span>Facebook</span></a></li>
							<li class="youtube"><span>YouTube</span</li>
							<li class="rss"><span>RSS</span></li>
						</ul>
					<p><a href="http://www.jhu.edu">Johns Hopkins University</a> | <a href="http://krieger.jhu.edu">Zanvyl Krieger School of Arts and Sciences</a></p>
					<small>&copy; Johns Hopkins University. All rights reserved.</small>
				</div>
				
				<div id="footer-right">
									<?php get_sidebar('address-sb'); ?>

				
				</div>
				
			</div> <!--End footer -->
			
			<div class="clearboth"></div> <!--to have background work properly -->
		
		</div> <!--End container-foot -->
<?php wp_footer(); ?>
	</body>
			
		<script src="<?php bloginfo('template_url'); ?>/assets/js/respond.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/assets/js/ksascenters_custom.js"></script>
		
		
		<!-- front-page specific scripts and css -->
		<?php if (is_front_page()) { ?>
			<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery_easing.js"></script>		
			<script src="<?php bloginfo('template_url'); ?>/assets/js/responsive_accordion.js"></script>
		<?php } ?>
</html>

