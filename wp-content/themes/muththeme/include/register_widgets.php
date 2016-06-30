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
            
        <?php if(empty($image)):?>
            <input class="upload_image_button button button-secondary" type="button" value="Upload Image" />
        <?php  else: ?>
            <input class="upload_image_button button button-secondary" type="button" value="Replace Image" />
            <input class="remove_image_button button button-secondary" type="button" value="Remove Image" />
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
        $output .= '<div class="muth-icon-item">';
        $output .= '<div class="'.(!empty($instance['glyphicon'])? $instance['glyphicon'] : '').'">';
        $output .= '<div class="muth-service-name-in">'.(!empty($instance['text_title'])? $instance['text_title'] : '').'</div></div>';
        $output .= '<div class="muth-service-name-out">'.(!empty($instance['text_title'])? $instance['text_title'] : '').'</div>';
        $output .= '<div class="muth-service-description">'.(!empty($instance['text_describe'])? $instance['text_describe'] : '').'</div>';
        $output .= '</div>';
       
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
            
        <?php if(empty($image)):?>
            <input class="upload_image_button button button-secondary" type="button" value="Upload Image" />
        <?php  else: ?>
            <input class="upload_image_button button button-secondary" type="button" value="Replace Image" />
            <input class="remove_image_button button button-secondary" type="button" value="Remove Image" />
         <?php endif; ?>
        </p>

    <?php
    }
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