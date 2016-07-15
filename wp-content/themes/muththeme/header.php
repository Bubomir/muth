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
       <a href="<?php echo get_home_url(); ?>"><img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" /></a>
      </div>

      <div id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
        <svg width="800px" height="800px">
          <path id="pathA" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
          <path id="pathB" d="M 300 500 L 700 500"></path>
          <path id="pathC" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
        </svg>
        <button id="menu-icon-trigger" class="menu-icon-trigger"></button>
      </div><!-- menu-icon-wrapper -->

      <nav class="muth-nav-menu">
        <div id="main-menu" class="mobile-menu-deactivated">
         <?php wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'walker' => new Walker_Nav_Primary()
                  )
                ); ?>
        </div>
      </nav><!-- muth-nav-menu -->

      <nav> <!-- PRIDAT CSS TRIEDU class="muth-navbar-languages" PRE AKTIVACIU LANG MENU NA MOBILNOM ZARIADENI -->
        <ul class="muth-icon">
          
        <?php
          //custom language switcher 
          if(function_exists('pll_the_languages')):
            $custom_languages = pll_the_languages(array('raw' => 1,));
            $current_lang = pll_current_language();
            
            foreach ($custom_languages as $custom_language):
              if($custom_language['slug'] == $current_lang){
                $active = 'muth-active_lang_menu';
              }
              else{
                 $active = '';
              }
              /*
                ODKOMENTOVAT PRE AKTIVACIU LANGUAGE MENU 
              */

               // echo '<li><a class="'.$custom_language['classes'][2].' '.$active.'" href='.esc_url($custom_language['url']).'></a></li>';

            endforeach;
          endif; ?>

        </ul> <!-- muth-icon -->
      </nav> <!-- muth-navbar-languages -->


    </section> <!-- muth-navbar -->