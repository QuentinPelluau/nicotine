<?php

add_action('init', 'al_create_technique_tax');

function al_create_technique_tax()
{
    $labels = [
        'name' => 'technique',
        'singular_name' => 'technique',
        'search_items' => 'rechercher un technique',
        'all_items' => 'tous les technique',
        'edit_item' => 'éditer un technique',
        'update_item' => 'mettre à jour un technique',
        'add_new_item' => 'ajouter un technique',
        'menu_name' => 'Technique'
    ];

    register_taxonomy('technique', ['post', 'conference'], [
        'hierarchical' => false,
        'public' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'technique']
    ]);
}