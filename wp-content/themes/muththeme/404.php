<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
    <title><?php bloginfo( 'name' ); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

		<?php wp_head();?>
	
  </head>

<?php 

$current_lang = pll_current_language();

  switch ($current_lang) {
  	case 'cs':
  		$title = 'Neco se pokazilo :(';
  		$description = 'Stránka sa nenašla';
  		$button_title = 'Úvodní stránka';
  		break;
  	case 'de':
  		$title = 'Etwas ist schief gelaufen :(';
  		$description = 'Seite nicht gefunden';
  		$button_title = 'Zuhause';
  		break;
  	case 'en':
  		$title = 'Sorry, something went wrong :(';
  		$description = 'Page not found';
  		$button_title = 'Home Page';
  		break;
  	case 'sk':
  		$title = 'Niečo sa pokazilo :(';
  		$description = 'Stránka sa nenašla';
  		$button_title = 'Úvodná stránka';
  		break;
  	
  	default:
  		$title = 'Niečo sa pokazilo :(';
  		$description = 'Stránka sa nenašla';
  		$button_title = 'Úvodná stránka';
  		break;
  }

 ?>

<body class = "body_404">
<section class="muth-page-full-width">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-title muth-page-title-404"> 
        	
        		<h1><?php _e( $title ); ?></h1>
        		<!-- <img src="http://www.muth.sk/wp-content/uploads/2016/07/404-logo.png"> -->
        	</div> <!-- muth-page-title -->
        	
        	<div class="muth-subheader-line"></div> <!-- muth-subheader-line -->
        	
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->




<section class="muth-page-full-width">
	<div class="muth-page-content">
        <div class="row">
        	<div class = "muth-title-text-404"> 
        		<img src="http://www.muth.sk/wp-content/uploads/2016/07/404-logo.png">
        		<span>
        		  <?php _e( $description ); ?>
        		</span>

        		<a class="btn btn-success" href="<?php echo get_home_url(); ?>" role="button"><?php _e($button_title); ?></a>
        		
        	</div><!--  muth-services -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-all-contacts -->

</body>
</html>

