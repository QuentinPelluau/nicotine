<?php

add_action('init', 'al_create_city_tax');

function al_create_city_tax()
{
    $labels = [
        'name' => 'city',
        'singular_name' => 'city',
        'search_items' => 'rechercher un city',
        'all_items' => 'tous les city',
        'edit_item' => 'éditer un city',
        'update_item' => 'mettre à jour un city',
        'add_new_item' => 'ajouter un city',
        'menu_name' => 'Technique'
    ];

    register_taxonomy('city', ['post',], [
        'hierarchical' => false,
        'public' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'city']
    ]);
}