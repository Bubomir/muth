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

<section class="muth-map">
  <div class="muth-map-content muth-page-content">
    <div class="row">

      <div class="muth-page-title"> 
          
         <h1><?php if(get_field('title_page')): the_field('title_page'); endif; ?></h1>

          </div> <!-- muth-page-title -->
          
          <div class="muth-subheader-line"></div> <!-- muth-subheader -->
      
      <div class="muth-google-map">
        <div id="muth-google-map-id" class="muth-map"></div> <!-- muth-map --> 
      </div> <!-- muth-google-map -->

      <div class="muth-address">
<?php
      //check if the repeater field has rows of data
       if( have_rows('addresses') ):
        $glyphicon_counter = 0;
       //loop through the rows of data
           while ( have_rows('addresses') ) : the_row();

            if ($glyphicon_counter%2):
              $glyphicon_class = 'map-marker-muth-correspondece'; //korespondencna
            else:
              $glyphicon_class = 'map-marker-muth-normal'; //normalna
            endif;

             $address_type = get_sub_field('address_type');
             $street = get_sub_field('street');
             $city = get_sub_field('city');
             $štat = get_sub_field('štat');
             $zip = get_sub_field('zip');

             ?>
      
        <div class="muth-normal-address">
            <div class="muth-icon"> 
              <div class="<?php echo  $glyphicon_class; ?>">
              </div>
            </div>

          <div class="muth-address-content">
            <h4><?php echo $address_type;?></h4>
            <ul>
              <li><?php echo $street;?></li>
              <li><?php echo $city.__(' ').$zip;?></li>
              <li><?php echo $štat;?></li>
            </ul>
          </div>
        </div> <!-- muth-normal-address -->

      <?php
          $glyphicon_counter++;
          endwhile;
      else :
          // no rows found
      endif;?>
</div> <!-- muth-address -->
    

    </div> <!-- row -->
  </div>  <!-- muth-map-content -->
</section> <!-- muth-map -->

<section class="muht-page-full-width muth-page-background-gray">
    <div class="muth-all-contacts-content muth-page-content">
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
              <div class="muth-icon">
                <div class="muth-2"></div>
              </div>
                <p><?php if(get_field('email')): the_field('email'); endif; ?></p>
              </li>
              <li>
              <div class="muth-icon">
                <div class="muth-smartphone2"></div>
              </div>
                <p><?php if(get_field('phone_num')): the_field('phone_num'); endif; ?></p>
              </li>
            </ul>
        </div> <!-- row -->
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->

<?php get_footer(); ?>