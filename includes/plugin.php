<?php

namespace ElementorTeamNetwork;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {

    /**
     * Instance
     *
     * @since 1.0.0
     * @access private
     * @static
     *
     * @var Plugin The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @access public
     *
     * @return Plugin An instance of the class.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * widget_scripts
     *
     * Load required plugin core files.
     *
     * @since 1.0.0
     * @access public
     */
    public function widget_scripts() {
        wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), ['jquery'], false, true );
    }

    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @since 1.0.0
     * @access public
     *
     * @param /Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register_widgets( $widgets_manager ) {
        // Its is now safe to include Widgets files
        require_once __DIR__ . '/widgets/test.php';
        require_once __DIR__ . '/widgets/team-grid.php';
        require_once __DIR__ . '/widgets/single-member.php';

        // Register Widgets
        $widgets_manager->register( new Widgets\Team_Grid() );
        $widgets_manager->register( new Widgets\Test_addons() );
        $widgets_manager->register( new Widgets\Single_Member() );
    }

    /**
     * Add new MegaKit Core Widgets Category
     * @param mixed $elements_manager
     * @return void
     */
    public function team_network_widget_category( $elements_manager ) {

        $categories = [];
        $categories['team-network'] = [
            'title'       => 'Team Network',
            'icon'        => 'fa fa-plug',
            'hideIfEmpty' => true,
        ];

        // Get existing categories and merge them with the new one
        $old_categories = $elements_manager->get_categories();
        $categories = array_merge( $categories, $old_categories );

        // var_dump( $categories );exit();

        // Check if there's a public method to set categories
        if ( method_exists( $elements_manager, 'set_categories' ) ) {
            // If the method exists, set the categories
            $elements_manager->set_categories( $categories );
        } else {
            // Handle cases where there is no public setter for categories
            $set_categories = function ( $categories ) {
                $this->categories = $categories;
            };

            // Use Closure to set categories in the elements manager
            $set_categories->call( $elements_manager, $categories );
        }
    }

    /**
     *  Plugin class constructor
     *
     * Register plugin action hooks and filters
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {

        // register widgets category
        add_action('elementor/elements/categories_registered', array($this, 'team_network_widget_category'));

        // Register widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [$this, 'widget_scripts'] );

        // Register widgets
        add_action( 'elementor/widgets/register', [$this, 'register_widgets'] );

    }
}

// Instantiate Plugin Class
Plugin::instance();