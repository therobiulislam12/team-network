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

		$this->single_member_content_control();

		$this->single_member_box_style_control();
		$this->single_member_heading_style_control();
		$this->single_member_excerpt_style_control();

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

		$thumb = \Elementor\Utils::get_placeholder_image_src();
		$member_name = 'Member Name';
		$member_excerpt = 'Member Excerpt';

		if(!empty($member)){
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($member_id), 'large'); 
			$thumb = $thumb[0];
			$member_name = $member->post_title;
			$member_excerpt = $member->post_excerpt;
		}

		$live = get_post_meta( $member_id, '_tn_member_location', true );
        $phone = get_post_meta( $member_id, '_tn_member_phone', true );
        $role = get_post_meta( $member_id, '_tn_member_role', true );

        ?>

			<style>
				.team-member-profile {
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
						<p class="team-member-excerpt"><?php echo esc_html__($member_excerpt, 'team-network'); ?></p>
						
						<div class="team-member-extra-details">
							<p>
								<strong><?php echo esc_html__($settings['team_member_job_title_label'], 'team-network') ?>: </strong> <?php echo esc_html( $role );?>
							</p>
							<p>
								<strong><?php echo esc_html__($settings['team_member_phone_label'], 'team-network') ?>: </strong> <?php echo esc_html( $phone );?>
							</p>
							<p>
								<strong><?php echo esc_html__($settings['team_member_based_in_label'], 'team-network') ?>: </strong> <?php echo esc_html( $live );?>
							</p>
						</div>
						
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
    protected function single_member_content_control() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'team-network' ),
            ]
        );

        $this->add_control(
            'team_member_id',
            [
                'label' => __( 'Team Member ID', 'team-network' ),
                'type'  => Controls_Manager::NUMBER,
				'placeholder' => '1',
				'separator' => 'after'
            ]
        );

		$this->add_control(
            'team_member_job_title_label',
            [
                'label' => __( 'Job Title Label', 'team-network' ),
                'type'  => Controls_Manager::TEXT,
				'default' => 'Job Title'
				
            ]
        );

		$this->add_control(
            'team_member_phone_label',
            [
                'label' => __( 'Phone Label', 'team-network' ),
                'type'  => Controls_Manager::TEXT,
				'default' => 'Phone'
				
            ]
        );

		$this->add_control(
            'team_member_based_in_label',
            [
                'label' => __( 'Location Label', 'team-network' ),
                'type'  => Controls_Manager::TEXT,
				'default' => 'Based in'
				
            ]
        );


        $this->end_controls_section();
    }

	/**
	 * Single Member Box style Control
	 * 
	 * @return void
	 * 
	 * @since 1.0.0
	 */
	public function single_member_box_style_control(){
		$this->start_controls_section(
			'box_style',
			[
				'label' => __('Member Box', 'team-network'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'member-box-width',
			[
				'label' => esc_html__( 'Box Width', 'team-network' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 500,
				],
				'selectors' => [
					'{{WRAPPER}} .team-member-profile' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'member_box_color',
			[
				'label' => esc_html__( 'Box Color', 'team-network' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-profile' => 'background-color: {{VALUE}}',
				],
				'default' => '#ffffff'
			]
		);

		$this->add_responsive_control(
			'member_box_padding',
			[
				'label' => esc_html__( 'Box Padding', 'team-network' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .team-member-profile' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' => 30,
					'right' => 30,
					'bottom' => 30,
					'left' => 30,
					'unit' => 'px',
					'isLinked' => true,
				],
			]
		);

		$this->add_responsive_control(
			'member_box_border_radius',
			[
				'label' => esc_html__( 'Box Border Radius', 'team-network' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .team-member-profile' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'member_box_border',
				'selector' => '{{WRAPPER}} .team-member-profile',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'member_box_shadow',
				'selector' => '{{WRAPPER}} .team-member-profile',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Single member heading control
	 * 
	 * @return void
	 * 
	 * @since 1.0.0
	 */
	public function single_member_heading_style_control(){
		$this->start_controls_section(
			'member_heading',
			[
				'label' => __('Name', 'team-network'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'member_box_heading_color',
			[
				'label' => esc_html__( 'Color', 'team-network' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-profile h1.team-member-name' => 'color: {{VALUE}}',
				],
				'default' => '#111111'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_content_typography',
				'selector' => '{{WRAPPER}} .team-member-profile h1.team-member-name',
			]
		);

		$this->add_responsive_control(
			'member_box_heading_margin',
			[
				'label' => esc_html__( 'Margin', 'team-network' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .team-member-profile h1.team-member-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 10,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
			]
		);

		$this->end_controls_section();
	}

	/** 
	 * Member Excerpt style control
	 * 
	 * 
	 * @return void
	 */
	public function single_member_excerpt_style_control(){

		$this->start_controls_section(
			'member_excerpt',
			[
				'label' => __('Excerpt', 'team-network'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'member_box_excerpt_color',
			[
				'label' => esc_html__( 'Color', 'team-network' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-profile .team-member-excerpt' => 'color: {{VALUE}}',
				],
				'default' => '#6a6a6a'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_content_typography',
				'selector' => '{{WRAPPER}} .team-member-profile .team-member-excerpt',
			]
		);

		$this->add_responsive_control(
			'member_box_excerpt_margin',
			[
				'label' => esc_html__( 'Margin', 'team-network' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .team-member-profile .team-member-excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
			]
		);

		$this->end_controls_section();
	}
}
