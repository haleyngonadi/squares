<?php
/** Vital Squares Functions **/



/*** Basic Functions ***/



add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );
add_theme_support( 'title-tag' );


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
      'taxonomies'          => array( 'kind' ),
    );
    register_post_type( 'portfolio', $portfolio );



}
add_action( 'init', 'codex_custom_init' );

/*** Custom Taxomy ***/



//hook into the init action and call create_Types_nonhierarchical_taxonomy when it fires

add_action( 'init', 'create_Types_nonhierarchical_taxonomy', 0 );

function create_Types_nonhierarchical_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'popular_items' => __( 'Popular Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'separate_items_with_commas' => __( 'Separate Types with commas' ),
    'add_or_remove_items' => __( 'Add or remove Types' ),
    'choose_from_most_used' => __( 'Choose from the most used Types' ),
    'menu_name' => __( 'Types' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('Types','portfolio',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Type' ),
  ));
}


