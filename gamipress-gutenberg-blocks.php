<?php
/**
 * Plugin Name:           GamiPress - Gutenberg Blocks
 * Plugin URI:            https://github.com/rubengc/GamiPress-Gutenberg-Blocks
 * Description:           GamiPress blocks for Gutenberg.
 * Version:               1.0.0
 * Author:                GamiPress
 * Author URI:            https://gamipress.com/
 * Text Domain:           gamipress-gutenberg-blocks
 * Domain Path:           /languages/
 * Requires at least:     4.4
 * Tested up to:          5.0
 * License:               GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package               GamiPress\Gutenberg_Blocks
 * @author                GamiPress
 * @copyright             Copyright (c) GamiPress
 */

final class GamiPress_Gutenberg_Blocks {

    /**
     * @var         GamiPress_Gutenberg_Blocks $instance The one true GamiPress_Gutenberg_Blocks
     * @since       1.0.0
     */
    private static $instance;

    /**
     * Get active instance
     *
     * @access      public
     * @since       1.0.0
     * @return      object self::$instance The one true GamiPress_Gutenberg_Blocks
     */
    public static function instance() {
        if( !self::$instance ) {
            self::$instance = new GamiPress_Gutenberg_Blocks();
            self::$instance->constants();
            self::$instance->includes();
            self::$instance->hooks();
            self::$instance->load_textdomain();
        }

        return self::$instance;
    }

    /**
     * Setup plugin constants
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function constants() {
        // Plugin version
        define( 'GAMIPRESS_GUTEMBERG_BLOCKS_VER', '1.0.0' );

        // Plugin path
        define( 'GAMIPRESS_GUTEMBERG_BLOCKS_DIR', plugin_dir_path( __FILE__ ) );

        // Plugin URL
        define( 'GAMIPRESS_GUTEMBERG_BLOCKS_URL', plugin_dir_url( __FILE__ ) );
    }

    /**
     * Include plugin files
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function includes() {

        if( $this->meets_requirements() ) {

            require_once GAMIPRESS_GUTEMBERG_BLOCKS_DIR . 'src/init.php';

        }
    }

    /**
     * Setup plugin hooks
     *
     * @access      private
     * @since       1.0.0
     * @return      void
     */
    private function hooks() {
        // Setup our activation and deactivation hooks
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        add_action( 'admin_notices', array( $this, 'admin_notices' ) );
    }

    /**
     * Activation hook for the plugin.
     *
     * @since  1.0.0
     */
    function activate() {

        if( $this->meets_requirements() ) {

        }

    }

    /**
     * Deactivation hook for the plugin.
     *
     * @since  1.0.0
     */
    function deactivate() {

    }

    /**
     * Plugin admin notices.
     *
     * @since  1.0.0
     */
    public function admin_notices() {

        if ( ! $this->meets_requirements() && ! defined( 'GAMIPRESS_ADMIN_NOTICES' ) ) : ?>

            <div id="message" class="notice notice-error is-dismissible">
                <p>
                    <?php printf(
                        __( 'GamiPress - Forminator integration requires %s in order to work. Please install and activate it.', 'gamipress-gutenberg-blocks' ),
                        '<a href="https://wordpress.org/plugins/gamipress/" target="_blank">GamiPress</a>'
                    ); ?>
                </p>
            </div>

            <?php define( 'GAMIPRESS_ADMIN_NOTICES', true ); ?>

        <?php endif;

    }

    /**
     * Check if there are all plugin requirements
     *
     * @since  1.0.0
     *
     * @return bool True if installation meets all requirements
     */
    private function meets_requirements() {

        if ( ! class_exists( 'GamiPress' ) ) {
            return false;
        }

        return true;

    }

    /**
     * Internationalization
     *
     * @access      public
     * @since       1.0.0
     * @return      void
     */
    public function load_textdomain() {
        // Set filter for language directory
        $lang_dir = GAMIPRESS_GUTEMBERG_BLOCKS_DIR . '/languages/';
        $lang_dir = apply_filters( 'gamipress_forminator_languages_directory', $lang_dir );

        // Traditional WordPress plugin locale filter
        $locale = apply_filters( 'plugin_locale', get_locale(), 'gamipress-gutenberg-blocks' );
        $mofile = sprintf( '%1$s-%2$s.mo', 'gamipress-gutenberg-blocks', $locale );

        // Setup paths to current locale file
        $mofile_local   = $lang_dir . $mofile;
        $mofile_global  = WP_LANG_DIR . '/gamipress-gutenberg-blocks/' . $mofile;

        if( file_exists( $mofile_global ) ) {
            // Look in global /wp-content/languages/gamipress-gutenberg-blocks/ folder
            load_textdomain( 'gamipress-gutenberg-blocks', $mofile_global );
        } elseif( file_exists( $mofile_local ) ) {
            // Look in local /wp-content/plugins/gamipress-gutenberg-blocks/languages/ folder
            load_textdomain( 'gamipress-gutenberg-blocks', $mofile_local );
        } else {
            // Load the default language files
            load_plugin_textdomain( 'gamipress-gutenberg-blocks', false, $lang_dir );
        }
    }

}

/**
 * The main function responsible for returning the one true GamiPress_Gutenberg_Blocks instance to functions everywhere
 *
 * @since       1.0.0
 * @return      \GamiPress_Gutenberg_Blocks The one true GamiPress_Gutenberg_Blocks
 */
function GamiPress_Gutenberg_Blocks() {
    return GamiPress_Gutenberg_Blocks::instance();
}
add_action( 'plugins_loaded', 'GamiPress_Gutenberg_Blocks' );
