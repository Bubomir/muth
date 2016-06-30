<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
    <title><?php bloginfo( 'name' ); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
		<?php wp_head();?>
	</head>

	<body>
    <section class="muth-navbar">
            <div id="muth-logo" class="muth-nav-logo muth-logo-mobile-deactivated">
              <img src="img/logo.png">
            </div>
            <div id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
                    <svg width="1000px" height="1000px">
                      <path id="pathA" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                      <path id="pathB" d="M 300 500 L 700 500"></path>
                      <path id="pathC" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
                    </svg>
                    <button id="menu-icon-trigger" class="menu-icon-trigger"></button>
                  </div><!-- menu-icon-wrapper -->
            <nav class="muth-nav-menu">
              <ul id="main-menu" class="mobile-menu-deactivated">
               <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
              </ul>
            </nav>

            <div class="muth-navbar-languages">
              <nav>
                <ul><?php
                  //custom language switcher 
                    if(function_exists('pll_the_languages')){
                      $custom_languages = pll_the_languages(array('raw' => 1));
                      foreach ($custom_languages as $custom_language) {
                        echo '<li><a href='.esc_url($custom_language['url']).'>'.$custom_language['slug'].' </a></li>';
                      }
                    } ?>
                </ul>
              </nav>
      </div>
    </section>