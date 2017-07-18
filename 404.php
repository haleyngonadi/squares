<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="page-area">
	<main id="main" class="site-main" role="main">

		<h2 class="page-title"><span>404: Page Not Found</span> </h2>

		<p>Sorry, the page you're looking for could not be found. Try <a href="/">returning home</a> and/or using the search button below!</p>

		<?php get_search_form()?>


		<h2 class="follow"><span>Follow Us</span></h2>
		<ul class="socials rounded">
            <li> <a href="https://twitter.com/vital_squares" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li> <a href="https://facebook.com/vitalsquares" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li> <a href="https://instagam.com/vitalsquares" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

            </ul>

	</main><!-- .site-main -->


</div><!-- .content-area -->


<?php get_footer(); ?>
