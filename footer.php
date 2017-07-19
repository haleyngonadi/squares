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


        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102841388-1', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_footer(); ?>

	</body>
</html>
