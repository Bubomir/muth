<?php get_header();

	//registracia JS a CSS pre contact form 7
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	    wpcf7_enqueue_scripts();
	}
 
    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
        wpcf7_enqueue_styles();
    }

?>

	<section class="slider">
  <div class="slider-content">
    <div class="row">
          <div class="muth-banner-text">
            <h1 class="wow fadeInUp">Budúcnosť Vášho webu v našich rukách</h1>
            <h2 data-wow-delay=".1s" class="wow fadeInUp">Máte veľké očakávanie od Vášej web stránky alebo potrebujete IT riešienie? Nemusíte hľadať ďalej ste na správnom mieste! Ponúkamé tvorbu web stránok, web aplikácií, IT Outsourcing a iné...</h2>
          </div>
          <div class="muth-banner-image">
            <img data-wow-delay=".2s" class="animated fadeInUp wow" src="http://www.muth.sk/wp-content/uploads/2016/08/monitor.png">
            <img data-wow-delay=".3s" data-wow-duration="2s" class="muth-banner-notebook animated bounceInLeft wow" src="http://www.muth.sk/wp-content/uploads/2016/08/notebook.png">
            <img data-wow-delay=".3s" data-wow-duration="2s" class="muth-banner-mobile-group animated bounceInRight wow" src="http://www.muth.sk/wp-content/uploads/2016/08/mobile-group.png">
            <img class="muth-mobile-slider" src="http://www.muth.sk/wp-content/uploads/2016/08/mobile.png">
          </div>
      </div>
  </div>
    </section> <!-- slider -->

    <section class="services">
    <div class="row">
      <div class="muth-services-header wow fadeInUp">Naše služby</div>
    </div>
      <div class="muth-icon-menu">
        <div class="row">
          
         <?php if ( is_active_sidebar( 'icon-sidebar' ) ): ?>
                <?php dynamic_sidebar( 'icon-sidebar' ); ?>
          <?php endif; ?>

        </div> <!-- row -->
      </div> <!-- muth-icon-menu -->
    </section> <!-- services -->
   
   <?php if ( is_active_sidebar( 'fast_contact-sidebar' ) ): ?>

    <section class="muth-fast-contact">
      <div class="muth-fast-contact-content">
        <div class="row">
          <?php dynamic_sidebar( 'fast_contact-sidebar' ); ?>
        </div> <!-- row -->
      </div> <!-- muth-fast-contact-content -->
    </section> <!-- muth-fast-contact -->
    
  <?php endif; ?>

  <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="muth-modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="muth-modal-title" id="myModalLabel">Kontaktný formulár</h4>
          </div>
          <div class="muth-modal-body">
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
          
            <!-- <form>
              <label>Meno</label>
              <input class="muth-contact-form-name-input" type="" name="">
               <label>Email</label>
              <input class="muth-contact-form-name-input" type="" name="">
              <label class="muth-contact-form-text-label">Obsah</label>
              <textarea class="muth-contact-form-text-textarea"></textarea>
            </form>
            <input type="submit" class="muth-button"> -->
          </div>
        </div>
      </div>
    </div>

    <?php if(!empty(get_testimonial())): ?>
    <section class="muth-testimonial">
      <div class="muth-testimonial-content">
        <div class="row">
        <div class="muth-testimonial-header wow fadeInUp">Povedali o nás...</div>        
          <div class="muth-testimonial-text">
            <div data-wow-delay=".1s" class="muth-quote-mark-left muth-icon wow bounceInLeft">
              <span class="muth-muth-quote-first"></span>
            </div> <!-- muth-quote-mark-left muth-icon -->
            <ul>
           
            <?php $count=0;
              foreach (get_testimonial() as $testimonial):
                $activated = ($count < 1) ? 'class="testimonial-activated wow fadeInUp"' : '';
                  echo '<li id="muth-testimonial-list-'.$count.'" '.$activated.'>';
                  echo '<p>'. $testimonial['content'].'</p>';
                  echo '<p class="muth-testimonial-author">- '.$testimonial['client_name'].' -</p>';
                  echo '</li>';
                $count++;
              endforeach;?>
              
            </ul>

            <div data-wow-delay=".1s" class="muth-quote-mark-right muth-icon wow bounceInRight">
              <span class="muth-muth-quote-last"></span>
            </div><!-- muth-quote-mark-right muth-icon -->
          </div> <!-- muth-testimonial-text -->

          <?php if(sizeof(get_testimonial()) > 1): ?>

          <ul id="muth-testimonial-controller-id" data-wow-delay=".1s" class="muth-testimonial-controller wow bounceInUp">
          <?php for($i = 0; $i< $count ; $i++ ):
            $activated = ($i < 1) ? 'class="muth-controller-activated"' : '';
            echo '<li id="muth-controller-'.$i.'" data-index="'.$i.'" '.$activated.'></li>';
           endfor; ?>

          </ul> <!-- muth-testimonial-controller -->
          <?php  endif;?>
        </div> <!-- row -->
      </div> <!-- muth-testimonial-content -->
    </section> <!-- muth-testimonial -->
  <?php endif; ?>

    <?php if ( is_active_sidebar( 'partners-sidebar' ) && is_active_sidebar( 'partners-title-sidebar' ) ): ?>
      <section class="partners">
        <div class="muth-partners-content">
          <div class="row">
            <?php dynamic_sidebar( 'partners-title-sidebar' ); ?>
              <div class="muth-partners-logos wow fadeInUp">
                <ul>
                  <?php dynamic_sidebar( 'partners-sidebar' ); ?>
                </ul>
              </div><!-- muth-partners-logos -->
          </div><!-- row -->
        </div><!-- muth-partners-content -->
      </section><!-- partners -->
    <?php endif; ?>


<?php get_footer();?>