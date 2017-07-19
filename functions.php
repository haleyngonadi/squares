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

      add_settings_field('about_us_box', 'About', 'pu_display_setting', 'pu_theme_options.php','pu_text_section', $about_args);
   
      add_settings_field('plugin_textarea_string', 'Find Us:', 'pu_display_setting', 'pu_theme_options.php','pu_text_section', $area_args);


}

function pu_display_section( $arg ) {

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
    add_meta_box('service_photos', 'Images', 'display_service_images', 'service', 'normal', 'high');

}

function display_service_images()
{

global $post;

      $str = $post->post_title; 
        $str = strtolower($str);
        $str = str_replace(' ', '_', $str)."_images";

        $page = get_page_by_title( 'Portfolio' );
      $theID = $page->ID;

        $images = get_post_meta($theID,  $str , true);
    
     echo "<span class='vp-active-gallery' data-active=". $str."></span>";


?>

    <div id="vp-pfui-format-gallery-preview" class="vp-pfui-elm-block vp-pfui-elm-block-image">
 
  <div class="vp-pfui-elm-container">


    <div class="vp-pfui-gallery-picker">
      <?php



        echo '<div class="gallery clearfix '.$str.'">';
        if ($images) {
          foreach ($images as $image) {
            $thumbnail = wp_get_attachment_image_src($image, 'thumbnail');
            echo '<span data-id="' . $image . '" title="' . 'title' . '" data-gallery="' . $str. '"><img src="' . $thumbnail[0] . '" alt="" /><span class="close">x</span></span>';
          }
        }
        echo '</div>';
      ?>
      <input type="hidden" name="<?php echo $str;?>" value="<?php echo (empty($images) ? "" : implode(',', $images)); ?>" />
      <p class="none"><a href="#" class="button vp-pfui-gallery-button" data-name="<?php echo $post->post_title;?>">
      <?php _e('Pick Images', 'vp-post-formats-ui'); ?></a></p>
    </div>


  </div>
</div>


  <?php 



}

function display_product_information()
{

  echo "<span class='vp-active-gallery'></span>";

    $args = array('post_type' => 'service');
  $the_query = get_posts( $args );

  foreach ($the_query as $named) { ?>

    <div id="vp-pfui-format-gallery-preview" class="vp-pfui-elm-block vp-pfui-elm-block-image">
  <label><span><?php _e($named->post_title, 'vp-post-formats-ui'); ?></span></label>
  <div class="vp-pfui-elm-container">


    <div class="vp-pfui-gallery-picker">
      <?php
        // query the gallery images meta
        global $post;
        
        $str = $named->post_title; 
        $str = strtolower($str);
        $str = str_replace(' ', '_', $str)."_images";
        $images = get_post_meta($post->ID,  $str, true);


        echo '<div class="gallery clearfix '.$str.'">';
        if ($images) {
          foreach ($images as $image) {
            $thumbnail = wp_get_attachment_image_src($image, 'thumbnail');
            echo '<span data-id="' . $image . '" title="' . 'title' . '" data-gallery="' . $str. '"><img src="' . $thumbnail[0] . '" alt="" /><span class="close">x</span></span>';
          }
        }
        echo '</div>';
      ?>
      <input type="hidden" name="<?php echo $str;?>" value="<?php echo (empty($images) ? "" : implode(',', $images)); ?>" />
      <p class="none"><a href="#" class="button vp-pfui-gallery-button" data-name="<?php echo $named->post_title;?>">
      <?php _e('Pick Images', 'vp-post-formats-ui'); ?></a></p>
    </div>


  </div>
</div>


  <?php }
    

}


add_action('save_post', 'vp_pfui_format_gallery_save_post');

function vp_pfui_format_gallery_save_post($post_id) {


$page = get_page_by_title( 'Portfolio' );
      $theID = $page->ID;
    $args = array('post_type' => 'service');
  $the_query = get_posts( $args );

  foreach ($the_query as $named) {

        $str = $named->post_title; 
        $str = strtolower($str);
        $str = str_replace(' ', '_', $str)."_images";

  if (!defined('XMLRPC_REQUEST') && isset($_POST[$str])) {
    global $post;
    if( $_POST[$str] !== '' ) {
      $images = explode(',', $_POST[$str]);
    } else {
      $images = array();
    }
    update_post_meta($theID, $str, $images);
  }

}

}



function pw_load_scripts($hook) {


  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post'] ;
  if( !isset( $post_id ) ) return;

   $homepgname = get_the_title($post_id->ID);
  if($homepgname == 'Portfolio'){ 
  wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/portfolio.js', array(), '1.0' );
    wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
  }



}
add_action('admin_enqueue_scripts', 'pw_load_scripts');
add_action('admin_enqueue_scripts', 'service_scripts');


function service_scripts(){
    global $post_type;
    if( 'service' == $post_type ) {
   wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/portfolio.js', array(), '1.0' );
    wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );}
}



add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  // Hide the editor on the page titled 'Homepage'
  $homepgname = get_the_title($post_id);
  if($homepgname == 'Portfolio'){ 
    remove_post_type_support('page', 'editor');
  }
  
}



function yoasttobottom() {
  return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');