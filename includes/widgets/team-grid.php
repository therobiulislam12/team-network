<?php
namespace ElementorTeamNetwork\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly

/**
 * Test Addons
 *
 * Elementor widget for Portfolio Elementor Kit.
 *
 * @since 1.0.0
 */
class Team_Grid extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'team-grid';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Team Grid', 'team-network' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-posts-grid';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['team-network'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'team-network' ),
            ]
        );

        $this->add_control(
            'team_grid_style',
            [
                'label'     => esc_html__( 'Team Grid Style', 'team-network' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'style-1',
                'options'   => [
                    'style-1' => esc_html__( 'Style 1', 'team-network' ),
                    'style-2' => esc_html__( 'Style 2', 'team-network' ),
                    'style-3' => esc_html__( 'Style 3', 'team-network' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'team-network' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label'     => __( 'Text Transform', 'team-network' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    ''           => __( 'None', 'team-network' ),
                    'uppercase'  => __( 'UPPERCASE', 'team-network' ),
                    'lowercase'  => __( 'lowercase', 'team-network' ),
                    'capitalize' => __( 'Capitalize', 'team-network' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $team_grid_style = $settings['team_grid_style'];
        ?>
		<?php if ( 'style-1' === $team_grid_style ) {?>
			<h1>Style 1</h1>
		<?php } elseif ( 'style-2' === $team_grid_style ) {?>
			<h1>Style 2</h1>
		<?php } else {?>
			<h1>Style 3</h1>
		<?php }
    }
}
