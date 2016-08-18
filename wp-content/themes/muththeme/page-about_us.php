<?php
/*
Template Name: About us Page
*/
?>
<?php get_header(); ?>

<section class="muht-page-full-width">
    <div class="muth-page-content">
        <div class="row">
            <div class="muth-page-title wow fadeInUp"> 
            
            <h1><?php if(get_field('page_title')): the_field('page_title'); endif; ?></h1>

            </div> <!-- muth-page-title -->
        </div> <!-- row --> 
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->



<section class="muth-page-full-width muth-page-background-white">
	<div class="muth-page-content">
        <div class="row">
        	<div data-wow-delay=".1s" class = "muth-title-text wow fadeInUp"> 
        		        		
        		<span>
        		  <?php if(get_field('about_us_description')): the_field('about_us_description'); endif; ?>
        		</span>
        		
        	</div><!--  muth-services -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-all-contacts -->

<section class="muth-page-full-width muth-page-background-gray">
    <div class="muth-page-content">
        <div class="row">

<?php 
if( have_rows('profiles') ):
   $counter = 3;
    // loop through the rows of data
    while ( have_rows('profiles') ) : the_row();
       

        // display a sub field value
        $picture = get_sub_field('picture');
        $name = get_sub_field('name');
        $position = get_sub_field('position');
        $description = get_sub_field('description');

        $alt_img = (isset($picture['alt']) && !empty($picture['alt']))?  'alt="'.$picture['alt'].'"' : __('');

        if(isset($picture['url']) && !empty($picture['url'])):
          $img = '<img class="img-circle" src="'. $picture['url'] . '" '. $alt_img .'>';
        else:
           $img = '<img class="img-circle" src="http://placehold.it/128x128">';
        endif;
              
       ?>

       <div data-wow-delay="<?php echo '.'.$counter.'s'; ?>" class = "muth-profiles wow fadeInUp"> 
                <?php echo $img; ?>
                <h3><?php echo $name;?></h3>
                <h4><?php echo $position; ?></h4>                 
                <span><?php echo $description; ?></span>

            </div><!--  muth-services -->

<?php   
    $counter++;
    endwhile;

else :

    // no rows found

endif;
         ?>
</div> <!-- row --> 
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->


<?php get_footer(); ?>