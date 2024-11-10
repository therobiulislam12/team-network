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
        return __( 'Single Team Grid', 'team-network' );
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
        return ['tn-team-grid-style-1', 'tn-team-grid-style-2'];
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

        $this->tn_team_grid_style_1_content_control();
        $this->tn_team_member_social_icon_content_control();

        $this->tn_team_box_style_control();
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
        
        $selected_department_slug = $settings['tn-team-department-select'];
        $grid_style = $settings['tn-team-grid-style'];

        $total_members = get_posts(array(
            'post_type' => 'teamnetwork',
            'tax_query' => array(
                array(
                    'taxonomy' => 'department',
                    'field'    => 'slug',
                    'terms'    => $selected_department_slug,
                )
            )
        ));

        ?>
            <div class="team-network-team-grid-1-section">
                <?php 
                    if(!empty($total_members)): 
                        foreach($total_members as $member) :
                            $jib_title = get_post_meta( $member->ID, '_tn_member_role', true );
                            $facebookUrl = get_post_meta( $member->ID, '_tn_member_facebook', true );
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($member->ID), 'large'); 
                            $linkedInUrl = get_post_meta( $member->ID, '_tn_member_linkedin', true );
                            $githubUrl = get_post_meta( $member->ID, '_tn_member_github', true );
                            $wordpressUrl = get_post_meta( $member->ID, '_tn_member_wordpress', true );
                            $twitterUrl = get_post_meta( $member->ID, '_tn_member_twitter', true );
                ?>
                    <?php if('style-1' === $grid_style):  ?>
                    <div class="tn-team-item">
                        <div class="tn-team-member tn-left tn-position-top">
                            <div class="tn-team-member-thumb">
                                <img src="<?php echo esc_url($thumb[0]) ?>" alt="<?php echo esc_attr($member->post_title); ?>">
                            </div>
                            <div class="tn-team-member-content">
                                <h3 class="tn-team-member-name">
                                    <?php echo esc_html__($member->post_title, 'team-network')?>
                                </h3>
                                <span class="tn-team-member-designation"><?php echo esc_html__($jib_title, 'team-network')?> </span>
                                <div class="tn-team-member-about">
                                    <?php echo esc_html__($member->post_excerpt, 'team-network'); ?>
                                </div>
                                <ul class="list-inline tn-team-member-social">
                                    <?php if($facebookUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $facebookUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-facebook-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($linkedInUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $linkedInUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-linkedin-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($githubUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $githubUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-github-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($twitterUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $twitterUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-twitter-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($wordpressUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $wordpressUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-wordpress-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php elseif('style-2' === $grid_style): ?>
                        <div class="tnad-team-item">
                            <div class="tnad-team-member tnad-center tnad-position-top">
                            <div class="tnad-team-member-thumb">
                                <img src="<?php echo esc_url($thumb[0]) ?>" alt="<?php echo esc_attr($member->post_title); ?>">
                            </div>
                            <div class="tnad-team-member-content">
                                <h3 class="tnad-team-member-name"> <?php echo esc_html__($member->post_title, 'team-network')?> </h3>
                                <span class="tnad-team-member-designation"> <?php echo esc_html__($jib_title, 'team-network')?> </span>
                                <div class="tnad-team-member-about"> <?php echo esc_html__($member->post_excerpt, 'team-network'); ?> </div>
                                <ul class="tnad-team-member-social">
                                <?php if($facebookUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $facebookUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-facebook-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($linkedInUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $linkedInUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-linkedin-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($githubUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $githubUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-github-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($twitterUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $twitterUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-twitter-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                    
                                    <?php if($wordpressUrl) :  ?>
                                        <li>
                                            <a href="<?php echo $wordpressUrl ?>" target="_blank" class="tn-social-icon">
                                                <i aria-hidden="true" class="<?php echo esc_attr($settings['tn-member-wordpress-icon']['value']) ?>"></i> 
                                            </a>
                                        </li>
                                    <?php endif;  ?>
                                </li>
                                </ul>
                            </div>
                            </div>
                        </div>

                <?php endif; endforeach; endif; ?>
            </div>

		    <?php
        }

    /**
     * Department control
     * 
     * @return void
     */
    protected function tn_team_grid_style_1_content_control(){

        $terms = get_terms(array(
            'taxonomy' => 'department',
            'hide_empty' => true
        ));
        
        $all_teams = [];
        $default_value = '';
        
        foreach ($terms as $term) {
            $all_teams[$term->slug] = $term->name;
        }
        
        if (!empty($terms)) {
            $default_value = $terms[1]->slug;
        }

        $this->start_controls_section(
            'section_depart_content',
            [
                'label' => __( 'Department', 'team-network' ),
            ]
        );

        $this->add_control(
            'tn-team-grid-style',
            [
                'label'     => esc_html__( 'Team Grid Style', 'team-network' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    'style-1' => esc_html__( 'Style 1', 'team-network' ),
                    'style-2' => esc_html__( 'Style 2', 'team-network' ),
                    'style-3' => esc_html__( 'Style 3', 'team-network' ),
                ],
                'default'   => 'style-1',
            ]
        );

        $this->add_control(
            'tn-team-department-select',
            [
                'label'     => esc_html__( 'Choose Department', 'team-network' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => $all_teams,
                'default' => $default_value
            ]
        );

        $this->add_responsive_control(
			'tn-team-member-columns',
			[
				'label' => esc_html__( 'Team Columns', 'team-network' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 3,
                'selectors' => [
                    '{{WRAPPER}} .team-network-team-grid-1-section' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ],
            
		);

        $this->add_responsive_control(
			'tn-team-member-columns-gap',
			[
				'label' => esc_html__( 'Gap', 'team-network' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .team-network-team-grid-1-section' => 'gap: {{VALUE}}px;',
                ],
            ],
            
		);

        $this->end_controls_section();
    }

    /**
     * Box Style Control
     */
    protected function tn_team_box_style_control(){
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
     * 
     * Social Icon Set Control
     * 
     * @return void
     */
    public function tn_team_member_social_icon_content_control(){
        $this->start_controls_section(
            'section_social_icons',
            [
                'label' => __( 'Social Icons', 'team-network' ),
            ]
        ); 

        $this->add_control(
			'tn-member-facebook-icon',
			[
				'label' => esc_html__( 'Facebook Icon', 'team-network' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brand',
				]
			]
		);

        $this->add_control(
			'tn-member-linkedin-icon',
			[
				'label' => esc_html__( 'LinkedIn Icon', 'team-network' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-linkedin',
					'library' => 'fa-brand',
				]
			]
		);
        
        $this->add_control(
			'tn-member-github-icon',
			[
				'label' => esc_html__( 'Github Icon', 'team-network' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-github',
					'library' => 'fa-brand',
				]
			]
		);
        
        $this->add_control(
			'tn-member-twitter-icon',
			[
				'label' => esc_html__( 'Twitter Icon', 'team-network' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-brand',
				]
			]
		);
        
        $this->add_control(
			'tn-member-wordpress-icon',
			[
				'label' => esc_html__( 'WordPress Icon', 'team-network' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-wordpress',
					'library' => 'fa-brand',
				]
			]
		);

        $this->end_controls_section();
    }
}
