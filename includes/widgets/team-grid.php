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
     * Get style dependencies.
     *
     * Retrieve the list of style dependencies the widget requires.
     *
     * @since 3.24.0
     * @access public
     *
     * @return array Widget style dependencies.
     */
    public function get_style_depends(): array {
        return ['tn-team-grid-style-1'];
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

        ?>
        <div class="team-network-team-grid-1-section">
            <div class="tn-team-item">
                <div class="tn-team-member tn-left tn-position-top">
                    <div class="tn-team-member-thumb">
                        <img loading="lazy" decoding="async" width="1000" height="1000"
                            src="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg"
                            class="attachment-full size-full wp-image-5383" alt=""
                            srcset="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg 1000w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-300x300.jpg 300w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-100x100.jpg 100w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-600x600.jpg 600w"
                            sizes="(max-width: 1000px) 100vw, 1000px">
                    </div>
                    <div class="tn-team-member-content">
                        <h3 class="tn-team-member-name">
                            Francis Terry
                        </h3>
                        <span class="tn-team-member-designation">Marketing Director </span>
                        <div class="tn-team-member-about">
                            Neque enim omnis et quidem temporibus quo in. Tenetur quaerat repellendus. Veniam quisquam aut
                            ...
                        </div>
                        <ul class="list-inline tn-team-member-social">
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-2c09094">
                                    <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-ebfbc25">
                                    <i aria-hidden="true" class="fab fa-instagram"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-8f71149">
                                    <i aria-hidden="true" class="fab fa-linkedin-in"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-611a6e0">
                                    <i aria-hidden="true" class="fab fa-dribbble"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tn-team-item">
                <div class="tn-team-member tn-left tn-position-top">
                    <div class="tn-team-member-thumb">
                        <img loading="lazy" decoding="async" width="1000" height="1000"
                            src="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg"
                            class="attachment-full size-full wp-image-5383" alt=""
                            srcset="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg 1000w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-300x300.jpg 300w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-100x100.jpg 100w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-600x600.jpg 600w"
                            sizes="(max-width: 1000px) 100vw, 1000px">
                    </div>
                    <div class="tn-team-member-content">
                        <h3 class="tn-team-member-name">
                            Francis Terry
                        </h3>
                        <span class="tn-team-member-designation">
                            Marketing Director </span>
                        <div class="tn-team-member-about">
                            Neque enim omnis et quidem temporibus quo in. Tenetur quaerat repellendus. Veniam quisquam aut
                            ...
                        </div>
                        <ul class="list-inline tn-team-member-social">
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-2c09094">
                                    <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-ebfbc25">
                                    <i aria-hidden="true" class="fab fa-instagram"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-8f71149">
                                    <i aria-hidden="true" class="fab fa-linkedin-in"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-611a6e0">
                                    <i aria-hidden="true" class="fab fa-dribbble"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tn-team-item">
                <div class="tn-team-member tn-left tn-position-top">
                    <div class="tn-team-member-thumb">
                        <img loading="lazy" decoding="async" width="1000" height="1000"
                            src="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg"
                            class="attachment-full size-full wp-image-5383" alt=""
                            srcset="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg 1000w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-300x300.jpg 300w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-100x100.jpg 100w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-600x600.jpg 600w"
                            sizes="(max-width: 1000px) 100vw, 1000px">
                    </div>
                    <div class="tn-team-member-content">
                        <h3 class="tn-team-member-name">
                            Francis Terry
                        </h3>
                        <span class="tn-team-member-designation">
                            Marketing Director </span>
                        <div class="tn-team-member-about">
                            Neque enim omnis et quidem temporibus quo in. Tenetur quaerat repellendus. Veniam quisquam aut
                            ...
                        </div>
                        <ul class="list-inline tn-team-member-social">
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-2c09094">
                                    <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-ebfbc25">
                                    <i aria-hidden="true" class="fab fa-instagram"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-8f71149">
                                    <i aria-hidden="true" class="fab fa-linkedin-in"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-611a6e0">
                                    <i aria-hidden="true" class="fab fa-dribbble"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tn-team-item">
                <div class="tn-team-member tn-left tn-position-top">
                    <div class="tn-team-member-thumb">
                        <img loading="lazy" decoding="async" width="1000" height="1000"
                            src="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg"
                            class="attachment-full size-full wp-image-5383" alt=""
                            srcset="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg 1000w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-300x300.jpg 300w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-100x100.jpg 100w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-600x600.jpg 600w"
                            sizes="(max-width: 1000px) 100vw, 1000px">
                    </div>
                    <div class="tn-team-member-content">
                        <h3 class="tn-team-member-name">
                            Francis Terry
                        </h3>
                        <span class="tn-team-member-designation">
                            Marketing Director </span>
                        <div class="tn-team-member-about">
                            Neque enim omnis et quidem temporibus quo in. Tenetur quaerat repellendus. Veniam quisquam aut
                            ...
                        </div>
                        <ul class="list-inline tn-team-member-social">
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-2c09094">
                                    <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-ebfbc25">
                                    <i aria-hidden="true" class="fab fa-instagram"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-8f71149">
                                    <i aria-hidden="true" class="fab fa-linkedin-in"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-611a6e0">
                                    <i aria-hidden="true" class="fab fa-dribbble"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tn-team-item">
                <div class="tn-team-member tn-left tn-position-top">
                    <div class="tn-team-member-thumb">
                        <img loading="lazy" decoding="async" width="1000" height="1000"
                            src="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg"
                            class="attachment-full size-full wp-image-5383" alt=""
                            srcset="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg 1000w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-300x300.jpg 300w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-100x100.jpg 100w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-600x600.jpg 600w"
                            sizes="(max-width: 1000px) 100vw, 1000px">
                    </div>
                    <div class="tn-team-member-content">
                        <h3 class="tn-team-member-name">
                            Francis Terry
                        </h3>
                        <span class="tn-team-member-designation">
                            Marketing Director </span>
                        <div class="tn-team-member-about">
                            Neque enim omnis et quidem temporibus quo in. Tenetur quaerat repellendus. Veniam quisquam aut
                            ...
                        </div>
                        <ul class="list-inline tn-team-member-social">
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-2c09094">
                                    <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-ebfbc25">
                                    <i aria-hidden="true" class="fab fa-instagram"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-8f71149">
                                    <i aria-hidden="true" class="fab fa-linkedin-in"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-611a6e0">
                                    <i aria-hidden="true" class="fab fa-dribbble"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tn-team-item">
                <div class="tn-team-member tn-left tn-position-top">
                    <div class="tn-team-member-thumb">
                        <img loading="lazy" decoding="async" width="1000" height="1000"
                            src="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg"
                            class="attachment-full size-full wp-image-5383" alt=""
                            srcset="https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower.jpg 1000w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-300x300.jpg 300w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-100x100.jpg 100w, https://exclusiveaddons.com/wp-content/uploads/2020/05/rush-perruque-femme-primepower-600x600.jpg 600w"
                            sizes="(max-width: 1000px) 100vw, 1000px">
                    </div>
                    <div class="tn-team-member-content">
                        <h3 class="tn-team-member-name">
                            Francis Terry
                        </h3>
                        <span class="tn-team-member-designation">
                            Marketing Director </span>
                        <div class="tn-team-member-about">
                            Neque enim omnis et quidem temporibus quo in. Tenetur quaerat repellendus. Veniam quisquam aut
                            ...
                        </div>
                        <ul class="list-inline tn-team-member-social">
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-2c09094">
                                    <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-ebfbc25">
                                    <i aria-hidden="true" class="fab fa-instagram"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-8f71149">
                                    <i aria-hidden="true" class="fab fa-linkedin-in"></i> </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" class="tn-social-icon elementor-repeater-item-611a6e0">
                                    <i aria-hidden="true" class="fab fa-dribbble"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<?php
}
}
