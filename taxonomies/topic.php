<?php

function cl_taxo_topic_init() {

    register_taxonomy( 'topic', array( 'project', 'post' ), array(
        'hierarchical'      => true,
        'public'            => false,
        'show_in_nav_menus' => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => false,
        'rewrite'           => false,
        'labels'            => array(
            'name'                       => __( 'Topics', 'claire-jacquinod-plugin' ),
            'singular_name'              => _x( 'Topic', 'taxonomy general name', 'claire-jacquinod-plugin' ),
            'search_items'               => __( 'Search Topics', 'claire-jacquinod-plugin' ),
            'popular_items'              => __( 'Popular Topics', 'claire-jacquinod-plugin' ),
            'all_items'                  => __( 'All Topics', 'claire-jacquinod-plugin' ),
            'parent_item'                => __( 'Parent Topic', 'claire-jacquinod-plugin' ),
            'parent_item_colon'          => __( 'Parent Topic:', 'claire-jacquinod-plugin' ),
            'edit_item'                  => __( 'Edit Topic', 'claire-jacquinod-plugin' ),
            'update_item'                => __( 'Update Topic', 'claire-jacquinod-plugin' ),
            'add_new_item'               => __( 'New Topic', 'claire-jacquinod-plugin' ),
            'new_item_name'              => __( 'New Topic', 'claire-jacquinod-plugin' ),
            'separate_items_with_commas' => __( 'Topics separated by comma', 'claire-jacquinod-plugin' ),
            'add_or_remove_items'        => __( 'Add or remove Topics', 'claire-jacquinod-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used Topics', 'claire-jacquinod-plugin' ),
            'not_found'                  => __( 'No Topics found.', 'claire-jacquinod-plugin' ),
            'menu_name'                  => __( 'Topics', 'claire-jacquinod-plugin' ),
        ),
    ) );

}
add_action( 'init', 'cl_taxo_topic_init' );
