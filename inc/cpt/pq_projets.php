<?php
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

add_action('init', 'pq_register_projets');

function  pq_register_projets() {
    $labels = array(
        'name'          => 'Projets',
        'singular_name' => 'Projet',
        'search_items'  => 'Rechercher un projet',
        'all_items'     => 'Tous les projets',
        'edit_item'     => 'Éditer un projet',
        'update_item'   => 'Mettre à jour un projet',
        'add_new_item'  => 'Ajouter un projet',
        'menu_name'     => 'Projets',
        'view' => 'Voir le projet',
        'not_found' => 'Aucun projet trouvé',
        'not_found_in_trash' => 'Aucun projet trouvé dans la poubelle',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus',
        'exclude_from_search' => false,
        'query_var' => true,
        'rewrite' => true, // array('slug' => 'projects','with_front' => false),
        'has_archive' => 'projets',
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-video-alt',
        'menu_position' => 3,
        //suppression partie texte BBcode
        'supports' => ['title', 'post-formats', 'thumbnail', 
                        /*'custom-fields', 'editor', 'author', 'excerpt', 'comments'*/]
    );

    register_post_type( 'projets', $args );
}