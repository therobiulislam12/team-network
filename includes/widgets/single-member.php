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
class Single_Member extends Widget_Base {

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
        return 'single-team';
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
        return __( 'Single Member', 'team-network' );
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
        return 'eicon-user-circle-o';
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

		$this->single_team_content_control();


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

		$member_id = $settings['team_member_id'];
		$member = get_post($member_id);

        ?>

			<section class="tn-single-member-view">
			<div class="team-member-profile">
				<div class="team-member-headshot">
				<img fetchpriority="high" width="800" height="800" src="http://elementorplugin.com/wp-content/uploads/2024/10/1724535635540.jpeg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async" srcset="http://elementorplugin.com/wp-content/uploads/2024/10/1724535635540.jpeg 800w, http://elementorplugin.com/wp-content/uploads/2024/10/1724535635540-300x300.jpeg 300w, http://elementorplugin.com/wp-content/uploads/2024/10/1724535635540-150x150.jpeg 150w, http://elementorplugin.com/wp-content/uploads/2024/10/1724535635540-768x768.jpeg 768w" sizes="(max-width: 800px) 100vw, 800px">
				</div>
				<h1 class="team-member-name">Robiul Islam</h1>
				<div class="team-member-content">
				<p></p>
				<p>Robiul Islam is a wordpress plugin developer and frontend developer</p>
				<p></p>
				<p>
					<strong>Job Title: </strong>WordPress Developer
				</p>
				<p>
					<strong>Phone: </strong>+8801889314423
				</p>
				<p>
					<strong>Based in: </strong>Narayanganj, BD
				</p>
				</div>
			</div>
			</section>

		<?php
	}

	/**
	 * Single team member content control here
	 * 
	 * @return void
	 * @since 1.0.0
	 */
    protected function single_team_content_control() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'team-network' ),
            ]
        );

        $this->add_control(
            'team_member_id',
            [
                'label' => __( 'Select Team Member', 'team-network' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );


        $this->end_controls_section();
    }
}
