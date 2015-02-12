<?php
//add menu support
	add_theme_support( 'menus' );

	//register menus
		function ksascenters_register_my_menus() {
	  		register_nav_menus(
	    		array( 'header-menu' => __( 'Header Menu' ), 'mobile-menu' => __( 'Mobile Menu' ))
	  		);
		}
		
		// initiate register menus
			add_action( 'init', 'ksascenters_register_my_menus' );

//register thumbnail/featured image support
	add_theme_support( 'post-thumbnails' );

	// name of the thumbnail, width, height, crop mode
		add_image_size( 'page-image', 960, 360, true );

//pagination function
	function ksascenters_pagination($prev = '«', $next = '»') {
    	global $wp_query, $wp_rewrite;
    	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    	$pagination = array(
    	    'base' => @add_query_arg('paged','%#%'),
    	    'format' => '',
    	    'total' => $wp_query->max_num_pages,
    	    'current' => $current,
    	    'prev_text' => __($prev),
    	    'next_text' => __($next),
    	    'type' => 'plain'
		);		
    	if( $wp_rewrite->using_permalinks() )
    	    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		
    	if( !empty($wp_query->query_vars['s']) )
    	    $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		
    	echo paginate_links( $pagination );
	};		

//register sidebars
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'Department Address',
			'id'            => 'address-sb',
			'description'   => '',
			'before_widget' => '<div id="address-widget" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
			));	

// remove junk from head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

	// remove version info from head and feeds
		//function complete_version_removal() {
		//	return '';
		//}
		//add_filter('the_generator', 'complete_version_removal');

//Change Excerpt Length -- Add to functions.php
	function ksascenters_new_excerpt_length($length) {
		return 100; //Change word count
	}
	add_filter('excerpt_length', 'ksascenters_new_excerpt_length');

//Add iframe shortcode
	if ( !function_exists( 'iframe_embed_shortcode' ) ) {
		function iframe_embed_shortcode($atts, $content = null) {
			extract(shortcode_atts(array(
				'width' => '100%',
				'height' => '480',
				'src' => '',
				'frameborder' => '0',
				'scrolling' => 'no',
				'marginheight' => '0',
				'marginwidth' => '0',
				'allowtransparency' => 'true',
				'id' => '',
				'class' => 'iframe-class',
				'same_height_as' => ''
			), $atts));
			$src_cut = substr($src, 0, 35);
			if(strpos($src_cut, 'maps.google' )){
				$google_map_fix = '&output=embed';
			}else{
				$google_map_fix = '';
			}
			$return = '';
			if( $id != '' ){
				$id_text = 'id="'.$id.'" ';
			}else{
				$id_text = '';
			}
			$return .= '<div class="video-container"><iframe '.$id_text.'class="'.$class.'" width="'.$width.'" height="'.$height.'" src="'.$src.$google_map_fix.'" frameborder="'.$frameborder.'" scrolling="'.$scrolling.'" marginheight="'.$marginheight.'" marginwidth="'.$marginwidth.'" allowtransparency="'.$allowtransparency.'" webkitAllowFullScreen allowFullScreen></iframe></div>';
			// &amp;output=embed
			return $return;
		}
		add_shortcode('iframe', 'iframe_embed_shortcode');
	}

//Add AJAX file upload capability
//Save image via AJAX
add_action('wp_ajax_ksas_ajax_upload', 'ksas_ajax_upload'); //Add support for AJAX save

function ksas_ajax_upload(){
	
	global $wpdb; //Now WP database can be accessed
	
	
	$image_id=$_POST['data'];
	$image_filename=$_FILES[$image_id];	
	$override['test_form']=false; //see http://wordpress.org/support/topic/269518?replies=6
	$override['action']='wp_handle_upload';    
	
	$uploaded_image = wp_handle_upload($image_filename,$override);
	
	if(!empty($uploaded_image['error'])){
		echo 'Error: ' . $uploaded_image['error'];
	}	
	else{ 
		update_option($image_id, $uploaded_image['url']);		 
		echo $uploaded_image['url'];
	}
			
	die();

}

include_once (TEMPLATEPATH . '/assets/functions/accordion.php');

?>