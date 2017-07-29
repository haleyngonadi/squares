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
		<?php while ( have_posts() ) : the_post() ?>
		<h2 class="page-title"><span><?php the_title()?></span> </h2>		
		<?php endwhile; ?>

		            <?php 
// the query
$the_query = new WP_Query( array ('post_type' => 'service', 'posts_per_page' => -1, 'orderby' => 'title') ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<section class="services">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		               <div class="col-md-4 wow bounceIn">
     <div class="module">
		<h3><?php the_title(); ?></h3>
         <p><?php the_content(); ?></p>

     </div>
   </div>



	<?php endwhile; ?>
	</section>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no services were found.' ); ?></p>
<?php endif; ?>


		<h2 class="follow"><span>Follow Us</span></h2>
		<ul class="socials rounded">
            <li> <a href="https://twitter.com/vital_squares" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li> <a href="https://facebook.com/vitalsquares" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li> <a href="https://instagam.com/vitalsquares" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

            </ul>

	</main><!-- .site-main -->


</div><!-- .content-area -->


<?php get_footer(); ?>
