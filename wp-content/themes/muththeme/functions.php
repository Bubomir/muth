<?php
/*
	================================
	registracia CSS aJS
	================================
*/
function muth_script_enqeue(){
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/muth.css', array(), '1.0.0', 'all');
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/muth.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'muth_script_enqeue');

/*
	================================
	zapnutie menu pre WP
	================================
*/

function awesome_theme_setup() {
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Hlavné menu');
	//register_nav_menu('secondary', 'Footer Navigation');
	
}
add_action('init', 'awesome_theme_setup');
?>