<?php
/**
 * Footer Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 */
?>
      </div><!-- .main-wrapper -->

      <footer id="colophon" style="background-color:black; height:30px">
         <div class="inner-wrap">
            <?php get_sidebar( 'footer' ); ?>

            <div class="footer-bottom clearfix">
               <div>    
				  <p style="font-color:white">
					  © Copyright 2020 By Philanthropic Heart
				  </p>
				  <img style="float:right" src="https://eldercareplus.tk/wp-content/uploads/2020/04/logo6.png" />
               </div>

               <div class="footer-nav">
               <?php
                  if ( has_nav_menu( 'footer' ) ) {
                     wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => -1 ) );
                  }
               ?>
               </div>
            </div>
         </div>
      </footer>
      <a href="#masthead" id="scroll-up"><i class="fa fa-angle-up"></i></a>
   </div><!-- #page -->
   <?php wp_footer(); ?>
</body>
</html>