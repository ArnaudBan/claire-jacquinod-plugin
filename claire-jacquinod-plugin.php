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


// Include Widget
require_once( plugin_dir_path( __FILE__ ) . 'widgets/last-micro-projet-widget.php' );

// Include CPT
foreach (glob( plugin_dir_path( __FILE__ ) . "/post-types/*.php" ) as $filename){
    require_once $filename;
}

// Include taxo
foreach (glob( plugin_dir_path( __FILE__ ) . "/taxonomies/*.php" ) as $filename){
    require_once $filename;
}