	<?php get_header() ?>	
		
		<div id="container-mid">
			<div id="main">				
				<div id="content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Start the loop -->
					
					<?php if ( get_post_meta($post->ID, 'extra_javascript', true) ) : ?><?php echo get_post_meta($post->ID, 'extra_javascript', true); ?><?php endif; ?>
					
						<?php if ( has_post_thumbnail()) { ?> 
						<img src="<?php $image_id = get_post_thumbnail_id();
										$image_url = wp_get_attachment_image_src($image_id,'page-image', true);
										echo $image_url[0];  ?>" />
						<?php	} ?>
						
						<h2><?php the_title() ?></h2>
						
						<?php the_content() ?>
			
					<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
				
				</div> <!--End content -->		
				<div class="clearboth"></div> <!--to have background work properly -->
			</div> <!--End main -->
			
		</div> <!--End container-mid -->
	
	<?php get_footer() ?>