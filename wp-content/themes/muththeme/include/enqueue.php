<?php
/*
    
@package muththeme
*/
/*
    ======================================
        ENQEUE ADMIN CSS and JS
    ======================================
*/
function muth_admin_script_enqeue($hook){
     
    if( $hook != 'widgets.php' ) 
        return;

    wp_enqueue_media();
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/muth.admin.js');
}
add_action('admin_enqueue_scripts', 'muth_admin_script_enqeue');



/*
    ======================================
        ENQEUE CSS and JS
    ======================================
*/

function muth_script_enqeue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/muth.css', array(), '1.0.0', 'all');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('ease', get_template_directory_uri() . '/js/ease.min.js', array(), '1.0.0', true);
	wp_enqueue_script('segment', get_template_directory_uri() . '/js/segment.min.js', array(), '1.0.0', true);
	wp_enqueue_script('mobilie_animation', get_template_directory_uri() . '/js/mobile-animation.min.js', array(), '1.0.0', true);
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU', array(), '', true);
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

    $defaults = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => 0,
        'height'                 => 0,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
add_theme_support( 'custom-header', $defaults );

    register_nav_menus(array(
    'primary' => __( 'Hlavné menu'),
    'footer' => __( 'Footer Menu'),
    ));

}
add_action('init', 'awesome_theme_setup');
?>