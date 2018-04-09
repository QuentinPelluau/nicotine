<?php

add_action('init', 'pq_create_contributors_tax');

function pq_create_contributors_tax()
{
    $labels = [
        'name' => 'Contributeurs',
        'singular_name' => 'Contributeur',
        'search_items' => 'Rechercher un contributeur',
        'all_items' => 'Tous les contributeurs',
        'edit_item' => 'Éditer un contributeur',
        'update_item' => 'Mettre à jour un contributeur',
        'add_new_item' => 'Ajouter un contributeur',
        'menu_name' => 'Contributeurs'
    ];

    register_taxonomy('contributors', ['projets'], [
        'hierarchical' => false,
        'public' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'contributors']
    ]);
}