<?php

/**
 * Plugin Name:       Team Network
 * Description:       Manage your team member with custom post type
 * Plugin URI:        https://robiul.net
 * Version:           1.0.0
 *
 * Author:            Robiul Islam
 * Author URI:        https://robiul.net/about
 *
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Domain Path:       /languages
 * Text Domain:       team-network
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Main Team Network Class
 *
 * The init class that runs the Team Network plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * @since 1.2.0
 */
final class Team_Network {

    /**
     * Plugin Version
     *
     * @since 1.2.1
     * @var string The plugin version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Constructor
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {

        // activation hook
        register_activation_hook( __FILE__, array( $this, 'tn_register_activation_hook' ) );

        // call constant
        $this->define_constant();

        // Init Plugin
        add_action( 'plugins_loaded', array( $this, 'initialize_plugin' ) );

        // add post type
        add_action( 'init', array( $this, 'tn_init' ) );

    }

    public function tn_init() {

        // require post type
        require_once __DIR__ . '/includes/Admin/Post_Type.php';

        // create Post Type instance
        $post_type = new Post_Type();

        // post type method
        $post_type->team_network_post_type();

        // department category
        $post_type->tn_department_category();

        // create single page
        add_filter( 'template_include', array( $this, 'teamnetwork_single_template' ) );

        // single teamnetwork style
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_teamnetwork_styles' ) );

        // check if admin, load class
        if ( is_admin() ) {
            $admin = require_once __DIR__ . '/includes/Admin.php';
            $admin = new Admin();
        }
    }

    /**
     * Team network front-end style
     *
     * @return void
     */
    public function enqueue_teamnetwork_styles() {
        if ( is_singular( 'teamnetwork' ) ) {
            // Enqueue the CSS file from the plugin
            wp_enqueue_style( 'teamnetwork-style', plugin_dir_url( __FILE__ ) . 'assets/css/single-member.css' );
        }
    }

    /**
     * Single Team Member page
     *
     * @param mixed $template
     * @return mixed
     */
    public function teamnetwork_single_template( $template ) {
        // Check if it's a single post of custom post type 'teamnetwork'
        if ( is_singular( 'teamnetwork' ) ) {

            $plugin_template = plugin_dir_path( __FILE__ ) . 'templates/single-teamnetwork.php';

            if ( file_exists( $plugin_template ) ) {
                return $plugin_template;
            }
        }

        // Return the default template if no custom template is found
        return $template;
    }

    /**
     * Declare all constant here
     *
     *
     * @since 1.0.0
     */
    public function define_constant() {
        define( 'TN_VERSION', self::VERSION );
        define( 'TN_FILE', __FILE__ );
        define( 'TN_DIR_PATH', plugin_dir_url( TN_FILE ) );
        define( 'TN_FILE_ASSETS', TN_DIR_PATH . 'assets/' );
    }

    /**
     * Activation hook for after install plugin
     * flush custom post type
     *
     * @return void
     * @since 1.0.0
     */
    public function tn_register_activation_hook() {
        flush_rewrite_rules();
    }

    /**
     * Initialize the plugin
     *
     * Validates that Elementor is already loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed include the plugin class.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     * @access public
     */

    public function initialize_plugin() {

        // Check if Elementor installed and activated
        if ( !did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
            return;
        }

        // Check for required Elementor version
        if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
            return;
        }

        // Once we get here, We have passed all validation checks so we can safely include our plugin
        require_once __DIR__ . '/includes/plugin.php';
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated if you want elementor widgets.', 'team-network' ),
            '<strong>' . esc_html__( 'Team Network', 'team-network' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'team-network' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'team-network' ),
            '<strong>' . esc_html__( 'Team Network', 'team-network' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'team-network' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'team-network' ),
            '<strong>' . esc_html__( 'Team Network', 'team-network' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'team-network' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
}

new Team_Network();