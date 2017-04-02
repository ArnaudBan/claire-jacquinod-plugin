<?php

function cl_taxo_offer_init() {
    register_taxonomy( 'offer', array( 'project' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => true,
        'labels'            => array(
            'name'                       => __( 'Offers', 'claire-jacquinod-plugin' ),
            'singular_name'              => _x( 'Offer', 'taxonomy general name', 'claire-jacquinod-plugin' ),
            'search_items'               => __( 'Search Offers', 'claire-jacquinod-plugin' ),
            'popular_items'              => __( 'Popular Offers', 'claire-jacquinod-plugin' ),
            'all_items'                  => __( 'All Offers', 'claire-jacquinod-plugin' ),
            'parent_item'                => __( 'Parent Offer', 'claire-jacquinod-plugin' ),
            'parent_item_colon'          => __( 'Parent Offer:', 'claire-jacquinod-plugin' ),
            'edit_item'                  => __( 'Edit Offer', 'claire-jacquinod-plugin' ),
            'update_item'                => __( 'Update Offer', 'claire-jacquinod-plugin' ),
            'add_new_item'               => __( 'New Offer', 'claire-jacquinod-plugin' ),
            'new_item_name'              => __( 'New Offer', 'claire-jacquinod-plugin' ),
            'separate_items_with_commas' => __( 'Offers separated by comma', 'claire-jacquinod-plugin' ),
            'add_or_remove_items'        => __( 'Add or remove Offers', 'claire-jacquinod-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used Offers', 'claire-jacquinod-plugin' ),
            'not_found'                  => __( 'No Offers found.', 'claire-jacquinod-plugin' ),
            'menu_name'                  => __( 'Offers', 'claire-jacquinod-plugin' ),
        ),
    ) );

}
add_action( 'init', 'cl_taxo_offer_init' );
