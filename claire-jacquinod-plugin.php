<?php
/**
 * Plugin Name: Claire-jacquinod-plugin
 * Version: 0.1-alpha
 * Description: Plugin WordPress pour gérer le contenu du site claire-jacquinod.com
 * Author: ArnaudBan
 * Author URI: arnaudban.me
 * Text Domain: claire-jacquinod-plugin
 * Domain Path: /languages
 *
 * @package Claire-jacquinod-plugin
 */


// Include CPT
require_once( plugin_dir_path( __FILE__ ) . 'post-types/micro-projet.php' );

// Include taxo
require_once( plugin_dir_path( __FILE__ ) . 'taxonomies/realisation-type.php' );

// Include Widget
require_once( plugin_dir_path( __FILE__ ) . 'widgets/last-micro-projet-widget.php' );
