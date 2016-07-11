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
            <div class = "muth-references-webs"> 

<?php 
if( have_rows('web_references') ):
   
    // loop through the rows of data
    while ( have_rows('web_references') ) : the_row();

        // display a sub field value
        $picture = get_sub_field('thumbnail_web');
        $project_name = get_sub_field('project_name');
        $project_description = get_sub_field('project_description');

        $alt_img = (isset($picture['alt']) && !empty($picture['alt']))?  'alt="'.$picture['alt'].'"' : __('');

        if(isset($picture['url']) && !empty($picture['url'])):
          $img = '<img src="'. $picture['url'] . '" '. $alt_img .'>';
        else:
           $img = '<img src="http://placehold.it/300x300">';
        endif;
              
       ?>

       <div class = "muth-references-webs"> 
            <a href="" class = "muth-references-web-fix-size">
                <?php echo $img; ?>
                <div class="muth-references-web-description">
                    <div class="muth-reference-name">
                        <h3 class="muth-reference-name-h3"><?php echo $project_name; ?></h3>
                    </div>
                    <span><?php echo $project_description; ?></span>
                </div> <!-- muth-references-web-description -->
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
        		 	<li>Centrum environmentálnych služieb, s.r.o., Bratislava</li>
        		 	<li>MADE BY VACULIK, s. r. o., Bratislava</li>
        		 </ul>
        		
        	</div><!--  muth-references-outsourcing -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

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
        		 	<li>Základná škola Turzovka – Bukovina</li>
        		 	<li>DAVID TRANS, s.r.o., Kysucké Nové Mesto</li>
        		 </ul>
        		
        	</div><!--  muth-references-shop -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->





<?php get_footer(); ?>