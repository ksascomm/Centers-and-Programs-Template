	<?php get_header() ?>	
		
		<div id="container-mid">
			<div id="main">				
				<div id="content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Start the loop -->
						
						<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
						
						<?php the_content() ?>
			
					<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
				
				</div> <!--End content -->		
				<div class="clearboth"></div> <!--to have background work properly -->
			</div> <!--End main -->
			
		</div> <!--End container-mid -->
	
	<?php get_footer() ?>