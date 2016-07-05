<?php
class muth_fast_contact_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname'   => 'muth_fast_contact_widget',
            'description' => 'Widget For fast contact row.',
        );

        parent::__construct('muth_fast_contact_widget', 'Muth Fast Contact Widget', $widget_ops);
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

        $link          = (!empty($instance['link']) ? $instance['link'] : __('#'));
        $text_title    = (!empty($instance['text_title']) ? $instance['text_title'] : __(''));
        $text_describe = (!empty($instance['text_describe']) ? $instance['text_describe'] : __(''));

        // Add any html to output the image in the $instance array
        $output = '';

        $output .= '<a href="' . $link . ' ">';
        $output .= $text_title;
        $output .= '<span style="color: green;">'.__(' '). $text_describe . '</span>';
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
    public function update($new_instance, $old_instance)
    {

        // update logic goes here

        $instance                  = $old_instance;
        $instance['title']         = strip_tags($new_instance['title']);
        $instance['text_title']    = strip_tags($new_instance['text_title']);
        $instance['text_describe'] = strip_tags($new_instance['text_describe']);
        $instance['link']          = strip_tags($new_instance['link']);
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

        $text_title = __('');
        if (isset($instance['text_title'])) {
            $text_title = $instance['text_title'];
        }

        $text_describe = __('');

        if (isset($instance['text_describe'])) {
            $text_describe = $instance['text_describe'];
        }
        $link = __('');
        if (isset($instance['link'])) {
            $link = $instance['link'];
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" placeholder="<?php _e('Nadpis');?>" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_title'); ?>"><?php _e('Nazov textu:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_title'); ?>" name="<?php echo $this->get_field_name('text_title'); ?>" type="text" placeholder="<?php _e('Názov textu');?>" value="<?php echo esc_attr($text_title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_describe'); ?>"><?php _e('Popis textu:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_describe'); ?>" name="<?php echo $this->get_field_name('text_describe'); ?>" type="text" placeholder="<?php _e('Popis textu');?>" value="<?php echo esc_attr($text_describe); ?>" />
        <p>
            <label for="<?php echo $this->get_field_name('link'); ?>"><?php _e('Link:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" placeholder="<?php _e('http://');?>" value="<?php echo esc_attr($link); ?>" />
        </p>

    <?php
}
}