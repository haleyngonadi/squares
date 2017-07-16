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
            
              <p class="indent wow fadeIn">
           <b> Vital Squares</b> is a Nigeria-based company that specializes in the sales, service, and distribution of the <u>finest</u> house-finishing products: 
           <ul class="what">
           <li>wrought iron/stainless steel railings</li> 
           <li>gates</li>
            <li>fences</li> 
            <li>brick titles</li> 
            <li>lighting</li> 
            <li>door locks</li>

           </ul>

          <b> and much more.</b>

        </p>

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

</main>

<?php get_footer();?>