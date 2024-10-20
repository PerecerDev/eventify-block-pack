<?php
/**
* Plugin Name: Eventify Block Pack
* Description: Habilita bloques de contenido relacionados con los Eventos
* Version: 1.0
* Author: Alex Perecer
*
* @package CreateBlock
*/

if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path( __FILE__ ) . 'services/disable_redirect.php';
require_once plugin_dir_path( __FILE__ ) . 'services/components.php';
require_once plugin_dir_path( __FILE__ ) . 'services/queried_data.php';

function create_block_eventify_block_pack_block_init() {
	register_block_type( __DIR__ . '/build/event-list' );
	register_block_type( __DIR__ . '/build/main-events' ); 
}
add_action( 'init', 'create_block_eventify_block_pack_block_init' );

function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', [], '6.0.0-beta3' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );