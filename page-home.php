<?php
/**
 * The main template file
 * @package WordPress
 * @subpackage Vital_Squares
 * @since Squares 1.0
 */

get_header('home'); ?>




<main class="content">


        
        <section class="welcome"  id="about">

        <div class="row">

        	 <div class="col-sm-6">

 <?php 
// the query
$the_query = new WP_Query( array ('post_type' => 'portfolio', 'posts_per_page' => 4, 'orderby' => 'rand') ); ?>

<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->

  <!-- the loop -->
<div class="owl-carousel owl-theme">
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php

$theslug = '';
foreach (get_the_category() as $category) {
    $theslug .= $category->name .',';
   
} 
$theslug = rtrim($theslug, ',');



?>

    <img class="owl-lazy" data-src="<?php the_post_thumbnail_url('featured-size')?>" alt="<?php echo $theslug;?>">
    <?php endwhile; ?>
  <!-- end of the loop -->

  <!-- pagination here -->
</div>


  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

        	  </div>
        <div class="col-sm-6">
            <h2 class="title"><span>About Us</span></h2>
            
               <?php $options = get_option( 'pu_theme_options' );
              echo $options['pu_about'];
              ?>


        </div></div>
            
        </section>


                <section id="services" class="services">
            <h2 class="title"><span>Services</span></h2>

         

            <?php 
// the query
$the_query = new WP_Query( array ('post_type' => 'service', 'posts_per_page' => 6, 'orderby' => 'rand') ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		               <div class="col-md-4 wow bounceIn">
     <div class="module">
		<h3><?php the_title(); ?></h3>
         <p><?php the_content(); ?></p>

     </div>
   </div>


	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>



             

            
        </section>

         <section id="portfolio" class="works">
            <h2 class="title"><span>Portfolio</span></h2>



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





</section>


           <section id="contact" class="contact">
            <h2 class="title"><span>Contact Us</span></h2>


            <div  class="row">

            <div class="col-md-6">
              
              <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?>



            </div>
            <div class="col-md-6">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.318693394897!2d3.3709669150149524!3d6.481261725450428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b875c943621%3A0x42e638fe573106ec!2sEbute-Metta+West%2C+Nigeria!5e0!3m2!1sen!2sca!4v1500402168020" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>


              
              <?php $options = get_option( 'pu_theme_options' );
              echo $options['pu_directions'];
              ?>



                        <ul class="socials">
            <li> <a href="" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li> <a href="" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>

            </ul>

            </div>


            </div>


            </section>

</main>

<?php get_footer();?>