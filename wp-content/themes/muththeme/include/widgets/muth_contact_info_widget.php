<?php
class muth_contact_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname'   => 'muth_contact_widget',
            'description' => 'Widget For contact info.',
        );

        parent::__construct('muth_contact_widget', 'Muth Contact Info Widget', $widget_ops);
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
        // Add any html to output the image in the $instance array
        $glyphicon     = (!empty($instance['glyphicon']) ? $instance['glyphicon'] : __(''));
        $text_title    = (!empty($instance['text_title']) ? $instance['text_title'] : __(''));
        $text_describe = (!empty($instance['text_describe']) ? $instance['text_describe'] : __(''));
        $use_link_begin = (!empty($instance['use_link'] && $instance['use_link'] == true) ? '<td><a href="' . $text_describe . '">' : '<td><span>');
        $use_link_end   = (!empty($instance['use_link'] && $instance['use_link'] == true) ? '</a></td>' : '</span></td>');


        $output = '';
        $output .= '<tr>';
        $output .= '<td style="vertical-align: top;" class="' . $glyphicon . '">'.$text_title . ':</td>';
        $output .= $use_link_begin . $text_describe . $use_link_end;
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
    public function update($new_instance, $old_instance)
    {

        // update logic goes here

        $instance                  = $old_instance;
        $instance['title']         = strip_tags($new_instance['title']);
        $instance['text_title']    = strip_tags($new_instance['text_title']);
        $instance['text_describe'] = strip_tags($new_instance['text_describe']);
        $instance['glyphicon']     = strip_tags($new_instance['glyphicon']);
        // The update for the variable of the checkbox
        $instance['use_link'] = $new_instance['use_link'];
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
        $use_link = '';
        if (isset($instance['use_link'])) {
            $use_link = $instance['use_link'];
        }

        $glyphicon = __('');
        if (isset($instance['glyphicon'])) {
            $glyphicon = $instance['glyphicon'];
        }

        ?>


        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" placeholder="<?php echo __('Nadpis'); ?>" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_title'); ?>"><?php _e('Nazov textu:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_title'); ?>" name="<?php echo $this->get_field_name('text_title'); ?>" type="text" placeholder="<?php echo __('Názov textu'); ?>" value="<?php echo esc_attr($text_title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_describe'); ?>"><?php _e('Popis textu:');?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('text_describe'); ?>" name="<?php echo $this->get_field_name('text_describe'); ?>" type="text" placeholder="<?php echo __('Popis textu'); ?>" value="<?php echo esc_attr($text_describe); ?>" ></textarea>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($use_link, 'on');?> id="<?php echo $this->get_field_id('use_link'); ?>" name="<?php echo $this->get_field_name('use_link'); ?>" />
            <label for="<?php echo $this->get_field_id('use_link'); ?>">Použiť ako link ?</label>
        </p>

       <p>
       <!-- <div class="dashicons-before dashicons-admin-post"> </div> -->
            <?php if (!empty($glyphicon)): ?>

                <div class="<?php echo $glyphicon ?>"></div>

            <?php endif;?>

            <label for="<?php echo $this->get_field_name('glyphicon'); ?>"><?php _e('Glyphicon:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('glyphicon'); ?>" name="<?php echo $this->get_field_name('glyphicon'); ?>" type="text" placeholder="<?php echo __('napíš CSS glyphicon triedu'); ?>" value="<?php echo esc_attr($glyphicon); ?>" />
        </p>

       
    <?php
}
}