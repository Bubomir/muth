		<footer>
			<div class="muth-container">
        <div class="muth-main-footer">
          
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ): ?>
                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
              <?php endif; ?>
           
         
          <div data-wow-delay=".2s" class="muth-footer-sitemap wow fadeInUp">
            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ): ?>
               <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
              <?php endif; ?>
              <hr>
            <div>
              <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
            </div>
          </div>
          <div data-wow-delay=".3s" class="muth-contact wow fadeInUp">
            <div class="muth-footer-table">
              <table>
              <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ): ?>
                <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
              <?php endif; ?>
              </table>
            </div>
            <ul class="muth-icon">
              <li data-wow-delay=".5s" class="wow fadeInUp"><a class="muth-muth-fb" href="https://www.facebook.com/muth.sk/?fref=ts" target="_blank"></a></li>
              <li data-wow-delay=".6s" class="wow fadeInUp"><a class="muth-muth-twiter"></a></li>
              <li data-wow-delay=".7s" class="wow fadeInUp"><a class="muth-muth-linkedin"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="muth-secondary-footer">
        <h4><?php _e( '&copy; ' ); ?>
            <?php echo date( 'Y' ); ?>
            <span> <?php bloginfo( 'name' ); ?> </span>
            <span> | </span>
            <?php if ( is_active_sidebar( 'footer-sidebar-copyright' ) ):?>
                <?php dynamic_sidebar( 'footer-sidebar-copyright' ); ?>
            <?php endif; ?>
        </h4>
      </div> 
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>