<?php
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

        $link = (!empty($instance['link'])? $instance['link'] : __('#'));
        $glyphicon = (!empty($instance['glyphicon'])? $instance['glyphicon'] : __(''));
        $text_title = (!empty($instance['text_title'])? $instance['text_title'] : __(''));
        $text_describe = (!empty($instance['text_describe'])? $instance['text_describe'] : __(''));
        $image = (!empty($instance['image'])? $instance['image'] : __(''));


        // Add any html to output the image in the $instance array
        $output = '';
        $output .= '<a href='.$link.' class="muth-icon-item">';
        $output .= '<div class="'.$glyphicon.'">';
        $output .= '<div class="muth-service-name-in"><h4 class="muth-service-name-h4">'.$text_title.'</h4><img src='.$image.'></div></div>';
        $output .= '<div class="muth-service-name-out">'.$text_title.'</div>';
        $output .= '<div class="muth-service-description">'.$text_describe.'</div>';
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
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" placeholder="<?php _e('Nadpis');?>" value="<?php echo esc_attr( $title );?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'text_title' ); ?>"><?php _e( 'Nazov textu:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_title' ); ?>" name="<?php echo $this->get_field_name( 'text_title' ); ?>" type="text" placeholder="<?php _e('Názov textu');?>" value="<?php echo esc_attr( $text_title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'text_describe' ); ?>"><?php _e( 'Popis textu:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'text_describe' ); ?>" name="<?php echo $this->get_field_name( 'text_describe' ); ?>" type="text" placeholder="<?php _e('Popis textu');?>" value="<?php echo esc_attr( $text_describe ); ?>" ></textarea>
        <p>
            <label for="<?php echo $this->get_field_name( 'link' ); ?>"><?php _e( 'Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" placeholder="<?php _e('Link');?>" value="<?php echo esc_attr( $link );?>" />
        </p>
       
       <p>
       
            <?php if(!empty($glyphicon)): ?>

                <div class="<?php echo $glyphicon ?>"></div>

            <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'glyphicon' ); ?>"><?php _e( 'Glyphicon:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'glyphicon' ); ?>" name="<?php echo $this->get_field_name( 'glyphicon' ); ?>" type="text" placeholder="<?php _e('napíš CSS glyphicon triedu');?>" value="<?php echo esc_attr( $glyphicon ); ?>" />
        </p>

       <p>
        <?php if(empty($image)):?>
            <div class="preview-picture"></div>
        <?php  else: ?>
            <div class="preview-picture" style="width:50px; height: 50px; background-image:url( <?php echo ($image); ?>); background-repeat:no-repeat; background-size:contain;"></div>
         <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36" placeholder="<?php _e('URL obrázku');?>" value="<?php echo esc_url( $image ); ?>" />

            

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