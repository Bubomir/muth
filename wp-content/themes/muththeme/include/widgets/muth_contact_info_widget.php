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
        $phone_title     = (!empty($instance['phone_title']) ? $instance['phone_title'] : __(''));
        $phone_describe    = (!empty($instance['phone_describe']) ? $instance['phone_describe'] : __(''));
        $phone_glyphicon = (!empty($instance['phone_glyphicon']) ? $instance['phone_glyphicon'] : __(''));
        
        $email_title     = (!empty($instance['email_title']) ? $instance['email_title'] : __(''));
        $email_describe    = (!empty($instance['email_describe']) ? $instance['email_describe'] : __(''));
        $email_glyphicon = (!empty($instance['email_glyphicon']) ? $instance['email_glyphicon'] : __(''));
        
        $address_title     = (!empty($instance['address_title']) ? $instance['address_title'] : __(''));
        $address_street    = (!empty($instance['address_street']) ? $instance['address_street'] : __(''));
        $address_city = (!empty($instance['address_city']) ? $instance['address_city'] : __(''));
        $address_country     = (!empty($instance['address_country']) ? $instance['address_country'] : __(''));
        $address_zip    = (!empty($instance['address_zip']) ? $instance['address_zip'] : __(''));
        $address_glyphicon = (!empty($instance['address_glyphicon']) ? $instance['address_glyphicon'] : __(''));
            

        $output = '';

        //phone
        $output .= '<tr>';
        $output .= '<td class="muth-icon">';
       
        $output .= '<div class="' . $phone_glyphicon . '"></div>';
      
        $output .= '</td>';
        $output .= '<td>';
        $output .= '<span>' . $phone_title . '</span>';
        $output .= '</td>';
        $output .= '<td>';
        $output .= '<span>' . $phone_describe . '</span>';
        $output .= '</td>';
        $output .= '</tr>';

        //email
        $output .= '<tr>';
        $output .= '<td class="muth-icon">';
        $output .= '<div class="' . $email_glyphicon . '"></div>';
        $output .= '</td>';
        $output .= '<td>';
        $output .= '<span>' . $email_title . '</span>';
        $output .= '</td>';
        $output .= '<td>';
        $output .= '<span>' . $email_describe . '</span>';
        $output .= '</td>';
        $output .= '</tr>';


        //address
        $output .= '<tr>';
        $output .= '<td class="muth-icon">';
        $output .= '<div class="' . $address_glyphicon . '"></div>';
        $output .= '</div>';
        $output .= '</td>';
        $output .= '<td>';
        $output .= '<span>' . $address_title . '</span>';
        $output .= '</td>';
        $output .= '<td>';
        $output .= '<span>' . $address_street . '</span>';
        $output .= '<br>';
        $output .= '<span>' . $address_city . ' '. $address_zip .'</span>';
        $output .= '<br>';
        $output .= '<span>' . $address_country .'</span>';
        $output .= '</td>';
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

        $instance                       = $old_instance;

        $instance['title']              = strip_tags($new_instance['title']);
        $instance['phone_title']        = strip_tags($new_instance['phone_title']);
        $instance['phone_describe']     = strip_tags($new_instance['phone_describe']);
        $instance['phone_glyphicon']    = strip_tags($new_instance['phone_glyphicon']);
        
        $instance['email_title']        = strip_tags($new_instance['email_title']);
        $instance['email_describe']     = strip_tags($new_instance['email_describe']);
        $instance['email_glyphicon']    = strip_tags($new_instance['email_glyphicon']);
        
        $instance['address_title']      = strip_tags($new_instance['address_title']);
        $instance['address_street']     = strip_tags($new_instance['address_street']);
        $instance['address_city']       = strip_tags($new_instance['address_city']);
        $instance['address_country']    = strip_tags($new_instance['address_country']);
        $instance['address_zip']        = strip_tags($new_instance['address_zip']);
        $instance['address_glyphicon']  = strip_tags($new_instance['address_glyphicon']);

        // The update for the variable of the checkbox
        //$instance['use_link'] = $new_instance['use_link'];
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

        //phone variables
        $phone_title = __('');
        if (isset($instance['phone_title'])) {
            $phone_title = $instance['phone_title'];
        }

        $phone_describe = __('');

        if (isset($instance['phone_describe'])) {
            $phone_describe = $instance['phone_describe'];
        }

      
        $phone_glyphicon = __('');
        if (isset($instance['phone_glyphicon'])) {
            $phone_glyphicon = $instance['phone_glyphicon'];
        }

        //email variables
        $email_title = __('');
        if (isset($instance['email_title'])) {
            $email_title = $instance['email_title'];
        }

        $email_describe = __('');

        if (isset($instance['email_describe'])) {
            $email_describe = $instance['email_describe'];
        }

       
        $email_glyphicon = __('');
        if (isset($instance['email_glyphicon'])) {
            $email_glyphicon = $instance['email_glyphicon'];
        }

        //address variables
        $address_title = __('');
        if (isset($instance['address_title'])) {
            $address_title = $instance['address_title'];
        }

        $address_street = __('');

        if (isset($instance['address_street'])) {
            $address_street = $instance['address_street'];
        }

        $address_city = __('');

        if (isset($instance['address_city'])) {
            $address_city = $instance['address_city'];
        }

        $address_country = __('');

        if (isset($instance['address_country'])) {
            $address_country = $instance['address_country'];
        }

        $address_zip = __('');

        if (isset($instance['address_zip'])) {
            $address_zip = $instance['address_zip'];
        }
        
        $address_glyphicon = __('');
        if (isset($instance['address_glyphicon'])) {
            $address_glyphicon = $instance['address_glyphicon'];
        }




        ?>


        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" placeholder="<?php echo __('Nadpis'); ?>" value="<?php echo esc_attr($title); ?>" />
        </p>

        <!-- phone fields -->

        <p>
            <label for="<?php echo $this->get_field_name('phone_title'); ?>"><?php _e('Telefón nadpis');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone_title'); ?>" name="<?php echo $this->get_field_name('phone_title'); ?>" type="text" placeholder="<?php echo __('Telefón'); ?>" value="<?php echo esc_attr($phone_title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('phone_describe'); ?>"><?php _e('tel. č.');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone_describe'); ?>" name="<?php echo $this->get_field_name('phone_describe'); ?>" type="text" placeholder="<?php echo __('+421 XXX XXX XXX'); ?>" value="<?php echo esc_attr($phone_describe); ?>" />
        </p>
            

       <!-- <div class="dashicons-before dashicons-admin-post"> </div> -->
            <?php if (!empty($phone_glyphicon)): ?>

                <div class="<?php echo $phone_glyphicon ?>"></div>

            <?php endif;?>

            <label for="<?php echo $this->get_field_name('phone_glyphicon'); ?>"><?php _e('Glyphicon telefon:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone_glyphicon'); ?>" name="<?php echo $this->get_field_name('phone_glyphicon'); ?>" type="text" placeholder="<?php echo __('napíš CSS glyphicon triedu'); ?>" value="<?php echo esc_attr($phone_glyphicon); ?>" />
        </p>

        <!-- email fields -->

        <p>
            <label for="<?php echo $this->get_field_name('email_title'); ?>"><?php _e('Email nadpis');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email_title'); ?>" name="<?php echo $this->get_field_name('email_title'); ?>" type="text" placeholder="<?php echo __('Email'); ?>" value="<?php echo esc_attr($email_title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('email_describe'); ?>"><?php _e('email');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email_describe'); ?>" name="<?php echo $this->get_field_name('email_describe'); ?>" type="text" placeholder="<?php echo __('zadaj emailovu adresu'); ?>" value="<?php echo esc_attr($email_describe); ?>" />
        </p>
            

       <!-- <div class="dashicons-before dashicons-admin-post"> </div> -->
            <?php if (!empty($email_glyphicon)): ?>

                <div class="<?php echo $email_glyphicon ?>"></div>

            <?php endif;?>

            <label for="<?php echo $this->get_field_name('email_glyphicon'); ?>"><?php _e('Glyphicon email:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email_glyphicon'); ?>" name="<?php echo $this->get_field_name('email_glyphicon'); ?>" type="text" placeholder="<?php echo __('napíš CSS glyphicon triedu'); ?>" value="<?php echo esc_attr($email_glyphicon); ?>" />
        </p>

        <!-- address fields -->

        <p>
            <label for="<?php echo $this->get_field_name('address_title'); ?>"><?php _e('Adresa nadpis');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_title'); ?>" name="<?php echo $this->get_field_name('address_title'); ?>" type="text" placeholder="<?php echo __('Adresa'); ?>" value="<?php echo esc_attr($address_title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('address_street'); ?>"><?php _e('Ulica');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_street'); ?>" name="<?php echo $this->get_field_name('address_street'); ?>" type="text" placeholder="<?php echo __('zadaj ulicu'); ?>" value="<?php echo esc_attr($address_street); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_name('address_city'); ?>"><?php _e('Mesto');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_city'); ?>" name="<?php echo $this->get_field_name('address_city'); ?>" type="text" placeholder="<?php echo __('zadaj mesto'); ?>" value="<?php echo esc_attr($address_city); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('address_country'); ?>"><?php _e('Štát');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_country'); ?>" name="<?php echo $this->get_field_name('address_country'); ?>" type="text" placeholder="<?php echo __('zadaj štát'); ?>" value="<?php echo esc_attr($address_country); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('address_zip'); ?>"><?php _e('PSČ');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_zip'); ?>" name="<?php echo $this->get_field_name('address_zip'); ?>" type="text" placeholder="<?php echo __('zadaj psč'); ?>" value="<?php echo esc_attr($address_zip); ?>" />
        </p>
            

       <!-- <div class="dashicons-before dashicons-admin-post"> </div> -->
            <?php if (!empty($address_glyphicon)): ?>

                <div class="<?php echo $address_glyphicon ?>"></div>

            <?php endif;?>

            <label for="<?php echo $this->get_field_name('address_glyphicon'); ?>"><?php _e('Glyphicon adresa:');?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_glyphicon'); ?>" name="<?php echo $this->get_field_name('address_glyphicon'); ?>" type="text" placeholder="<?php echo __('napíš CSS glyphicon triedu'); ?>" value="<?php echo esc_attr($address_glyphicon); ?>" />
        </p>
       
    <?php
}
}