		<footer>
			<div class="muth-container">
        <div class="muth-main-footer">
          <div class="muth-footer-text-moto">
            <a href="<?php echo get_home_url(); ?>"><img src="img/Logo.png"></a>
            <hr>
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ): ?>
                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
              <?php endif; ?>
            <h4>Príjímame nové zákazky</h4>
          </div>
          <div class="muth-footer-sitemap">
            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ): ?>
               <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
              <?php endif; ?>
              <hr>
            <ul>
              <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
            </ul>
          </div>
          <div class="muth-contact">
            <div class="muth-footer-table">
              <table>
              <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ): ?>
                <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
              <?php endif; ?>
                
              </table>
            </div>
            <ul class="muth-icon">
              <li><a class="muth-muth-fb"></a></li>
              <li><a class="muth-muth-twiter"></a></li>
              <li><a class="muth-muth-linkedin"></a></li>
              <li><a class="muth-muth-rss"></a></li>
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