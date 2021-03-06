<?php
class muth_partners_widget extends WP_Widget
{
	private $counter = 0;
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

    public function get_counter(){
        return $this->counter;
    }
    public function set_counter($value){
        $this->counter = $value;
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
    	//switch for setting different delay on icons
        switch ($this->get_counter()) {
            case 0:
                $animation_delay = 'data-wow-delay="0.1s"';
                break;
            case 1:
				$animation_delay = 'data-wow-delay="0.2s"';
				break;
            case 2:
				$animation_delay = 'data-wow-delay="0.3s"';
				break;
            case 3:
				$animation_delay = 'data-wow-delay="0.4s"';
				break;
            case 4:
				$animation_delay = 'data-wow-delay="0.5s"';
				break;
            case 5:
				$animation_delay = 'data-wow-delay="0.6s"';
				break;
             default:
                $animation_delay = '';
                break;
        }
        $title = (!empty($instance['title'])? $instance['title'] : __(''));
        $link  = (!empty($instance['link'])? $instance['link'] : __('#'));
        $image = (!empty($instance['image'])? $instance['image'] : __(''));
        // Add any html to output the image in the $instance array
        $output  = '';
        $output .= '<li  '.$animation_delay.'><a href='.$link.'><img src="'.$image.'" alt="'.$title.'" ></a></li>';
      
        $this->set_counter($this->get_counter()+1);
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
       //print_r($instance);
      
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
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" placeholder="<?php _e('Nadpis');?>" value="<?php echo esc_attr( $title );?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link' ); ?>"><?php _e( 'Link:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" placeholder="<?php _e('http://');?>" value="<?php echo addhttp(esc_attr( $link ));?>" />
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