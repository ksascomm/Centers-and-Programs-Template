	<?php get_header() ?>	
	
	<script type="text/javascript"> //Setup accordion
		var $j = jQuery.noConflict();
		$j(document).ready(function() {
   		 slider_acc.setup('#accordion-container'); } );
   	</script>
	<div id="accordion_background">
	<div id="accordion-container-wrapper">
	<div id="accordion-container">
		<?php $my_accordion_query = new WP_Query(array(
			'post_type' => 'accordion',
			'posts_per_page' => '4')); ?>
					
		<?php while ($my_accordion_query->have_posts()) : $my_accordion_query->the_post(); ?>

				<div id="as<?php echo the_ID() ?>" class="slide">
        		<a id="slideimg<?php echo the_ID() ?>" class="image async-img" href="<?php echo get_post_meta($post->ID, 'accordion_destination', true); ?>">
        			<img alt="" src="<?php echo get_post_meta($post->ID, 'accordion_photo', true); ?>">
        		
        		<div class="text-back"></div>
        		<div class="text">
        			<h3><?php the_title() ?></h3>
        			<?php the_content() ?>
        		</div></a>
        			<img alt="" src="<?php echo get_post_meta($post->ID, 'accordion_strip', true); ?>">
        	</div>
        		
		<?php endwhile; ?>
        	
        	
    
        </div> <!-- accordion-container -->
	</div> <!-- accordion-container-wrapper --> 
	</div> <!-- accordion background -->
	    <div id="container-mid">
	    	<div id="homepage">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--Start the loop -->
										
												
						<?php the_content() ?>
			
					
					<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
	    		
	    		
	    		<div class="clearboth"></div> <!--to have background work properly -->
	    	</div> <!--End homepage -->
	    		
		</div> <!--End container-mid -->		
	<?php get_footer() ?>