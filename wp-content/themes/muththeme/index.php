<?php get_header();?>

	<section class="slider">
      <div class="muth-banner-image"></div> <!-- muth-banner-image -->
    </section> <!-- slider -->

    <section class="services">
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
          <!-- <a href="#">Chcete elegantný a funkčný web?<span style="color: green;"> Oslovte nás.</span></a> -->
          <?php dynamic_sidebar( 'fast_contact-sidebar' ); ?>
        </div> <!-- row -->
      </div> <!-- muth-fast-contact-content -->
    </section> <!-- muth-fast-contact -->
    
  <?php endif; ?>

    <section class="muth-testimonial">
      <div class="muth-testimonial-content">
        <div class="row">
          <div class="muth-testimonial-text">
            <div class="muth-quote-mark-left muth-icon">
              <span class="muth-muth-quote-first"></span>
            </div> <!-- muth-quote-mark-left muth-icon -->
            <ul >
           
            <?php $count=0;
              foreach (get_testimonial() as $testimonial):
                $activated = ($count < 1) ? 'class="testimonial-activated"' : '';
                  echo '<li id="muth-testimonial-list-'.$count.'" '.$activated.'>';
                  echo '<p>'. $testimonial['content'].'</p>';
                  echo '<p class="muth-testimonial-author">- '.$testimonial['client_name'].' -</p>';
                  echo '</li>';
                $count++;
              endforeach;?>
              
            </ul>

            <div class="muth-quote-mark-right muth-icon">
              <span class="muth-muth-quote-last"></span>
            </div><!-- muth-quote-mark-right muth-icon -->
          </div> <!-- muth-testimonial-text -->

          <ul id="muth-testimonial-controller-id" class="muth-testimonial-controller">
          <?php for($i = 0; $i< $count ; $i++ ):
            $activated = ($i < 1) ? 'class="muth-controller-activated"' : '';
            echo '<li id="muth-controller-'.$i.'" value="'.$i.'" '.$activated.'></li>';
           endfor; ?>

          </ul> <!-- muth-testimonial-controller -->
        </div> <!-- row -->
      </div> <!-- muth-testimonial-content -->
    </section> <!-- muth-testimonial -->


    <?php if ( is_active_sidebar( 'partners-sidebar' ) && is_active_sidebar( 'partners-title-sidebar' ) ): ?>
      <section class="partners">
        <div class="muth-partners-content">
          <div class="row">
            <?php dynamic_sidebar( 'partners-title-sidebar' ); ?>
            <div class="muth-subheader"></div>
              <div class="muth-partners-logos">
                <ul>
                  <?php dynamic_sidebar( 'partners-sidebar' ); ?>
                </ul>
              </div><!-- muth-partners-logos -->
          </div><!-- row -->
        </div><!-- muth-partners-content -->
      </section><!-- partners -->
    <?php endif; ?>


<?php get_footer();?>