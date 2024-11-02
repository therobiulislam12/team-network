<?php

/**
 * Class Menu
 * Handles menu-related actions
 *
 * @since 1.0.0
 */
class Menu {
    public function __construct() {
        // Add meta box for team member
        add_action( 'add_meta_boxes', array( $this, 'tn_custom_meta_boxes' ) );

        // Hook to save the member extra details meta box data when the post is saved
        add_action( 'save_post', array( $this, 'save_tn_member_extra_details_meta_box' ) );

        // Social media data save
        add_action( 'save_post', array( $this, 'save_tn_member_social_media_meta_box' ) );

        // enqueue scripts
        add_action( 'admin_enqueue_scripts', array( $this, 'tn_meta_box_scripts' ) );

        // plugin page link setup land on plugin menu
        add_action( 'plugin_action_links_' . plugin_basename( TN_FILE ), array( $this, 'tn_plugin_menu_option' ) );

        // admin admin menu page
        add_action('admin_menu', array($this, 'tn_general_settings_menu'));
    }

    /**
     * Add here general settings menu for customization Single Template
     * 
     * @return void
     * @since 1.0.0
     */
    public function tn_general_settings_menu(){
        add_submenu_page(
            'edit.php?post_type=teamnetwork',
            __('General Settings', 'team-network'),
            __('Customization', 'team-network'),
            'manage_options',
            'tn_general_settings',
            array($this, 'tn_general_page_settings'),
        );
    }
    public function tn_general_page_settings(){
        echo '<div class="wrap"><h1>Single Template Customization</h1></div>';
    }
    /**
     * Add custom meta boxes for the 'teamnetwork' post type
     *
     * @param mixed $post_type The post type being edited.
     * @return void
     *
     * @since 1.0.0
     */
    public function tn_custom_meta_boxes( $post_type ) {
        if ( 'teamnetwork' === $post_type ) {
            add_meta_box(
                'tn-user-extra-information',
                __( 'Member Extra Information', 'team-network' ),
                array( $this, 'tn_user_extra_information' ),
                'teamnetwork',
                'advanced',
                'default'
            );

            add_meta_box(
                'tn-social-meta-box',
                __( 'Member Social Media', 'team-network' ),
                array( $this, 'tn_social_media_meta_box_callback' ),
                'teamnetwork',
                'advanced',
                'default'
            );
        }
    }

    /**
     * Render the Extra Information meta box fields
     *
     * @param mixed $post The current post object.
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function tn_user_extra_information( $post ) {

        // Add a nonce field for security
        wp_nonce_field( 'save_tn_member_role_data', 'tn_user_role_nonce' );

        // Get existing values from post meta (if available)
        $role = get_post_meta( $post->ID, '_tn_member_role', true );
        $phone = get_post_meta( $post->ID, '_tn_member_phone', true );
        $location = get_post_meta( $post->ID, '_tn_member_location', true );

        ?>
        <div class="tn-member-extra-details">
            <div class="tn-field-wrapper">
                <div class="tn-label">
                    <label for="tn_member_role"><?php _e( 'Role / Designation:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                    <input type="text" id="tn_member_role" name="tn_member_role" value="<?php echo esc_attr( $role ); ?>" />
                </div>
            </div>
            <div class="tn-field-wrapper">
                <div class="tn-label">
                <label for="tn_member_phone"><?php _e( 'Phone Number:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                <input type="text" id="tn_member_phone" name="tn_member_phone" value="<?php echo esc_attr( $phone ); ?>" />
                </div>
            </div>
            <div class="tn-field-wrapper">
                <div class="tn-label">
                <label for="tn_member_location"><?php _e( 'Location:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                <input type="text" id="tn_member_location" name="tn_member_location" value="<?php echo esc_attr( $location ); ?>" />
                </div>
            </div>
        </div>

        <?php
}

    /**
     * Render the Social Media meta box fields
     *
     * @param mixed $post The current post object.
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function tn_social_media_meta_box_callback( $post ) {
        // Add a nonce field for security
        wp_nonce_field( 'save_tn_social_media_meta_box_data', 'tn_social_media_meta_box_nonce' );

        // Get existing values from post meta (if available)
        $linkedin = get_post_meta( $post->ID, '_tn_member_linkedin', true );
        $facebook = get_post_meta( $post->ID, '_tn_member_facebook', true );
        $github = get_post_meta( $post->ID, '_tn_member_github', true );
        $wordpress = get_post_meta( $post->ID, '_tn_member_wordpress', true );
        $twitter = get_post_meta( $post->ID, '_tn_member_twitter', true );

        ?>

        <div class="tn-member-social-media">
            <div class="tn-field-wrapper">
                <div class="tn-label">
                    <label for="tn_member_linkedin"><?php _e( 'LinkedIn URL:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                    <input type="url" id="tn_member_linkedin" name="tn_member_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" size="40" />
                </div>
            </div>

            <div class="tn-field-wrapper">
                <div class="tn-label">
                    <label for="tn_member_facebook"><?php _e( 'Facebook URL:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                    <input type="url" id="tn_member_facebook" name="tn_member_facebook" value="<?php echo esc_attr( $facebook ); ?>" size="40" />
                </div>
            </div>

            <div class="tn-field-wrapper">
                <div class="tn-label">
                    <label for="tn_member_github"><?php _e( 'GitHub URL:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                    <input type="url" id="tn_member_github" name="tn_member_github" value="<?php echo esc_attr( $github ); ?>" size="40" />
                </div>
            </div>

            <div class="tn-field-wrapper">
                <div class="tn-label">
                    <label for="tn_member_wordpress"><?php _e( 'WordPress.org Profile URL:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                    <input type="url" id="tn_member_wordpress" name="tn_member_wordpress" value="<?php echo esc_attr( $wordpress ); ?>" size="40" />
                </div>
            </div>

            <div class="tn-field-wrapper">
                <div class="tn-label">
                    <label for="tn_member_twitter"><?php _e( 'Twitter URL:', 'team-network' );?></label>
                </div>
                <div class="tn-input">
                    <input type="url" id="tn_member_twitter" name="tn_member_twitter" value="<?php echo esc_attr( $twitter ); ?>" size="40" />
                </div>
            </div>
        </div>


        <?php
}

    /**
     * Save the Extra Information meta box data
     *
     * @param int $post_id The ID of the post being saved.
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function save_tn_member_extra_details_meta_box( $post_id ) {
        // Verify nonce and return early if invalid
        if ( !isset( $_POST['tn_user_role_nonce'] ) || !wp_verify_nonce( $_POST['tn_user_role_nonce'], 'save_tn_member_role_data' ) ) {
            return;
        }

        // Check for autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check user permissions
        if ( !current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Sanitize and save the role
        if ( isset( $_POST['tn_member_role'] ) ) {
            $role = sanitize_text_field( $_POST['tn_member_role'] );
            update_post_meta( $post_id, '_tn_member_role', $role );
        }

        // Sanitize and save the phone number
        if ( isset( $_POST['tn_member_phone'] ) ) {
            $phone = sanitize_text_field( $_POST['tn_member_phone'] );
            update_post_meta( $post_id, '_tn_member_phone', $phone );
        }

        // Sanitize and save the location
        if ( isset( $_POST['tn_member_location'] ) ) {
            $location = sanitize_text_field( $_POST['tn_member_location'] );
            update_post_meta( $post_id, '_tn_member_location', $location );
        }
    }

    /**
     * Save the Social Media meta box data
     *
     * @param int $post_id The ID of the post being saved.
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function save_tn_member_social_media_meta_box( $post_id ) {
        // Verify nonce and return early if invalid
        if ( !isset( $_POST['tn_social_media_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['tn_social_media_meta_box_nonce'], 'save_tn_social_media_meta_box_data' ) ) {
            return;
        }

        // Check for autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check user permissions
        if ( !current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Save LinkedIn URL
        if ( isset( $_POST['tn_member_linkedin'] ) ) {
            update_post_meta( $post_id, '_tn_member_linkedin', esc_url_raw( $_POST['tn_member_linkedin'] ) );
        }

        // Save Facebook URL
        if ( isset( $_POST['tn_member_facebook'] ) ) {
            update_post_meta( $post_id, '_tn_member_facebook', esc_url_raw( $_POST['tn_member_facebook'] ) );
        }

        // Save GitHub URL
        if ( isset( $_POST['tn_member_github'] ) ) {
            update_post_meta( $post_id, '_tn_member_github', esc_url_raw( $_POST['tn_member_github'] ) );
        }

        // Save WordPress.org Profile URL
        if ( isset( $_POST['tn_member_wordpress'] ) ) {
            update_post_meta( $post_id, '_tn_member_wordpress', esc_url_raw( $_POST['tn_member_wordpress'] ) );
        }

        // Save Twitter URL
        if ( isset( $_POST['tn_member_twitter'] ) ) {
            update_post_meta( $post_id, '_tn_member_twitter', esc_url_raw( $_POST['tn_member_twitter'] ) );
        }
    }

    /**
     * Add script and style
     *
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function tn_meta_box_scripts() {
        wp_register_style( 'tn-main-style', TN_FILE_ASSETS . 'css/style.css' );

        wp_enqueue_style( 'tn-main-style' );
    }

    /**
     * Adds a "Settings" link to the plugin's action links on the plugins page.
     *
     * @param array $links The current plugin action links.
     * @return array Modified plugin action links with the "Settings" link added.
     *
     * @since 1.0.0
     */
    public function tn_plugin_menu_option( $links ) {
        $settings_links = array(
            sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'edit.php?post_type=teamnetwork' ), __( 'Settings', 'team-network' ) )
        );
        $links = array_merge( $settings_links, $links );
        $settings_links = array(
            sprintf( '<a href="%1$s" target="_blank" class="tn-plugin-premium">%2$s</a>', 'https://robiul.net/about', __( 'Premium', 'team-network' ) ),
        );
        $links = array_merge( $links, $settings_links );
        return $links;
    }
}
