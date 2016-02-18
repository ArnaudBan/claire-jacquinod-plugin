<?php

function micro_projet_init() {
	register_post_type( 'micro-projet', array(
		'labels'            => array(
			'name'                => __( 'Micro Projets', 'claire-jacquinod-plugin' ),
			'singular_name'       => __( 'Micro Projet', 'claire-jacquinod-plugin' ),
			'all_items'           => __( 'All Micro Projets', 'claire-jacquinod-plugin' ),
			'new_item'            => __( 'New Micro Projet', 'claire-jacquinod-plugin' ),
			'add_new'             => __( 'Add New', 'claire-jacquinod-plugin' ),
			'add_new_item'        => __( 'Add New Micro Projet', 'claire-jacquinod-plugin' ),
			'edit_item'           => __( 'Edit Micro Projet', 'claire-jacquinod-plugin' ),
			'view_item'           => __( 'View Micro Projet', 'claire-jacquinod-plugin' ),
			'search_items'        => __( 'Search Micro Projets', 'claire-jacquinod-plugin' ),
			'not_found'           => __( 'No Micro Projets found', 'claire-jacquinod-plugin' ),
			'not_found_in_trash'  => __( 'No Micro Projets found in trash', 'claire-jacquinod-plugin' ),
			'parent_item_colon'   => __( 'Parent Micro Projet', 'claire-jacquinod-plugin' ),
			'menu_name'           => __( 'Micro Projets', 'claire-jacquinod-plugin' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'publicize' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-customizer',
	) );

}
add_action( 'init', 'micro_projet_init' );

function micro_projet_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['micro-projet'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Micro Projet updated. <a target="_blank" href="%s">View Micro Projet</a>', 'claire-jacquinod-plugin'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'claire-jacquinod-plugin'),
		3 => __('Custom field deleted.', 'claire-jacquinod-plugin'),
		4 => __('Micro Projet updated.', 'claire-jacquinod-plugin'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Micro Projet restored to revision from %s', 'claire-jacquinod-plugin'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Micro Projet published. <a href="%s">View Micro Projet</a>', 'claire-jacquinod-plugin'), esc_url( $permalink ) ),
		7 => __('Micro Projet saved.', 'claire-jacquinod-plugin'),
		8 => sprintf( __('Micro Projet submitted. <a target="_blank" href="%s">Preview Micro Projet</a>', 'claire-jacquinod-plugin'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Micro Projet scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Micro Projet</a>', 'claire-jacquinod-plugin'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Micro Projet draft updated. <a target="_blank" href="%s">Preview Micro Projet</a>', 'claire-jacquinod-plugin'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'micro_projet_updated_messages' );