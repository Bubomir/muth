<?php
class muth_contact_map_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname'   => 'muth_contact_map_widget',
            'description' => 'Widget For contact map.',
        );

        parent::__construct('muth_contact_map_widget', 'Muth Contact Map Widget', $widget_ops);
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

        $text_address_typ = (!empty($instance['text_address_typ']) ? $instance['text_address_typ'] : __(''));
        $text_street      = (!empty($instance['text_street']) ? $instance['text_street'] : __(''));
        $text_city        = (!empty($instance['text_city']) ? $instance['text_city'] : __(''));
        $text_zip         = (!empty($instance['text_zip']) ? $instance['text_zip'] : __(''));
        $text_country     = (!empty($instance['text_country']) ? $instance['text_country'] : __(''));
        $glyphicon        = (!empty($instance['glyphicon']) ? $instance['glyphicon'] : __(''));

        $output = 'fds';
        $output .= '';
        $output .= '';
        $output .= '';
        $output .= '';
        $output .= '';
        $output .= '';

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

        $instance                     = $old_instance;
        $instance['title']            = strip_tags($new_instance['title']);
        $instance['text_address_typ'] = strip_tags($new_instance['text_address_typ']);
        $instance['text_street']      = strip_tags($new_instance['text_street']);
        $instance['text_city']        = strip_tags($new_instance['text_city']);
        $instance['text_zip']         = strip_tags($new_instance['text_zip']);
        $instance['text_country']     = strip_tags($new_instance['text_country']);
        $instance['glyphicon']        = strip_tags($new_instance['glyphicon']);

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

        $text_address_typ = __('');
        if (isset($instance['text_address_typ'])) {
            $text_address_typ = $instance['text_address_typ'];
        }

        $text_street = __('');
        if (isset($instance['text_street'])) {
            $text_street = $instance['text_street'];
        }

        $text_city = __('');
        if (isset($instance['text_city'])) {
            $text_city = $instance['text_city'];
        }

        $text_zip = __('');
        if (isset($instance['text_zip'])) {
            $text_zip = $instance['text_zip'];
        }

        $text_country = __('');
        if (isset($instance['text_country'])) {
            $text_country = $instance['text_country'];
        }

        $glyphicon = __('');
        if (isset($instance['glyphicon'])) {
            $glyphicon = $instance['glyphicon'];
        }

        ?>


        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Názov:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" placeholder="<?php _e('Názov:');?>" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_address_typ'); ?>"><?php _e('Typ adresy:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_address_typ'); ?>" name="<?php echo $this->get_field_name('text_address_typ'); ?>" type="text" placeholder="<?php _e('Typ adresy: korešpondenčna atď');?>" value="<?php echo esc_attr($text_address_typ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_street'); ?>"><?php _e('Ulica:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_street'); ?>" name="<?php echo $this->get_field_name('text_street'); ?>" type="text" placeholder="<?php _e('Ulica');?>" value="<?php echo esc_attr($text_street); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_city'); ?>"><?php _e('Mesto:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_city'); ?>" name="<?php echo $this->get_field_name('text_city'); ?>" type="text" placeholder="<?php _e('Mesto');?>" value="<?php echo esc_attr($text_city); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_zip'); ?>"><?php _e('PSČ:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_zip'); ?>" name="<?php echo $this->get_field_name('text_zip'); ?>" type="text" placeholder="<?php _e('PSČ');?>" value="<?php echo esc_attr($text_zip); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('text_country'); ?>"><?php _e('Štát:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text_country'); ?>" name="<?php echo $this->get_field_name('text_country'); ?>" type="text" placeholder="<?php _e('Štát');?>" value="<?php echo esc_attr($text_country); ?>" />
        </p>

        <p>

            <?php if (!empty($glyphicon)): ?>

                <div class="<?php echo $glyphicon ?>"></div>

            <?php endif;?>

            <label for="<?php echo $this->get_field_name('glyphicon'); ?>"><?php _e('Glyphicon:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('glyphicon'); ?>" name="<?php echo $this->get_field_name('glyphicon'); ?>" type="text" placeholder="<?php _e('napíš CSS glyphicon triedu');?>" value="<?php echo esc_attr($glyphicon); ?>" />
        </p>



    <?php
}
}