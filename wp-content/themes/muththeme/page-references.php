<?php
/*
Template Name: References Page
*/
?>
<?php get_header(); ?>

<section class="muth-page-full-width muth-page-background-white">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-title"> 
        	
        		<h1><?php if(get_field('page_title')): the_field('page_title'); endif; ?></h1>

        	</div> <!-- muth-page-title -->
        	
        	<div class="muth-subheader-line"></div> <!-- muth-subheader-line -->
        	
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="muth-page-full-width muth-page-background-white">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-sub-title"> 
        		<h2><?php if(get_field('title_web_references')): the_field('title_web_references'); endif; ?></h2>
        	</div> <!-- muth-page-title -->
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<section class="muth-page-full-width muth-page-background-white">
    <div class="muth-page-content">
        <div class="row">
            

<?php 
if( have_rows('web_references') ):
   
    // loop through the rows of data
    while ( have_rows('web_references') ) : the_row();

        // display a sub field value
        
        
        $switcher = get_sub_field('image_gallery_switcher');
      
      	//var_dump($pictures);
      	
      	switch ($switcher) {
      		//image
      		case false:
      			$picture = get_sub_field('thumbnail_web');
      			break;

      		//gallery
      		case true:
      			$pictures = get_sub_field('thumbnail_web_gallery');
      			//var_dump($pictures[0]);
      			$picture = $pictures[0];
      			break;

      		default:
      			# code...
      			break;
      	}


        $project_name = get_sub_field('project_name');
        $project_description = get_sub_field('project_description');

        $alt_img = (isset($picture['alt']) && !empty($picture['alt']))?  'alt="'.$picture['alt'].'"' : __('');

        if(isset($picture['url']) && !empty($picture['url'])):
          $img = '<img src="'. $picture['url'] . '" '. $alt_img .'>';
        else:
          $img = '<img src="http://placehold.it/300x300">';
        endif;
              
       ?>

       <div id="links" class="muth-references-webs"> 
            <a href="http://www.muth.dev/wp-content/uploads/2016/07/cart.png" title="cart" class = "muth-references-web-fix-size" data-gallery="#blueimp-gallery-links">
            <img src="http://www.muth.dev/wp-content/uploads/2016/07/cart.png" alt="cart">
                <div class="muth-references-web-description">
                    <div class="muth-reference-name">
                        <h3 class="muth-reference-name-h3"><?php echo $project_name; ?></h3>
                    </div>
                    <span><?php echo $project_description; ?></span>
                </div> <!-- muth-references-web-description -->
            </a> <!-- muth-references-web-fix-size -->

            <a href="http://www.muth.dev/wp-content/uploads/2016/06/outsourcing.png" title="outsourcing" class = "muth-invisible-image-gallery" data-gallery="#blueimp-gallery-links">
            </a> <!-- muth-references-web-fix-size -->
                
        </div><!--  muth-references-webs -->
<?php   
    endwhile;
else :
    // no rows found
endif;?>


    	</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->



<?php if( have_rows('outsoarsing_references') ): ?>

<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-sub-title"> 
        	
        		<h2><?php if(get_field('title_outsoarsing_references')): the_field('title_outsoarsing_references'); endif; ?></h2>

        	</div> <!-- muth-page-title -->
        	
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->


<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class = "muth-references-outsourcing"> 
        		 <ul>
                    
                    <?php  while ( have_rows('outsoarsing_references') ) : the_row(); ?>
                            <li> <?php the_sub_field('outsoarsing_company_name'); ?> </li>
                    <?php endwhile; ?>
        		 	
        		 </ul>
        		
        	</div><!--  muth-references-outsourcing -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<?php endif; ?>

<?php if( have_rows('shop_references') ): ?>

<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-sub-title"> 
        	
        		<h2><?php if(get_field('title_shop_references')): the_field('title_shop_references'); endif; ?></h2>

        	</div> <!-- muth-page-title -->
        	
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class = "muth-references-shop"> 
        		 <ul>

                    <?php  while ( have_rows('shop_references') ) : the_row(); ?>
                            <li> <?php the_sub_field('shop_company_name'); ?> </li>
                    <?php endwhile; ?>
        		 	
        		 </ul>
        		
        	</div><!--  muth-references-shop -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<?php endif; ?>




<?php get_footer(); ?>