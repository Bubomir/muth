<?php
/*

@package muththeme

======================================
TESTIMONIAL CUSTOM POST
======================================
 */

function muth_testimonials_post_type()
{
    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'add_new'            => 'Pridať nový',
        'add_new_item'       => 'Pridať nový Testimonial',
        'edit_item'          => 'Upraviť Testimonial',
        'new_item'           => 'Nový Testimonial',
        'view_item'          => 'Zobraziť Testimonial',
        'search_items'       => 'Hľadať Testimonial',
        'not_found'          => 'Žiaden Testimonial nebol nájdený',
        'not_found_in_trash' => 'Žiaden Testimonial nie je v koši',
        'parent_item_colon'  => '',
    );

    register_post_type('testimonials', array(
        'labels'               => $labels,
        'public'               => true,
        'publicly_queryable'   => true,
        'show_ui'              => true,
        'exclude_from_search'  => true,
        'query_var'            => true,
        'rewrite'              => true,
        'capability_type'      => 'post',
        'has_archive'          => false,
        'hierarchical'         => false,
        'menu_position'        => 10,
        'supports'             => array('editor'),
        'register_meta_box_cb' => 'muth_testimonials_meta_boxes', // Callback function for custom metaboxes
    ));
}

add_action('init', 'muth_testimonials_post_type');

function muth_testimonials_meta_boxes()
{
    add_meta_box('muth_testimonials_form', 'Testimonial Details', 'muth_testimonials_form', 'testimonials', 'normal', 'high');
}

function muth_testimonials_form()
{
    $post_id          = get_the_ID();
    $testimonial_data = get_post_meta($post_id, '_testimonial', true);
    $client_name      = (empty($testimonial_data['client_name'])) ? '' : $testimonial_data['client_name'];
    $source           = (empty($testimonial_data['source'])) ? '' : $testimonial_data['source'];
    $link             = (empty($testimonial_data['link'])) ? '' : $testimonial_data['link'];

    wp_nonce_field('testimonials', 'testimonials');
    ?>
    <p>
        <label>Meno klienta (voliteľné)</label><br />
        <input type="text" value="<?php echo $client_name; ?>" name="testimonial[client_name]" size="40" />
    </p>
    <p>
        <label>Názov spoločnosti (voliteľné)</label><br />
        <input type="text" value="<?php echo $source; ?>" name="testimonial[source]" size="40" />
    </p>
    <p>
        <label>Link (voliteľné)</label><br />
        <input type="text" value="<?php echo $link; ?>" name="testimonial[link]" size="40" />
    </p>
    <?php
}

function muth_testimonials_save_post($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!empty($_POST['testimonials']) && !wp_verify_nonce($_POST['testimonials'], 'testimonials')) {
        return;
    }

    if (!empty($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }

    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

    }

    if (!wp_is_post_revision($post_id) && 'testimonials' == get_post_type($post_id)) {
        remove_action('save_post', 'muth_testimonials_save_post');

        wp_update_post(array(
            'ID'         => $post_id,
            'post_title' => 'Testimonial - ' . $post_id,
        ));

        add_action('save_post', 'muth_testimonials_save_post');
    }

    if (!empty($_POST['testimonial'])) {
        $testimonial_data['client_name'] = (empty($_POST['testimonial']['client_name'])) ? '' : sanitize_text_field($_POST['testimonial']['client_name']);
        $testimonial_data['source']      = (empty($_POST['testimonial']['source'])) ? '' : sanitize_text_field($_POST['testimonial']['source']);
        $testimonial_data['link']        = (empty($_POST['testimonial']['link'])) ? '' : esc_url($_POST['testimonial']['link']);

        update_post_meta($post_id, '_testimonial', $testimonial_data);
    } else {
        delete_post_meta($post_id, '_testimonial');
    }
}
add_action('save_post', 'muth_testimonials_save_post');

function muth_testimonials_edit_columns($columns)
{
    $columns = array(
        'cb'                      => '<input type="checkbox" />',
        'title'                   => 'Názov',
        'testimonial'             => 'Testimonial',
        'testimonial-client-name' => 'Meno klienta',
        'testimonial-source'      => 'Názov spoločnosti',
        'testimonial-link'        => 'URL link',
        'author'                  => 'Pridané',
        'date'                    => 'Dátum',
    );

    return $columns;
}
add_filter('manage_edit-testimonials_columns', 'muth_testimonials_edit_columns');

function muth_testimonials_columns($column, $post_id)
{
    $testimonial_data = get_post_meta($post_id, '_testimonial', true);
    switch ($column) {
        case 'testimonial':
            the_excerpt();
            break;
        case 'testimonial-client-name':
            if (!empty($testimonial_data['client_name'])) {
                echo $testimonial_data['client_name'];
            }
            break;
        case 'testimonial-source':
            if (!empty($testimonial_data['source'])) {
                echo $testimonial_data['source'];
            }
            break;
        case 'testimonial-link':
            if (!empty($testimonial_data['link'])) {
                echo $testimonial_data['link'];
            }
            break;
    }
}
add_action('manage_posts_custom_column', 'muth_testimonials_columns', 10, 2);

add_action("trash_post", "muth_test");

function muth_test($post_id){
	var_dump($post_id);
}


/**
 * Display a testimonial
 *
 * @param  int $post_per_page  The number of testimonials you want to display
 * @param  string $orderby  The order by setting  https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
 * @param  array $testimonial_id  The ID or IDs of the testimonial(s), comma separated
 *
 * @return  string  Formatted HTML
 */
function get_testimonial($posts_per_page = 0, $orderby = 'none', $testimonial_id = null)
{
    $args = array(
        'posts_per_page' => (int) $posts_per_page,
        'post_type'      => 'testimonials',
        'orderby'        => $orderby,
        'no_found_rows'  => true,
    );
    if ($testimonial_id) {
        $args['post__in'] = array($testimonial_id);
    }

    $query = new WP_Query($args);
      
    $testimonials = array();
    if ($query->have_posts()) {
        while ($query->have_posts()): $query->the_post();


            $post_id = get_the_ID();
            $testimonial_data = get_post_meta( $post_id, '_testimonial', true );
            $client_name = ( empty( $testimonial_data['client_name'] ) ) ? '' : $testimonial_data['client_name'];
            $source = ( empty( $testimonial_data['source'] ) ) ? '' : ' - ' . $testimonial_data['source'];
            $link = ( empty( $testimonial_data['link'] ) ) ? '' : $testimonial_data['link'];
            $cite = ( $link ) ? '<a href="' . esc_url( $link ) . '" target="_blank">' . $client_name . $source . '</a>' : $client_name . $source;
            
            $testimonial['post_id']     = $post_id;
            $testimonial['data']        = $testimonial_data;
            $testimonial['client_name'] = $client_name;
            $testimonial['source']      = $source;
            $testimonial['link']        = $link;
            $testimonial['cite']        = $cite;
            $testimonial['content'] = get_the_content();
            array_push($testimonials, $testimonial);
        endwhile;
        wp_reset_postdata();
    }

    return $testimonials;
}
?>