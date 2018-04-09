<?php

// @theme
add_action('after_setup_theme', 'al_setup_theme');

function al_setup_theme()
{
    // api des menus // ? a revoir//comprendre
    register_nav_menus([
        'main' => 'Mon menu principal',
        'footer' => 'Menu dans le footer'
    ]);

    // image à la une, thumbnail, medium, large voir les réglages admin WP
    add_theme_support('post-thumbnails');
    add_image_size('thumbnail-column', 90, 90, true); // true crop
    add_theme_support('post-formats', ['aside', 'gallery', 'video']);

}

// @scripts
add_action('wp_enqueue_scripts', 'pq_setup_script');

function pq_setup_script()
{
    wp_enqueue_style('style-css', get_stylesheet_uri());
}

// @taxonomy
//ADMIN -> étiquettes, categories est une taxonomy
require_once TEMPLATEPATH . '/inc/tax/pq_contributor.php';

// @cpt for loop
require_once TEMPLATEPATH . '/inc/cpt/pq_projets.php';

// Show Only One Category on Home Page
function al_modify_query_post( $query ) {
// si home est main query 
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('post_type', ['post', 'projets']);
    }
}
add_action('pre_get_post', 'al_modify_query_post');

// @filters hook discovery

// example filter
require_once TEMPLATEPATH . '/inc/hook/al_filter_example.php';

add_filter( 'al_filter_example_values', 'al_example_add_value', 10, 3 );

function al_example_add_value($val, $a, $b)
{

    $a =(int) $a;
    $b =(int) $b;
    $val += $a*$b;  // add value $val

    return $val;
}

require_once TEMPLATEPATH . '/inc/hook/al_filter_post_type.php';

add_filter('al_hook_filter_post_type_args', 'al_def_post_type', 10, 1);

function al_def_post_type($args)
{
    $args['post_per_page'] = 3;
    $args['order'] = 'ASC';

    return $args;
}

add_filter('al_hook_filter_post_type_className', 'al_def_post_type_className', 10, 1);

function al_def_post_type_className($className)
{
    //$className = 'sidebar__conference';

    //var_dump($className);

    return 'sidebar__conference';
}

add_filter('al_hook_filter_post_type_out', 'al_def_post_type_wrapper', 10, 1);

function al_def_post_type_wrapper($out)
{
    $out = str_replace('<ul', '<ol', $out);
    $out = str_replace('</ul>', '</ol>', $out);

    return $out;
}

// @metabox
require_once TEMPLATEPATH . '/inc/metabox/pq_metabox.php';
// objet meta + instances

// @shortcode
require_once TEMPLATEPATH . '/inc/shortcode/al_shortcodes.php';


// @login
function pq_logo_login()
{
    ?><style>
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_template_directory_uri()?>/assets/img/login_logo.png');
            background-image: none, url('<?php echo get_template_directory_uri()?>/assets/img/login_logo.svg');
        }
    </style><?php
}
add_action('login_enqueue_scripts', 'pq_logo_login'); 

