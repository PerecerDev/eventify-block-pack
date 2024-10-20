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

require_once plugin_dir_path( __FILE__ ) . 'includes/disable_redirect.php';

function create_block_eventify_block_pack_block_init() {
	register_block_type( __DIR__ . '/build/event-list' );
	register_block_type( __DIR__ . '/build/main-events' ); 
}
add_action( 'init', 'create_block_eventify_block_pack_block_init' );