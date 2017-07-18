<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700|Open+Sans:400,300,600,700,800|Oswald:400,700' rel='stylesheet' type='text/css'>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

        <div id="home" class="header">
     
            
            <div class="navigation">
                <div class="logo">
                	 <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo.svg">

                </div>

                </div>
      
                <div class="sub-menu">

              	<?php wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_id'        => 'top-menu',
			'container'        => 'nav',

			'container_class'        => 'cl-effect-1',

			) ); ?>



            </div>
                
            
            
        </div>


        <div class="container">