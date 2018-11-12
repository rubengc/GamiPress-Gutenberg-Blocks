<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Remove GamiPress hooks to override assets by this development version
remove_action( 'enqueue_block_editor_assets', 'gamipress_blocks_editor_assets' );
remove_action( 'enqueue_block_assets', 'gamipress_blocks_assets' );

/**
 * Enqueue Gutenberg block assets for backend editor
 *
 * @since 1.0.0
 */
function gamipress_gutenberg_blocks_editor_assets() {

	// Scripts
    // gamipress-blocks-js is localized on gamipress_localize_blocks_editor_assets()
	wp_enqueue_script(
		'gamipress-blocks-js',
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
        GAMIPRESS_GUTEMBERG_BLOCKS_VER,
		true
	);

	// Styles
	wp_enqueue_style(
		'gamipress-blocks-editor-css',
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		GAMIPRESS_GUTEMBERG_BLOCKS_VER
	);

}
add_action( 'enqueue_block_editor_assets', 'gamipress_gutenberg_blocks_editor_assets' );


/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @since 1.0.0
 */
function gamipress_gutenberg_blocks_block_assets() {

    // Styles
    wp_enqueue_style(
        'gamipress-blocks-style-css',
        plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
        array( 'wp-blocks' ),
        GAMIPRESS_GUTEMBERG_BLOCKS_VER
    );

}
add_action( 'enqueue_block_assets', 'gamipress_gutenberg_blocks_block_assets' );


