<?php

add_action("init", "accordion_plugin");

function accordion_plugin() {

//Create labels
$labels = array(
		'name' => _x('Accordion', 'post type general name'),
		'singular_name' => _x('Accordion', 'post type singular name'),
		'add_new' => _x('Add New', 'Accordion'),
		'add_new_item' => __('Add New Accordion'),
		'edit_item' => __('Edit Accordion'),
		'new_item' => __('New Accordion'),
		'view_item' => __('View Accordion'),
		'search_items' => __('Search accordions'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

//Register custom post type

register_post_type('accordion', array(
	'labels' => $labels,
	'public' => true,
	'show_ui' => true, // UI in admin panel
	'_builtin' => false, // It's a custom post type, not built in!
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => array("slug" => "accordions"), // Permalinks format
	'query_var' => "accordion", // This goes to the WP_Query schema
	'supports' => array('title', 'editor', 'custom-fields'),
	'can_export' => true,
));

}

//Create Meta boxes
// Intiate create meta boxes
add_action("admin_init", "create_accordion_meta_boxes");
function create_accordion_meta_boxes(){
	add_meta_box("accordion_details", "Redirect Destination", "accordion_details", "accordion", "normal", "high");
	add_meta_box("accordion_uploads", "Accordion Uploads", "accordion_uploads", "accordion", "side", "high");
}

//function to create pull quote meta box
function accordion_details() {
  global $post;
  $custom = get_post_custom($post->ID);
  $accordion_destination = $custom["accordion_destination"][0];
  
  ?>
  <div class="meta-group">  
  <div class="meta-box"><strong>Slide Destination URL:</strong><br><input size="30" name="accordion_destination" value="<?php echo $accordion_destination; ?>"></input></div>
  </div>
    <div class="clear"></div>

  <?php
}

//function to create uploads meta box
function accordion_uploads() {
  global $post;
  $custom = get_post_custom($post->ID);
  $accordion_photo = $custom["accordion_photo"][0];
  $accordion_strip = $custom["accordion_strip"][0];
  ?>
  
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ajaxupload.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">

    jQuery(document).ready(function() {

        jQuery('#uploadPhoto').each(function(){

            var the_button = jQuery(this);
            var image_input = jQuery('#accordion_photo');
            var image_id = jQuery(this).attr('id');

            new AjaxUpload(image_id, {

                action: ajaxurl,
                name: image_id,

                // Additional data
                data: {
                    action: 'ksas_ajax_upload',
                    data: image_id
                },

                autoSubmit: true,
                responseType: false,
                onChange: function(file, extension){},
                onSubmit: function(file, extension) {

                    the_button.attr('disabled', 'disabled').val("Uploading...");

                },

                onComplete: function(file, response) {

                    the_button.removeAttr('disabled').val("Upload Image");

                    if(response.search("Error") > -1){

                        alert("There was an error uploading:\n"+response);

                    }

                    else{

                        image_input.val(response);

                    }

                }
            });
        });

    });

</script>
<p>

    <label for="accordion_photo"><strong>Upload Accordion Photo (750px by 420px):</strong></label>
    <input type="text" class="widefat" name="accordion_photo" id="accordion_photo" value="<?php echo $accordion_photo; ?>" />

    </p>

<p style="text-align: right;">

    <input type="button" name="" class="button-primary autowidth" id="uploadPhoto" value="Upload Image" />

</p>


<script type="text/javascript">

    jQuery(document).ready(function() {

        jQuery('#uploadStrip').each(function(){

            var the_button = jQuery(this);
            var image_input = jQuery('#accordion_strip');
            var image_id = jQuery(this).attr('id');

            new AjaxUpload(image_id, {

                action: ajaxurl,
                name: image_id,

                // Additional data
                data: {
                    action: 'ksas_ajax_upload',
                    data: image_id
                },

                autoSubmit: true,
                responseType: false,
                onChange: function(file, extension){},
                onSubmit: function(file, extension) {

                    the_button.attr('disabled', 'disabled').val("Uploading...");

                },

                onComplete: function(file, response) {

                    the_button.removeAttr('disabled').val("Upload Image");

                    if(response.search("Error") > -1){

                        alert("There was an error uploading:\n"+response);

                    }

                    else{

                        image_input.val(response);

                    }

                }
            });
        });

    });

</script>
<p>

    <label for="accordion_strip"><strong>Upload Accordion Strip (240px by 422px):</strong></label>
    <input type="text" class="widefat" name="accordion_strip" id="accordion_strip" value="<?php echo $accordion_strip; ?>" />

    </p>

<p style="text-align: right;">

    <input type="button" name="" class="button-primary autowidth" id="uploadStrip" value="Upload Image" />

</p>

   <?php
}





// Save meta 
add_action('save_post', 'accordion_save_details');
//Save and update function
function accordion_save_details(){
	if ( 'accordion' == get_post_type() ) {  
  global $post;
  update_post_meta($post->ID, "accordion_photo", $_POST["accordion_photo"]);
  update_post_meta($post->ID, "accordion_strip", $_POST["accordion_strip"]);
  update_post_meta($post->ID, "accordion_destination", $_POST["accordion_destination"]);
}
}

// Initiate flush rewrite rules
register_activation_hook(__FILE__, 'accordion_rewrite_flush');
//Flush rewrite rules
function accordion_rewrite_flush() {
  accordion_plugin();
  flush_rewrite_rules();
}

?>