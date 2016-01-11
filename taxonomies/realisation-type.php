<?php

function realisation_type_init() {
	register_taxonomy( 'realisation-type', array( 'micro-projet' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Type de réalisations', 'claire-jacquinod-plugin' ),
			'singular_name'              => _x( 'Type de réalisation', 'taxonomy general name', 'claire-jacquinod-plugin' ),
			'search_items'               => __( 'Search Type de réalisations', 'claire-jacquinod-plugin' ),
			'popular_items'              => __( 'Popular Type de réalisations', 'claire-jacquinod-plugin' ),
			'all_items'                  => __( 'All Type de réalisations', 'claire-jacquinod-plugin' ),
			'parent_item'                => __( 'Parent Type de réalisation', 'claire-jacquinod-plugin' ),
			'parent_item_colon'          => __( 'Parent Type de réalisation:', 'claire-jacquinod-plugin' ),
			'edit_item'                  => __( 'Edit Type de réalisation', 'claire-jacquinod-plugin' ),
			'update_item'                => __( 'Update Type de réalisation', 'claire-jacquinod-plugin' ),
			'add_new_item'               => __( 'New Type de réalisation', 'claire-jacquinod-plugin' ),
			'new_item_name'              => __( 'New Type de réalisation', 'claire-jacquinod-plugin' ),
			'separate_items_with_commas' => __( 'Type de réalisations separated by comma', 'claire-jacquinod-plugin' ),
			'add_or_remove_items'        => __( 'Add or remove Type de réalisations', 'claire-jacquinod-plugin' ),
			'choose_from_most_used'      => __( 'Choose from the most used Type de réalisations', 'claire-jacquinod-plugin' ),
			'not_found'                  => __( 'No Type de réalisations found.', 'claire-jacquinod-plugin' ),
			'menu_name'                  => __( 'Type de réalisations', 'claire-jacquinod-plugin' ),
		),
	) );

}
add_action( 'init', 'realisation_type_init' );
