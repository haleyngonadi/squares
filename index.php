<?php
/**
 * The main template file
 * @package WordPress
 * @subpackage Vital_Squares
 * @since Squares 1.0
 */

get_header(); ?>


<main class="content">


        
        <section class="welcome"  id="about">

        <div class="row">

        	 <div class="col-sm-6">

<div class="owl-carousel owl-theme">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=1" data-src-retina="https://placehold.it/350x250&text=1-retina" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=2" data-src-retina="https://placehold.it/350x250&text=2-retina" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=3" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=4" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=5" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=6" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=7" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=8" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=9" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=10" alt="">
    <img class="owl-lazy" data-src="https://placehold.it/350x250&text=11" alt="">
</div>

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

         <section id="works" class="works">
            <h2 class="title"><span>Portfolio</span></h2>


<div class="galleries">
  <div id="buttons"></div>
  <div id="gallery" class="row">
    <img class="col-sm-3 img-class" data-tags="Animators,Illustrators" src="http://lorempixel.com/g/351/220/fashion/1" alt="" />
    <img class="col-sm-3 img-class" data-tags="Photographers,Filmmakers" src="http://lorempixel.com/g/351/220/fashion/" alt="" />
    <img class="col-sm-3 img-class" data-tags="Photographers,Filmmakers" src="http://lorempixel.com/g/351/220/fashion/3" alt="" />
    <img class="col-sm-3 img-class" data-tags="Designers" src="http://lorempixel.com/g/351/220/fashion/4" alt="" />
    <img class="col-sm-3 img-class" data-tags="Filmmakers" src="http://lorempixel.com/g/351/220/fashion/5" alt="" />
    <img class="col-sm-3 img-class" data-tags="Designers" src="http://lorempixel.com/g/351/220/fashion/6" alt="" />
    <img class="col-sm-3 img-class" data-tags="Animators,Photographers" src="http://lorempixel.com/g/351/220/fashion/7" alt="" />
    <img class="col-sm-3 img-class" data-tags="Designers" src="http://lorempixel.com/g/351/220/fashion/8" alt="" />
    <img class="col-sm-3 img-class" data-tags="Animators,Illustrators" src="http://lorempixel.com/g/351/220/fashion/9" alt="" />
    <img class="col-sm-3 img-class" data-tags="Animators,Illustrators" src="http://lorempixel.com/g/351/220/fashion/10" alt="" />
  </div>

</div>



</section>


           <section id="contact" class="contact">
            <h2 class="title"><span>Contact Us</span></h2>


            <div  class="row">

            <div class="col-md-6">
              
              <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?>



            </div>
            <div class="col-md-6">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2908.407080351659!2d-79.86195108446081!3d43.20095038957437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s141+Eaglewood+Dr%2C+Hamilton%2C+ON+L8W+3X7%2C+Canada!5e0!3m2!1sen!2sca!4v1500313460701" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>


              
              <?php $options = get_option( 'pu_theme_options' );
              echo $options['pu_directions'];
              ?>

            </div>

            </div>


            </section>

</main>

<?php get_footer();?>