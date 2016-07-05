<?php
/*
Template Name: Contact Page
*/
get_header();

//registracia JS a CSS pre contact form 7
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
        wpcf7_enqueue_scripts();
    }
 
    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }
?>

<section class="muth-all-contacts">
    <div class="muth-all-contacts-content">
        <div class="row">
        <h3>

        <?php 
          while (have_posts()) : the_post(); 
            echo get_the_content();
          endwhile;
         ?>

         </h3>
            
            <div class="muth-subheader"></div> <!-- muth-subheader -->
        </div> <!-- row --> 
            
        <div class="row">
        	<?php
        	 	//language switcher for contact multi-lang form 
        	$lang = get_bloginfo('language'); 
        	switch ($lang):
        	 	case 'sk-SK':
                    echo do_shortcode('[contact-form-7 id="167" title="Kontaktný formulár SK"]');
        	 		break;
        	 	case 'cs-CZ':
        	 		echo do_shortcode('[contact-form-7 id="175" title="Kontaktný formulár CZ"]');
        	 		break;
        	 	case 'en-US':
        	 		echo do_shortcode('[contact-form-7 id="176" title="Kontaktný formulár EN"]');
        	 		break;
        	 	case 'de-DE':
        	 		echo do_shortcode('[contact-form-7 id="177" title="Kontaktný formulár DE"]');
        	 		break;
        	 	default:
        	 		//echo 'neznamy jazyk';
        	 		break;
        	 endswitch;?>
            
            <ul>
              <li>
                <svg enable-background="new 0 0 153 153" height="153px" id="Layer_1" version="1.1" viewBox="0 0 153 153" width="153px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M152.5,122.101c0,16.789-13.611,30.399-30.4,30.399H30.9c-16.789,0-30.4-13.61-30.4-30.399V30.9   c0-16.79,13.611-30.4,30.4-30.4H122.1c16.789,0,30.4,13.61,30.4,30.4V122.101z" fill="#F1635A"/><g><path d="M123.701,41.469c-1.482-0.614-3.092-0.962-4.781-0.962H34.08c-1.689,0-3.301,0.348-4.781,0.962    L76.5,70.818L123.701,41.469z" fill="#FFFFFF"/><path d="M77.938,82.019c-0.018,0.005-0.037,0.005-0.055,0.009c-0.172,0.024-0.344,0.044-0.518,0.059    c-0.057,0.004-0.111,0.01-0.17,0.014c-0.135,0.008-0.27,0.016-0.406,0.02c-0.098,0.002-0.193,0.004-0.289,0.004    s-0.193-0.002-0.289-0.004c-0.137-0.004-0.271-0.012-0.408-0.02c-0.057-0.004-0.111-0.01-0.168-0.014    c-0.174-0.015-0.346-0.034-0.518-0.059c-0.02-0.004-0.037-0.004-0.055-0.009c-1.109-0.163-2.172-0.513-3.059-1.063L21.809,49.744    c-0.429,1.34-0.669,2.77-0.669,4.26v44.991c0,7.456,5.794,13.498,12.94,13.498h84.84c7.146,0,12.941-6.042,12.941-13.498V54.004    c0-1.49-0.24-2.92-0.67-4.26l-50.195,31.21C80.109,81.506,79.047,81.855,77.938,82.019z" fill="#FFFFFF"/></g></g></svg>
                <p>jozef.biros91@gmail.com</p>
              </li>
              <li>
                <svg enable-background="new 0 0 153 153" height="153px" id="Layer_1" version="1.1" viewBox="0 0 153 153" width="153px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M152.5,122.426c0,16.789-13.611,30.4-30.398,30.4h-91.2c-16.789,0-30.4-13.611-30.4-30.4v-91.2   c0-16.79,13.611-30.4,30.4-30.4h91.2c16.787,0,30.398,13.61,30.398,30.4V122.426z" fill="#ADD79C"/><g><path d="M126.439,114.133c3.848-7.17-4.379-11.625-4.379-11.625c-5.467-3.557-10.936-7.113-16.402-10.67    c-5.271-3.43-8.537-2.107-11.725,0.85l27.598,27.836C123.285,118.764,124.928,116.648,126.439,114.133z" fill="#FFFFFF"/><path d="M58.392,42.886c-3.693-5.621-10.289-20.935-19.332-16.027c-2.308,1.4-4.277,2.904-5.939,4.494    l27.406,27.643C64.312,53.937,62.991,49.885,58.392,42.886z" fill="#FFFFFF"/><path d="M56.567,63.193L29.389,35.781c-12.897,19.5,9.584,48.204,23.651,63.042    c14.238,15.018,44.042,37.795,63.972,25.334L89.955,96.865C78.656,107.705,45.83,74.266,56.567,63.193z" fill="#FFFFFF"/></g></g></svg>
                <p>+421 918 867 525</p>
              </li>
            </ul>
        </div> <!-- row -->
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->


<?php if ( is_active_sidebar( 'contact_map-sidebar' ) ): ?>

  <?php dynamic_sidebar( 'contact_map-sidebar' ); ?>

<section class="muth-map">
  <div class="muth-map-content">
    <div class="row">
      <?php 
      if ( is_active_sidebar( 'contact_map_title-sidebar' ) ): 
         dynamic_sidebar( 'contact_map_title-sidebar' ); 
       endif;
        ?>
      <div class="muth-subheader"></div> <!-- muth-subheader -->
      
      <div class="muth-google-map">
        <div class="muth-map"></div> <!-- muth-map --> 
      </div> <!-- muth-google-map -->

      <div class="muth-address">
        <div class="muth-normal-address">
          <div class="muth-adress-name  muth-icon">
          <div class=" muth-muth-fb"></div>
            <!-- <svg height="60px" version="1.1" viewBox="0 0 60 60" width="60px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill-rule="evenodd" id="soical" stroke="none" stroke-width="1"><g id="social" transform="translate(-573.000000, -738.000000)"><g id="slices" transform="translate(173.000000, 138.000000)"/><g  id="square-flat" transform="translate(173.000000, 138.000000)"><path d="M402.995937,600 L457.004063,600 C458.658673,600 460,601.33731 460,602.995937 L460,657.004063 C460,658.658673 458.66269,660 457.004063,660 L402.995937,660 C401.341327,660 400,658.66269 400,657.004063 L400,602.995937 C400,601.341327 401.33731,600 402.995937,600 Z" id="square-65"/></g><g fill="#FFFFFF" id="icon" transform="translate(182.000000, 150.000000)"><path d="M409.307692,614.384615 C409.307692,620.757692 420.846154,635.663161 420.846154,635.258357 C420.846154,634.853553 432.384615,620.757692 432.384615,614.384615 C432.384615,608.011538 427.215385,602.846154 420.846154,602.846154 C414.476923,602.846154 409.307692,608.011538 409.307692,614.384615 Z M415.076923,613.230769 C415.076923,616.417308 417.661538,619 420.846154,619 C424.030769,619 426.615385,616.417308 426.615385,613.230769 C426.615385,610.044231 424.030769,607.461538 420.846154,607.461538 C417.661538,607.461538 415.076923,610.044231 415.076923,613.230769 Z" id="location"/></g></g></g></svg> -->
            <h4> Korešpondenčná adresa</h4>
          </div> <!-- muth-adress-name -->
          <ul>
            <li>Predmeská 66</li>
            <li>Žilina 010 01</li>
          </ul>
        </div> <!-- muth-normal-address -->
        
        <div class="muth-correspondedn-address">
          <div class="muth-adress-name">
            <svg height="60px" version="1.1" viewBox="0 0 60 60" width="60px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill-rule="evenodd" id="soical" stroke="none" stroke-width="1"><g id="social" transform="translate(-573.000000, -738.000000)"><g id="slices" transform="translate(173.000000, 138.000000)"/><g  id="square-flat" transform="translate(173.000000, 138.000000)"><path d="M402.995937,600 L457.004063,600 C458.658673,600 460,601.33731 460,602.995937 L460,657.004063 C460,658.658673 458.66269,660 457.004063,660 L402.995937,660 C401.341327,660 400,658.66269 400,657.004063 L400,602.995937 C400,601.341327 401.33731,600 402.995937,600 Z" id="square-65"/></g><g fill="#FFFFFF" id="icon" transform="translate(182.000000, 150.000000)"><path d="M409.307692,614.384615 C409.307692,620.757692 420.846154,635.663161 420.846154,635.258357 C420.846154,634.853553 432.384615,620.757692 432.384615,614.384615 C432.384615,608.011538 427.215385,602.846154 420.846154,602.846154 C414.476923,602.846154 409.307692,608.011538 409.307692,614.384615 Z M415.076923,613.230769 C415.076923,616.417308 417.661538,619 420.846154,619 C424.030769,619 426.615385,616.417308 426.615385,613.230769 C426.615385,610.044231 424.030769,607.461538 420.846154,607.461538 C417.661538,607.461538 415.076923,610.044231 415.076923,613.230769 Z" id="location"/></g></g></g></svg>
            <h4> Korešpondenčná adresa</h4>
          </div> <!-- muth-adress-name -->
          <ul>
            <li>Na Záhumní</li>
            <li>013 02 Nededza</li>
          </ul>
        </div> <!-- muth-correspondedn-address -->
      </div> <!-- muth-address -->

    </div> <!-- row -->
  </div>  <!-- muth-map-content -->
</section> <!-- muth-map -->

<?php endif; ?>

<?php get_footer(); ?>
	
