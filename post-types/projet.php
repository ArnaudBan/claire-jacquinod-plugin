<?php

function cl_projet_init() {
    register_post_type( 'project', array(
        'labels'            => array(
            'name'                => __( 'Projets', 'claire-jacquinod-plugin' ),
            'singular_name'       => __( 'Projet', 'claire-jacquinod-plugin' ),
            'all_items'           => __( 'Tous les projets', 'claire-jacquinod-plugin' ),
            'new_item'            => __( 'Nouveau projet', 'claire-jacquinod-plugin' ),
            'add_new'             => __( 'Ajouter', 'claire-jacquinod-plugin' ),
            'add_new_item'        => __( 'Ajouter un projet', 'claire-jacquinod-plugin' ),
            'edit_item'           => __( 'Modifier un projet', 'claire-jacquinod-plugin' ),
            'view_item'           => __( 'Voir le projet', 'claire-jacquinod-plugin' ),
            'search_items'        => __( 'Chercher un projets', 'claire-jacquinod-plugin' ),
            'not_found'           => __( 'Pas de projet trouvé', 'claire-jacquinod-plugin' ),
            'not_found_in_trash'  => __( 'Pas de projet trouvé dans la corbeille', 'claire-jacquinod-plugin' ),
            'menu_name'           => __( 'Projets', 'claire-jacquinod-plugin' ),
        ),
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'publicize' ),
        'has_archive'       => __('projets', 'claire-jacquinod-plugin'),
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-location-alt',
    ) );

}
add_action( 'init', 'cl_projet_init' );