<?php

// @sidebar hook filter

function al_render_post_type($cpt)
{

    $args = [
        'post_type' => $cpt,
        'posts_per_page' => 10,
        'order' => 'DESC'
    ];

    $args = apply_filters('al_hook_filter_post_type_args', $args);

    $loop = new WP_Query($args);

    $out = '';

    $className = 'post_type';

    $className = apply_filters('al_hook_filter_post_type_className', $className);

    if ($loop->have_posts()) {
        $out .= '<ul class="' . $className . '">';
        while ($loop->have_posts()) {
            $loop->the_post();
            $out .= '<a href="' . get_permalink(get_the_ID()) . '">' . the_title('<li>', '</li>', false) . '</a>';
        }
        $out .= '</ul>';

    }

    $out = apply_filters('al_hook_filter_post_type_out', $out);

    wp_reset_postdata();

    echo $out;

}

