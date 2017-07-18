<?php
/** Vital Squares Functions **/



/*** Basic Functions ***/



add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 825, 510, true );
add_theme_support( 'title-tag' );
add_image_size( 'portfolio-size', 320, 300, array( 'top', 'center' ) );
add_image_size( 'featured-size', 555, 400, array( 'top', 'center' ) );

/** Menus **/


	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'squares' ),
		'hashless'  => __( 'Hashless Menu', 'squares' ),
	) );


	/*** Enqueue Styles & Scripts ***/


	function wpdocs_theme_name_scripts() {

    wp_enqueue_style( 'mainstyle', get_stylesheet_uri(),array(), '2.0' );
    wp_enqueue_style( 'componenet', get_template_directory_uri() . '/css/component.css',array(), '2.0' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css',array(), '1.0' );

    wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css',array(), '1.0' );
    wp_enqueue_style( 'magnific-css', get_template_directory_uri() . '/css/magnific-popup.css',array(), '1.0' );


   wp_enqueue_script( 'js', '//code.jquery.com/jquery-2.2.4.min.js', array(), '1.0.0', true );

   wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
   wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.0', true );
   wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
   wp_enqueue_script( 'isotype-js', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), '1.0.0', true );

   wp_enqueue_script( 'magnific-js', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '1.0.0', true );



}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


/*** Post Types ***/


function codex_custom_init() {
    $services = array(
      'public' => true,
      'label'  => 'Services',
      'menu_icon' => 'dashicons-admin-generic'
    );
    register_post_type( 'service', $services );




}
add_action( 'init', 'codex_custom_init' );



/*** Theme Options ***/

function pu_theme_menu()
{
  add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'pu_theme_options.php', 'pu_theme_page');  
}
add_action('admin_menu', 'pu_theme_menu');

function pu_theme_page()
{
?>
    
<div class="section panel">

      
<h1>Custom Theme Options</h1>

      
<form method="post"enctype="multipart/form-data"action="options.php">

        <?php 
          settings_fields('pu_theme_options'); 
        
          do_settings_sections('pu_theme_options.php');
        ?>
            
<p class="submit">
  
               
<input type="submit"class="button-primary"value="<?php _e('Save Changes') ?>"/>
  
            
</p>
  
            
      
</form>

      
    
</div>

    <?php
}

/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'pu_register_settings' );

/**
 * Function to register the settings
 */
function pu_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'pu_theme_options', 'pu_theme_options', 'pu_validate_settings' );

    // Add settings section
    add_settings_section( 'pu_text_section', 'Basic Information', 'pu_display_section', 'pu_theme_options.php' );


    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'pu_textbox',
      'name'      => 'pu_textbox',
      'desc'      => 'Example of textbox description',
      'std'       => '',
      'label_for' => 'pu_textbox',
      'class'     => 'css_class'
    );


        $area_args = array(
      'type'      => 'textarea',
      'id'        => 'pu_directions',
      'name'      => 'pu_directions',
      'desc'      => 'Enter contact us information',
      'std'       => '',
      'label_for' => 'pu_directions',
      'class'     => 'css_class'
    );

         $about_args = array(
      'type'      => 'textarea',
      'id'        => 'pu_about',
      'name'      => 'pu_about',
      'desc'      => 'Enter contact us information',
      'std'       => '',
      'label_for' => 'pu_about',
      'class'     => 'css_class'
    );

   // add_settings_field( 'example_textbox', 'Example Textbox', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );
      add_settings_field('plugin_textarea_string', 'Large Textbox!', 'pu_display_setting', 'pu_theme_options.php','pu_text_section', $area_args);
      add_settings_field('about_us_box', 'About', 'pu_display_setting', 'pu_theme_options.php','pu_text_section', $about_args);


}

function pu_display_setting($args)
{
    extract( $args );

    $option_name = 'pu_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
          case 'textarea':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
          echo "<textarea id='plugin_textarea_string' name='" . $option_name . "[$id]' rows='10' cols='50' type='textarea'>$options[$id]</textarea>";
          break; 

    }
}




add_action( 'admin_enqueue_scripts', 'custom_wp_admin_css' );
function custom_wp_admin_css() {

  global $hook_suffix; 


    if($hook_suffix == 'appearance_page_pu_theme_options') {

    wp_enqueue_style( 'theme-options', get_template_directory_uri() . '/include/theme-options.css' );

    
   wp_enqueue_script( 'tinymce', '//cloud.tinymce.com/stable/tinymce.min.js?apiKey=ucvbqtrax0meq720f0i577b98551fn2vvrryyv8t11sjwqs1' ); 
   wp_enqueue_script( 'theme-options-js', get_template_directory_uri() . '/include/theme-options.js' );  





  }
}  




function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}

add_action('add_meta_boxes','my_meta_init');
function my_meta_init()
{
global $post;

if ( $post->post_title == 'Portfolio')
{
    add_meta_box('my_all_meta_1', 'Portfolio', 'display_product_information', 'page', 'normal', 'high');

}

}



function display_product_information()
{

    $args = array('post_type' => 'service');
  $the_query = get_posts( $args );

  foreach ($the_query as $named) { ?>

    <div id="vp-pfui-format-gallery-preview" class="vp-pfui-elm-block vp-pfui-elm-block-image">
  <label><span><?php _e($named->post_title, 'vp-post-formats-ui'); ?></span></label>
  <div class="vp-pfui-elm-container">

    <?php do_action( 'vp_pfui_before_gallery_meta' ); 
      $striped = str_replace($named->post_title, ' ', '_').'_images';

    ?>

    <div class="vp-pfui-gallery-picker">
      <?php
        // query the gallery images meta
        global $post;
        $images = get_post_meta($post->ID,  $striped, true);

        echo '<div class="gallery clearfix">';
        if ($images) {
          foreach ($images as $image) {
            $thumbnail = wp_get_attachment_image_src($image, 'thumbnail');
            echo '<span data-id="' . $image . '" title="' . 'title' . '"><img src="' . $thumbnail[0] . '" alt="" /><span class="close">x</span></span>';
          }
        }
        echo '</div>';
      ?>
      <input type="hidden" name="<?php echo $striped;?>" value="<?php echo (empty($images) ? "" : implode(',', $images)); ?>" />
      <p class="none"><a href="#" class="button vp-pfui-gallery-button" data-gallery="<?php echo $named->post_title;?>"><?php _e('Pick Images', 'vp-post-formats-ui'); ?></a></p>
    </div>

    <?php do_action( 'vp_pfui_after_gallery_meta' ); ?>

  </div>
</div>


  <?php }
    

}


add_action('save_post', 'vp_pfui_format_gallery_save_post');

function vp_pfui_format_gallery_save_post($post_id) {
  if (!defined('XMLRPC_REQUEST') && isset($_POST['_format_gallery_images'])) {
    global $post;
    if( $_POST['_format_gallery_images'] !== '' ) {
      $images = explode(',', $_POST['_format_gallery_images']);
    } else {
      $images = array();
    }
    update_post_meta($post_id, '_format_gallery_images', $images);
  }
}



function pw_load_scripts($hook) {

  if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) 
    return;

  wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/portfolio.js', array(), '1.0' );
    wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}
add_action('admin_enqueue_scripts', 'pw_load_scripts');