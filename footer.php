<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	        <div class="footer">
            <a data-scroll data-options='{ "easing": "easeOutQuart" }' href="#up-top" class="totop"><i class="fa fa-angle-double-up"></i></a>
            <span class="wow shake"><?php echo comicpress_copyright(); ?> <b><?php echo get_bloginfo( 'name' ); ?></b> - All rights reserved.</span>
            
        </div>

<?php wp_footer(); ?>

	</body>
</html>
