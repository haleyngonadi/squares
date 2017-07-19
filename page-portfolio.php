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

<div id="primary" class="port-area">
  <main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post() ?>
    <h2 class="page-title"><span><?php the_title()?></span> </h2>

    <?php 
$args = array('post_type' => 'service');
$the_query = new WP_Query( $args ); 
$theID = $post->ID;?>

<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->
<div class="galleries">
  <div id="buttons"></div>
   <div id="gallery" class="row">
  <!-- the loop -->
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php 
        $str = get_the_title(); 
        $str = strtolower($str);
        $str = str_replace(' ', '_', $str)."_images";
        $images = get_post_meta($theID,  $str, true); 
     if ($images) {
          foreach ($images as $image) {
            $thumbnail = wp_get_attachment_image_src($image, 'portfolio-size');
            $full = wp_get_attachment_image_src($image, 'full');


            echo '<a class="image-link" href="' . $full[0] . '" style="outline: none">';
            echo '<img class="col-sm-3 img-active" src="' . $thumbnail[0] . '" alt="" data-tags="'.get_the_title().'"  />';
            echo '</a>';
          }
        }

    ?>
  <?php endwhile; ?>

  </div></div>
  <!-- end of the loop -->

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


       
    <?php endwhile; ?>

    <h2 class="follow"><span>Follow Us</span></h2>
    <ul class="socials rounded">
            <li> <a href="https://twitter.com/vital_squares" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li> <a href="https://facebook.com/vitalsquares" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li> <a href="https://instagam.com/vitalsquares" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

            </ul>

  </main><!-- .site-main -->


</div><!-- .content-area -->


<?php get_footer(); ?>
