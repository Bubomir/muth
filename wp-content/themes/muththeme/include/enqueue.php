<?php
/*
    
@package muththeme
*/
/*
    ======================================
        ENQEUE ADMIN CSS and JS
    ======================================
*/
function muth_admin_script_enqeue(){
    wp_enqueue_script( 'jquery' );
    wp_enqueue_media();
    wp_register_script('muth-admin-script', get_template_directory_uri() . '/js/muth.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('muth-admin-script');
}
add_action('admin_enqueue_scripts', 'muth_admin_script_enqeue');



/*
    ======================================
        ENQEUE CSS and JS
    ======================================
*/

function muth_script_enqeue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/global.css', array(), '1.0.0', 'all');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('ease', get_template_directory_uri() . '/js/ease.min.js', array(), '1.0.0', true);
	wp_enqueue_script('segment', get_template_directory_uri() . '/js/segment.min.js', array(), '1.0.0', true);
	wp_enqueue_script('mobilie_animation', get_template_directory_uri() . '/js/mobile-animation.min.js', array(), '1.0.0', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/muth.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'muth_script_enqeue');

/*
================================
	zapnutie menu pre WP
================================
 */

function awesome_theme_setup()
{

    add_theme_support('menus');
    
    register_nav_menus(array(
    'primary' => __( 'Hlavné menu'),
    'footer' => __( 'Footer Menu'),
    ));

}
add_action('init', 'awesome_theme_setup');