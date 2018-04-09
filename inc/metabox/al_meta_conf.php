<?php
add_action('add_meta_boxes', 'al_add_meta_conf');


function al_add_meta_conf()
{
    add_meta_box('al-metaconf', 'Info Conférence', 'al_field_meta_conf', 'conference', 'normal', 'low');
}

// affichage des fields

function al_field_meta_conf($post)
{

    $meta = get_post_meta($post->ID, '_al_meta_conf', true);

    $title = (!empty($meta['title'])) ? $meta['title'] : '';
    $lat = (!empty($meta['lat'])) ? $meta['lat'] : '';
    $lng = (!empty($meta['lng'])) ? $meta['lng'] : '';

    wp_nonce_field('al_nonce_meta_conf', 'al_nonce_meta_conf_field');
    ?>
    <h2> Description de la conférence </h2>
    <label>Nom de la salle:</label>
    <input type="text" name="al_title_meta_conf" value="<?php echo esc_attr($title); ?>">
    <input type="text" name="al_lat_meta_conf" value="<?php echo esc_attr($lat); ?>">
    <input type="text" name="al_lng_meta_conf" value="<?php echo esc_attr($lng); ?>">

    <?php
}


add_action('save_post', 'al_save_meta_conf');

function al_save_meta_conf($postId)
{

    if (!wp_verify_nonce($_POST['al_nonce_meta_conf_field'], 'al_nonce_meta_conf'))
        return;

    if (!current_user_can('edit_post'))
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!empty($_POST['al_title_meta_conf'])) {

        $title = sanitize_text_field($_POST['al_title_meta_conf']);
        $lat = sanitize_text_field($_POST['al_lat_meta_conf']);
        $lng = sanitize_text_field($_POST['al_lng_meta_conf']);

        update_post_meta($postId, '_al_meta_conf', [
            'title' => $title,
            'lat' => $lat,
            'lng' => $lng,
        ]);

    }

}