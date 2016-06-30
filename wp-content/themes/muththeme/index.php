<?php get_header();?>

	<section class="slider">
      <div class="muth-banner-image"></div>
    </section>

    <section class="services">
      <div class="muth-icon-menu">
        <div class="row">
          
         <?php if ( is_active_sidebar( 'icon-sidebar' ) ): ?>
                <?php dynamic_sidebar( 'icon-sidebar' ); ?>
          <?php endif; ?>

        </div>
      </div>
    </section>

    <section class="muth-fast-contact">
      <div class="muth-fast-contact-container">
      <div class="row">
        <nav class="cl-effect-1">
          <a href="#">Chcete elegantný a funkčný web?<span style="color: green;"> Oslovte nás.</span></a>
        </nav>
        </div>
      </div>
    </section>

    <section class="muth-testimonial">
        <div class="muth-testimonial-content">
          <div class="row">
            <div class="muth-testimonial-text">
        <div class="muth-quotation-marks-icon muth-quote-mark-left">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 351.128 351.128" style="enable-background:new 0 0 351.128 351.128;" xml:space="preserve">
          <g>
            <path d="M72.326,147.33c4.284-26.928,37.944-55.692,64.26-56.304c1.836,0,3.672-0.612,4.896-1.836   c1.224-0.612,2.448-1.224,3.06-3.06c9.18-17.136,4.284-30.6-11.016-41.616c-17.748-12.852-45.9,0-59.976,11.628   C38.054,85.518,1.946,136.313,3.782,184.662c-6.12,32.437-4.896,67.32,4.284,96.084c6.12,18.36,23.868,27.54,42.228,28.764   c18.36,1.225,56.304,6.732,72.828-4.283c16.524-11.017,17.748-32.437,19.584-50.796c1.836-20.196,7.344-58.141-9.792-74.053   C115.778,165.078,66.818,181.602,72.326,147.33z" />
            <path d="M274.286,147.33c4.284-26.928,37.943-55.692,64.26-56.304c1.836,0,3.672-0.612,4.896-1.836   c1.225-0.612,2.448-1.224,3.061-3.06c9.18-17.136,4.284-30.6-11.016-41.616c-17.748-12.852-45.9,0-59.977,11.628   c-35.496,29.376-71.604,80.172-69.768,128.52c-6.12,32.437-4.896,67.32,4.283,96.084c6.12,18.36,23.868,27.54,42.229,28.764   c18.36,1.225,56.304,6.732,72.828-4.283c16.523-11.017,17.748-32.437,19.584-50.796c1.836-20.196,7.344-58.141-9.792-74.053   C317.738,165.078,268.166,181.602,274.286,147.33z" />
          </g>
          </svg>
        </div>
          <?php 
          	foreach (get_testimonial() as $testimonial) {
          		echo '<p>'.$testimonial['content'].'</p>';
          		echo '<p class="muth-testimonial-author">- '.$testimonial['client_name'].' -</p>';
          	}
          ?>
          <div class="muth-quotation-marks-icon muth-quote-mark-right">
            <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" style="enable-background:new 0 0 351.128 351.128" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" height="512px" viewBox="0 0 351.128 351.128" width="512px" version="1.1" y="0px" x="0px" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"><g transform="matrix(-1 0 0 -1 351.13 351.13)"><path d="m72.326 147.33c4.284-26.928 37.944-55.692 64.26-56.304 1.836 0 3.672-0.612 4.896-1.836 1.224-0.612 2.448-1.224 3.06-3.06 9.18-17.136 4.284-30.6-11.016-41.616-17.748-12.852-45.9 0-59.976 11.628-35.496 29.376-71.604 80.171-69.768 128.52-6.12 32.437-4.896 67.32 4.284 96.084 6.12 18.36 23.868 27.54 42.228 28.764 18.36 1.225 56.304 6.732 72.828-4.283 16.524-11.017 17.748-32.437 19.584-50.796 1.836-20.196 7.344-58.141-9.792-74.053-17.136-15.3-66.096 1.224-60.588-33.048z"/><path d="m274.29 147.33c4.284-26.928 37.943-55.692 64.26-56.304 1.836 0 3.672-0.612 4.896-1.836 1.225-0.612 2.448-1.224 3.061-3.06 9.18-17.136 4.284-30.6-11.016-41.616-17.748-12.852-45.9 0-59.977 11.628-35.496 29.376-71.604 80.172-69.768 128.52-6.12 32.437-4.896 67.32 4.283 96.084 6.12 18.36 23.868 27.54 42.229 28.764 18.36 1.225 56.304 6.732 72.828-4.283 16.523-11.017 17.748-32.437 19.584-50.796 1.836-20.196 7.344-58.141-9.792-74.053-17.136-15.3-66.708 1.224-60.588-33.048z"/></g></svg>
          </div>
        </div>
        </div>
        </div>
    </section>
    <section class="partners">
      <div class="partners-content">
        <div class="row">
          <ul>
            <li><img src="">Ahoj</li>
          </ul>
        </div>
        
      </div>
      
    </section>
<?php get_footer();?>