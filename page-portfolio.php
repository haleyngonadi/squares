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
$the_query = new WP_Query( array ('post_type' => 'portfolio', 'posts_per_page' => -1) ); ?>

<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->
<div class="galleries">
  <div id="buttons"></div>
   <div id="gallery" class="row">
  <!-- the loop -->
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php

$theslug = '';
foreach (get_the_category() as $category) {
    $theslug .= $category->name .',';
   
} 
$theslug = rtrim($theslug, ',');



?>
  <a class="image-link" href="<?php the_post_thumbnail_url('full')?>" style="outline: none">
  <img class="col-sm-3 img-active" data-tags="<?php echo $theslug;?>" src="<?php the_post_thumbnail_url('portfolio-size')?>" alt="<?php echo $theslug;?>" /></a>


  <?php endwhile; ?>
  <!-- end of the loop -->
</div></div>
  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e( 'Sorry, no pictures were found..' ); ?></p>
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
