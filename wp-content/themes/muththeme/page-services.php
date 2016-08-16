<?php
/*
Template Name: Services Page
*/
?>
<?php get_header(); ?>

<section class="muht-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-title wow fadeInUp"> 
        	
        	<h1><?php if(get_field('title')): the_field('title'); endif; ?></h1>

        	</div> <!-- muth-page-title -->
        </div> <!-- row --> 
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->


<?php 
//check if the repeater field has rows of data
if( have_rows('services') ):
    $dif_counter = 0;
 	// loop through the rows of data
    while ( have_rows('services') ) : the_row();
        if($dif_counter%2){
            $color_class = 'muth-page-background-white';
            $muth_span_right_class = 'class="muth-span-right wow fadeInUp"';
            $muth_text_right_class = 'class="muth-text-right wow fadeInUp"';
            $muth_img_left         = 'class="muth-img-left wow bounceInLeft"';
        }
        else{
            $color_class = 'muth-page-background-gray';
            $muth_span_right_class = 'class="wow fadeInUp"';
            $muth_text_right_class = 'class="wow fadeInUp"';
            $muth_img_left         = 'class="wow bounceInRight"';
        }

        switch ($dif_counter) {
            case 0:
                $title_delay = 'data-wow-delay=".3s"';
                $text_delay = 'data-wow-delay=".6s"';
                $img_delay = 'data-wow-delay=".9s"';
                break;
            case 1:
                $title_delay = 'data-wow-delay="1.2s"';
                $text_delay = 'data-wow-delay="1.6s"';
                $img_delay = 'data-wow-delay="1.9s"';
                break;
            default:
                $title_delay = '';
                $text_delay = '';
                $img_delay = '';
                break;
        }

        // display a sub field value
       $services_name =get_sub_field('services_name');
       $services_description = get_sub_field('services_description', false);
       $picture =get_sub_field('picture');
              
       ?>

            <section class="muht-page-full-width <?php echo $color_class; ?>">
            <div class="muth-page-content">
                <div class="row">
                    <div class = 'muth-services'>
                        <span <?php if (isset($muth_span_right_class)): echo $muth_span_right_class; endif; ?>>
                        <h2 <?php if (isset($muth_text_right_class)): echo $muth_text_right_class; endif; ?> <?php echo $title_delay;?> ><?php echo $services_name; ?></h2>
                           <p class="wow fadeInUp" <?php echo $text_delay;?>> <?php echo ( $services_description); ?> </p>
                        </span>
                        <?php 

                        $class_output = (isset($muth_img_left))?  $muth_img_left : __('');
                        $alt_img = (isset($picture['alt']) && !empty($picture['alt']))?  'alt="'.$picture['alt'].'"' : __('');

                        if(isset($picture['url']) && !empty($picture['url'])):
                          echo '<img ' .$class_output. ' src="'. $picture['url'] . '" '. $alt_img .' '.$img_delay.' >';
                        else:
                           echo '<img '. $class_output .' src="http://placehold.it/400x500" '.$img_delay.'>';
                        endif;
                        ?>
                        
                    </div> <!-- muth-services -->
                </div> <!-- row --> 
            </div> <!-- muth-all-contacts-content -->
        </section> <!-- muth-all-contacts -->

<?php 	
    $dif_counter++;
    endwhile;

else :

    // no rows found

endif;
         ?>

<?php get_footer(); ?>