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
		$member = 'teamnetwork' == get_post_type($member_id) ? get_post($member_id) : '';

		$thumb = null;
		$member_name = null;
		$member_excerpt = null;

		if(!empty($member)){
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($member_id), 'large'); 
			$thumb = $thumb[0];
			$member_name = $member->post_title;
			$member_excerpt = $member->post_excerpt;
		}

		if(empty($thumb)){
			$thumb =  \Elementor\Utils::get_placeholder_image_src();
		}

		$live = get_post_meta( $member_id, '_tn_member_location', true );
        $phone = get_post_meta( $member_id, '_tn_member_phone', true );
        $role = get_post_meta( $member_id, '_tn_member_role', true );

        ?>

			<style>
				section.tn-single-member-view {
				display: flex;
				justify-content: center;
				align-items: center;
				}

				.team-member-profile {
				width: 500px;
				background: white;
				padding: 30px;
				border-radius: 20px;
				box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
				}

				.team-member-profile .team-member-headshot img {
				border-radius: 10px;
				margin-bottom: 20px;
				width: 100% !important;
				height: 100% !important;
				}

				.team-member-profile h1.team-member-name {
				font-size: 44px;
				line-height: 44px;
				}
			</style>

			<section class="tn-single-member-view">
				<div class="team-member-profile">
					<div class="team-member-headshot">
						<img src="<?php echo esc_url($thumb) ?>" alt="<?php echo esc_html__($member_name, 'team-network'); ?>">
					</div>
						<h1 class="team-member-name">
							<?php echo esc_html__($member_name, 'team-network'); ?>
						</h1>
					<div class="team-member-content">
						<p><?php echo esc_html__($member_excerpt, 'team-network'); ?></p>
						<p>
							<strong>Job Title: </strong> <?php echo esc_html( $role );?>
						</p>
						<p>
							<strong>Phone: </strong> <?php echo esc_html( $phone );?>
						</p>
						<p>
							<strong>Based in: </strong> <?php echo esc_html( $live );?>
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
