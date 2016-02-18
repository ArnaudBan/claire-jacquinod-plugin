<?php

function glossary_init() {
	register_post_type( 'glossary-term', array(
		'labels'            => array(
			'name'                => __( 'Glossary terms', 'claire-jacquinod-plugin' ),
			'singular_name'       => __( 'Glossary term', 'claire-jacquinod-plugin' ),
			'all_items'           => __( 'All Glossary terms', 'claire-jacquinod-plugin' ),
			'new_item'            => __( 'New Glossary term', 'claire-jacquinod-plugin' ),
			'add_new'             => __( 'Add New', 'claire-jacquinod-plugin' ),
			'add_new_item'        => __( 'Add New Glossary term', 'claire-jacquinod-plugin' ),
			'edit_item'           => __( 'Edit Glossary term', 'claire-jacquinod-plugin' ),
			'view_item'           => __( 'View Glossary term', 'claire-jacquinod-plugin' ),
			'search_items'        => __( 'Search Glossary terms', 'claire-jacquinod-plugin' ),
			'not_found'           => __( 'No Glossary terms found', 'claire-jacquinod-plugin' ),
			'not_found_in_trash'  => __( 'No Glossary terms found in trash', 'claire-jacquinod-plugin' ),
			'parent_item_colon'   => __( 'Parent Glossary term', 'claire-jacquinod-plugin' ),
			'menu_name'           => __( 'Glossary terms', 'claire-jacquinod-plugin' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => __('glossary', 'claire-jacquinod-plugin'),
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-book-alt',
	) );

}
add_action( 'init', 'glossary_init' );

function glossary_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['glossary-term'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Glossary term updated. <a target="_blank" href="%s">View Glossary term</a>', 'claire-jacquinod-plugin'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'claire-jacquinod-plugin'),
		3 => __('Custom field deleted.', 'claire-jacquinod-plugin'),
		4 => __('Glossary term updated.', 'claire-jacquinod-plugin'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Glossary term restored to revision from %s', 'claire-jacquinod-plugin'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Glossary term published. <a href="%s">View Glossary term</a>', 'claire-jacquinod-plugin'), esc_url( $permalink ) ),
		7 => __('Glossary term saved.', 'claire-jacquinod-plugin'),
		8 => sprintf( __('Glossary term submitted. <a target="_blank" href="%s">Preview Glossary term</a>', 'claire-jacquinod-plugin'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Glossary term scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Glossary term</a>', 'claire-jacquinod-plugin'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Glossary term draft updated. <a target="_blank" href="%s">Preview Glossary term</a>', 'claire-jacquinod-plugin'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'glossary_updated_messages' );
