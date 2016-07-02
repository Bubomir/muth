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
}


add_action( 'widgets_init', 'register_my_widgets' );


class muth_contact_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'muth_contact_widget',
            'description' => 'Widget For contact info.'
        );

        parent::__construct( 'muth_contact_widget', 'Muth Contact Info Widget', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
       // Add any html to output the image in the $instance array
        $output = '';
        $output .= '<tr>';
        $output .= '<td class="'.(!empty($instance['glyphicon'])? $instance['glyphicon'] : '').'">'.(!empty($instance['text_title'])? $instance['text_title'] : '').':</td>';
        $output .= '<td>'.(!empty($instance['use_link'] && $instance['use_link'] == true)? '<a href="'.(!empty($instance['text_describe'])? $instance['text_describe'] : '').'">' : '<span>').(!empty($instance['text_describe'])? $instance['text_describe'] : '').(!empty($instance['use_link'] && $instance['use_link'] == true)? '</a>' : '</span>').'</td>';
        $output .= '</tr>';

       echo $output;
    }   

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'text_title' ] = strip_tags( $new_instance[ 'text_title' ] );
        $instance[ 'text_describe' ] = strip_tags( $new_instance[ 'text_describe' ] );
        $instance[ 'glyphicon' ] = strip_tags( $new_instance[ 'glyphicon' ] );
        $instance[ 'image' ] = strip_tags( $new_instance[ 'image' ] );
        // The update for the variable of the checkbox
        $instance[ 'use_link' ] = $new_instance[ 'use_link' ];
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {   
       //print_r($instance);
      
        $title = __('Widget Image');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
       
        $text_title = __('Názov textu');
        if(isset($instance['text_title']))
        {
            $text_title = $instance['text_title'];
        }

        $text_describe = __('Popis textu');

        if(isset($instance['text_describe']))
        {
            $text_describe = $instance['text_describe'];
        }
        $use_link = '';
        if(isset($instance['use_link']))
        {
            $use_link = $instance['use_link'];
        }

        $glyphicon = __('Glyphicon Image');
        if(isset($instance['glyphicon']))
        {
            $glyphicon = $instance['glyphicon'];
        }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        ?>

        
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title );?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'text_title' ); ?>"><?php _e( 'Nazov textu:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_title' ); ?>" name="<?php echo $this->get_field_name( 'text_title' ); ?>" type="text" value="<?php echo esc_attr( $text_title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'text_describe' ); ?>"><?php _e( 'Popis textu:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_describe' ); ?>" name="<?php echo $this->get_field_name( 'text_describe' ); ?>" type="text" value="<?php echo esc_attr( $text_describe ); ?>" />
        <p>
            <input class="checkbox" type="checkbox" <?php checked($use_link, 'on' ); ?> id="<?php echo $this->get_field_id( 'use_link' ); ?>" name="<?php echo $this->get_field_name( 'use_link' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'use_link' ); ?>">Použiť ako link ?</label>
        </p>
       
       <p>
       <!-- <div class="dashicons-before dashicons-admin-post"> </div> -->
            <?php if(!empty($glyphicon)): ?>

                <div class="<?php echo $glyphicon ?>"></div>

            <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'glyphicon' ); ?>"><?php _e( 'Glyphicon:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'glyphicon' ); ?>" name="<?php echo $this->get_field_name( 'glyphicon' ); ?>" type="text" value="<?php echo esc_attr( $glyphicon ); ?>" />
        </p>

       <p>
        <?php if(empty($image)):?>
            <div class="preview-picture"></div>
        <?php  else: ?>
            <div class="preview-picture" style="width:50px; height: 50px; background-image:url( <?php echo ($image); ?>); background-repeat:no-repeat; background-size:contain;"></div>
         <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            
       <?php if(!empty($image)):?>
           <input id="upload_image_button_id" class="upload_image_button button button-secondary" type="button" value="Nahradiť Obrázok" />
           <input id="remove_image_button_id" class="remove_image_button button button-secondary" type="button" value="Zmazať Obrázok" />
        <?php else: ?>
           <input id="upload_image_button_id" class="upload_image_button button button-secondary" type="button" value="Nahrať Obrázok" />
         <?php endif; ?>
        </p>

    <?php
    }
}

class muth_icon_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'muth_icon_widget',
            'description' => 'Widget For icon menu.'
        );

        parent::__construct( 'muth_icon_widget', 'Muth Icon Menu Widget', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
        $output = '';
        $output .= '<a href='.(!empty($instance['link'])? $instance['link'] : '#').' class="muth-icon-item">';
        $output .= '<div class="'.(!empty($instance['glyphicon'])? $instance['glyphicon'] : '').'">';
        $output .= '<div class="muth-service-name-in">'.(!empty($instance['text_title'])? $instance['text_title'] : '').'</div></div>';
        $output .= '<div class="muth-service-name-out">'.(!empty($instance['text_title'])? $instance['text_title'] : '').'</div>';
        $output .= '<div class="muth-service-description">'.(!empty($instance['text_describe'])? $instance['text_describe'] : '').'</div>';
        $output .= '</a>';
       
        echo $output;
    }   

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'text_title' ] = strip_tags( $new_instance[ 'text_title' ] );
        $instance[ 'text_describe' ] = strip_tags( $new_instance[ 'text_describe' ] );
        $instance[ 'glyphicon' ] = strip_tags( $new_instance[ 'glyphicon' ] );
        $instance[ 'image' ] = strip_tags( $new_instance[ 'image' ] );
        $instance[ 'link' ] = strip_tags( $new_instance[ 'link' ] );
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {   
       //print_r($instance);
      
        $title = __('');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
       
        $text_title = __('');
        if(isset($instance['text_title']))
        {
            $text_title = $instance['text_title'];
        }

        $text_describe = __('');

        if(isset($instance['text_describe']))
        {
            $text_describe = $instance['text_describe'];
        }
        $link = __('');
        if(isset($instance['link']))
        {
            $link = $instance['link'];
        }

        $glyphicon = __('');
        if(isset($instance['glyphicon']))
        {
            $glyphicon = $instance['glyphicon'];
        }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        ?>

        
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" placeholder="Nadpis" value="<?php echo esc_attr( $title );?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'text_title' ); ?>"><?php _e( 'Nazov textu:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_title' ); ?>" name="<?php echo $this->get_field_name( 'text_title' ); ?>" type="text" placeholder="Názov textu" value="<?php echo esc_attr( $text_title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'text_describe' ); ?>"><?php _e( 'Popis textu:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_describe' ); ?>" name="<?php echo $this->get_field_name( 'text_describe' ); ?>" type="text" placeholder="Popis textu" value="<?php echo esc_attr( $text_describe ); ?>" />
        <p>
            <label for="<?php echo $this->get_field_name( 'link' ); ?>"><?php _e( 'Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" placeholder="Link" value="<?php echo esc_attr( $link );?>" />
        </p>
       
       <p>
       <!-- <div class="dashicons-before dashicons-admin-post"> </div> -->
            <?php if(!empty($glyphicon)): ?>

                <div class="<?php echo $glyphicon ?>"></div>

            <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'glyphicon' ); ?>"><?php _e( 'Glyphicon:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'glyphicon' ); ?>" name="<?php echo $this->get_field_name( 'glyphicon' ); ?>" type="text" placeholder="css glyphicon class " value="<?php echo esc_attr( $glyphicon ); ?>" />
        </p>

       <p>
        <?php if(empty($image)):?>
            <div class="preview-picture"></div>
        <?php  else: ?>
            <div class="preview-picture" style="width:50px; height: 50px; background-image:url( <?php echo ($image); ?>); background-repeat:no-repeat; background-size:contain;"></div>
         <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36" placeholder="URL obrázku" value="<?php echo esc_url( $image ); ?>" />

            

        <?php if(!empty($image)):?>
           <input id="upload_image_button_id" class="upload_image_button button button-secondary" type="button" value="Nahradiť Obrázok" />
           <input id="remove_image_button_id" class="remove_image_button button button-secondary" type="button" value="Zmazať Obrázok" />
        <?php else: ?>
           <input id="upload_image_button_id" class="upload_image_button button button-secondary" type="button" value="Nahrať Obrázok" />
         <?php endif; ?>
        </p>

    <?php
    }
}

class muth_partners_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'muth_partners_widget',
            'description' => 'Widget For partners sidebar.'
        );

        parent::__construct( 'muth_partners_widget', 'Muth Partners Sidebar Widget', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
        $output = '';
        $output .= '<li><a href='.(!empty($instance['link'])? $instance['link'] : '#').'><img src='.(!empty($instance['image'])? $instance['image'] : '').'></a></li>';
      
        echo $output;
    }   

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'image' ] = strip_tags( $new_instance[ 'image' ] );
        $instance[ 'link' ] = strip_tags( $new_instance[ 'link' ] );
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {   
       print_r($instance);
      
        $title = __('');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
               
        $link = __('');
        if(isset($instance['link']))
        {
            $link = $instance['link'];
        }      

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        ?>
        
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" placeholder="Nadpis" value="<?php echo esc_attr( $title );?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link' ); ?>"><?php _e( 'Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" placeholder="http://" value="<?php echo addhttp(esc_attr( $link ));?>" />
        </p>
       

       <p>
        <?php if(empty($image)):?>
            <div class="preview-picture"></div>
        <?php  else: ?>
            <div class="preview-picture" style="width:50px; height: 50px; background-image:url( <?php echo ($image); ?>); background-repeat:no-repeat; background-size:contain;"></div>
         <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36" placeholder="URL obrázku" value="<?php echo esc_url( $image ); ?>" />
            
        <?php if(empty($image)):?>
            <input class="upload_image_button button button-secondary" type="button" value="Nahrať Obrázok" />
        <?php  else: ?>
            <input class="upload_image_button button button-secondary" type="button" value="Nahradiť Obrázok" />
            <input class="remove_image_button button button-secondary" type="button" value="Zmazať Obrázok" />
         <?php endif; ?>
        </p>

    <?php
    }
}

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

    //partners sidebar
    $args = array(
        'name'          => __('Partners Title Sidebar'),
        'id'            => 'partners-title-sidebar',
        'class'         => 'custom',
        'description'   => 'Partners Title Sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<div class="muth-partners-header">',
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