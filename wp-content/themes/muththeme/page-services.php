<?php
/*
Template Name: Services Page
*/
?>
<?php get_header(); ?>

<section class="muht-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-title"> 
        	
        	<?php if(get_field('title')): the_field('title'); endif; ?>

        	</div> <!-- muth-page-title -->
        	
        	<div class="muth-subheader-line"></div> <!-- muth-subheader -->
        </div> <!-- row --> 
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->


<section class="muht-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class = "muth-services"> 
        		<img src="http://lorempixel.com/400/500" />
        		
        		<span>
        			<h2 class="muth-text-right">Nadpis</h2>
        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        		</span>
        	</div><!--  muth-services -->
		</div> <!-- row --> 
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->


<section class="muht-page-full-width muth-page-background-white">
	<div class="muth-page-content">
        <div class="row">
			<div class = 'muth-services'>

        		<span>
        		<h2 >Nadpis</h2>
        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        		</span>
        		<img src="http://lorempixel.com/400/500" />
        	</div> <!-- muth-services -->
		</div> <!-- row --> 
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->

<section class="muht-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class = "muth-services"> 
        		<img src="http://lorempixel.com/400/500" />
        		
        		<span>
        			<h2 class="muth-text-right">Nadpis</h2>
        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        		</span>
        	</div><!--  muth-services -->
		</div> <!-- row --> 
    </div> <!-- muth-all-contacts-content -->
</section> <!-- muth-all-contacts -->

        <?php 



// check if the repeater field has rows of data
// if( have_rows('profil') ):

//  	// loop through the rows of data
//     while ( have_rows('profil') ) : the_row();

//         // display a sub field value
//        the_sub_field('name');
//        $img =get_sub_field('picture');
//       //var_dump($img);
//   	if(isset($img['url'])){
//   		echo $img['url'];
//   	}
//     endwhile;

// else :

//     // no rows found

// endif;


         ?>
         
        

<?php get_footer(); ?>