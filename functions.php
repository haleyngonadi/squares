<?php
/** Vital Squares Functions **/



/*** Basic Functions ***/



add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );
add_theme_support( 'title-tag' );
add_image_size( 'portfolio-size', 320, 300, array( 'center', 'top' ) );

/** Menus **/


	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'squares' ),
		'social'  => __( 'Social Links Menu', 'squares' ),
	) );


	/*** Enqueue Styles & Scripts ***/


	function wpdocs_theme_name_scripts() {

    wp_enqueue_style( 'mainstyle', get_stylesheet_uri(),array(), '2.0' );
    wp_enqueue_style( 'componenet', get_template_directory_uri() . '/css/component.css',array(), '2.0' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css',array(), '1.0' );

    wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css',array(), '1.0' );

   wp_enqueue_script( 'js', '//code.jquery.com/jquery-2.2.4.min.js', array(), '1.0.0', true );

   wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
   wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.0', true );
   wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
   wp_enqueue_script( 'isotype-js', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), '1.0.0', true );




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


    $portfolio = array(
      'public' => true,
      'label'  => 'Portfolio',
      'menu_icon' => 'dashicons-images-alt2',
      'supports'           => array( 'title', 'thumbnail'),
      'taxonomies'          => array( 'category' ),
    );
    register_post_type( 'portfolio', $portfolio );



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

    add_settings_field( 'example_textbox', 'Example Textbox', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );
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

