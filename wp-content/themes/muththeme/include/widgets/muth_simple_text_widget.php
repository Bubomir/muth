<?php
class muth_simple_text_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname'   => 'muth_simple_text_widget',
            'description' => 'Widget For simple text with image.',
        );

        parent::__construct('muth_simple_text_widget', 'Muth Simple Text Widget', $widget_ops);
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget($args, $instance)
    {

        $text_describe = (!empty($instance['text_describe']) ? $instance['text_describe'] : __(''));
        $image         = (!empty($instance['image']) ? $instance['image'] : __(''));
        $home_link     =  get_home_url();
        // Add any html to output the image in the $instance array
        $output = '';

        $output .= '<div class="muth-footer-text-moto">';
        $output .= '<a href="'. $home_link .'"><img src="'.$image.'"></a>';
        //$output .= '<h3> TEST </h3>';
        $output .= '<hr>';
        $output .= '<p>'.$text_describe.'</p>';
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
    public function update($new_instance, $old_instance)
    {

        // update logic goes here

        $instance                  = $old_instance;
        $instance['title']         = strip_tags($new_instance['title']);
        $instance['text_describe'] = strip_tags($new_instance['text_describe']);
        $instance['image']         = strip_tags($new_instance['image']);
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form($instance)
    {
        //print_r($instance);

        $title = __('');
        if (isset($instance['title'])) {
            $title = $instance['title'];
        }

        $text_describe = __('');

        if (isset($instance['text_describe'])) {
            $text_describe = $instance['text_describe'];
        }

        $image = '';
        if (isset($instance['image'])) {
            $image = $instance['image'];
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" placeholder="<?php _e('Nadpis');?>" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_describe'); ?>"><?php _e('Popis textu:');?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('text_describe'); ?>" name="<?php echo $this->get_field_name('text_describe'); ?>" type="text" placeholder="<?php _e('Popis textu');?>"><?php echo esc_attr($text_describe); ?></textarea>
        </p>

        <p>
       <?php $widget_counter = $this->number ; ?>

        <?php if(empty($image)):?>
            <div id="preview-picture-id-<?php echo $widget_counter; ?>" class="preview-picture"></div>
        <?php  else: ?>
            <div id="preview-picture-id-<?php echo $widget_counter; ?>" class="preview-picture" style="width:50px; height: 50px; background-image:url( <?php echo ($image); ?>); background-repeat:no-repeat; background-size:contain;"></div>
         <?php endif; ?>

            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36" placeholder="<?php _e('URL obrázku');?>" value="<?php echo esc_url( $image ); ?>" />

            
            

        <?php if(!empty($image)):?>

           <input id="upload_image_button_id-<?php echo $widget_counter; ?>" class="upload_image_button button button-secondary" data-counter="<?php echo $widget_counter; ?>" type="button" value="Nahradiť Obrázok" />
           <input id="remove_image_button_id-<?php echo $widget_counter; ?>" class="remove_image_button button button-secondary" data-counter="<?php echo $widget_counter; ?>" type="button" value="Zmazať Obrázok" />
        <?php else: ?>
           <input id="upload_image_button_id-<?php echo $widget_counter; ?>" class="upload_image_button button button-secondary" data-counter="<?php echo $widget_counter; ?>" type="button" value="Nahrať Obrázok" />
         <?php endif; ?>
        </p>

    <?php
}
}