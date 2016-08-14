<?php
/*
    
@package muththeme
    
    ======================================
        REGISTER WIDGETS
    ======================================
*/

function register_my_widgets() {

    register_widget( 'muth_icon_widget' );
    register_widget( 'muth_contact_widget' );
    register_widget( 'muth_partners_widget' );
    register_widget( 'muth_fast_contact_widget' );
    register_widget( 'muth_simple_text_widget' );
}


add_action( 'widgets_init', 'register_my_widgets' );

require_once ('widgets/muth_contact_info_widget.php');
require_once ('widgets/muth_icon_widget.php');
require_once ('widgets/muth_partners_widget.php');
require_once ('widgets/muth_fast_contact_widget.php');
require_once ('widgets/muth_simple_text_widget.php');


//funkcia pre riadenie pridavabua prefixu http k linku a jeho kontrolu
function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

//footer widget
function muth_widget_setup()
{   
    //icon menu sidebar
    $args = array(
        'name'          => __('Icon Sidebar'),
        'id'            => 'icon-sidebar',
        'class'         => 'custom',
        'description'   => 'Icon Sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    );
    register_sidebar($args);
    
    
    //partners title sidebar
    $args = array(
        'name'          => __('Partners Title Sidebar'),
        'id'            => 'partners-title-sidebar',
        'class'         => 'custom',
        'description'   => 'Partners Title Sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="muth-partners-header wow fadeInUp">',
        'after_title'   => '</div>'
    );
    register_sidebar($args);

    //partners sidebar
    $args = array(
        'name'          => __('Partners Sidebar'),
        'id'            => 'partners-sidebar',
        'class'         => 'custom',
        'description'   => 'Partners Sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    );
    register_sidebar($args);

    //fast contact sidebar
    $args = array(
        'name'          => __('Fast Contact Sidebar'),
        'id'            => 'fast_contact-sidebar',
        'class'         => 'custom',
        'description'   => 'Fast Contact Sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    );
    register_sidebar($args);


    //footer sidebars
     $args = array(
        'name'          => __('Footer Sidebar %d'),
        'id'            => 'footer-sidebar',
        'class'         => 'custom',
        'description'   => 'Appears in the footer area',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    );
    register_sidebars(3,$args);

    //footer copyright sidebar
    $args = array(
        'name'          => __('Footer copyright Sidebar '),
        'id'            => 'footer-sidebar-copyright',
        'class'         => 'custom',
        'description'   => 'Appears in the footer copyright area',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    );
    register_sidebar($args);

   
}
add_action('widgets_init', 'muth_widget_setup' );
?>