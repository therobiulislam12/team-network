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
                __( 'Extra Information', 'team-network' ),
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

        // Role field
        echo '<label for="tn_member_role">' . __( 'Role:', 'team-network' ) . '</label>';
        echo '<input type="text" id="tn_member_role" name="tn_member_role" value="' . esc_attr( $role ) . '" /><br><br>';

        // Phone number field
        echo '<label for="tn_member_phone">' . __( 'Phone Number:', 'team-network' ) . '</label>';
        echo '<input type="text" id="tn_member_phone" name="tn_member_phone" value="' . esc_attr( $phone ) . '" /><br><br>';

        // Location field
        echo '<label for="tn_member_location">' . __( 'Location:', 'team-network' ) . '</label>';
        echo '<input type="text" id="tn_member_location" name="tn_member_location" value="' . esc_attr( $location ) . '" />';
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

        // LinkedIn field
        echo '<label for="tn_member_linkedin">' . __( 'LinkedIn URL:', 'team-network' ) . '</label>';
        echo '<input type="url" id="tn_member_linkedin" name="tn_member_linkedin" value="' . esc_attr( $linkedin ) . '" size="40" /><br><br>';

        // Facebook field
        echo '<label for="tn_member_facebook">' . __( 'Facebook URL:', 'team-network' ) . '</label>';
        echo '<input type="url" id="tn_member_facebook" name="tn_member_facebook" value="' . esc_attr( $facebook ) . '" size="40" /><br><br>';

        // GitHub field
        echo '<label for="tn_member_github">' . __( 'GitHub URL:', 'team-network' ) . '</label>';
        echo '<input type="url" id="tn_member_github" name="tn_member_github" value="' . esc_attr( $github ) . '" size="40" /><br><br>';

        // WordPress.org field
        echo '<label for="tn_member_wordpress">' . __( 'WordPress.org Profile URL:', 'team-network' ) . '</label>';
        echo '<input type="url" id="tn_member_wordpress" name="tn_member_wordpress" value="' . esc_attr( $wordpress ) . '" size="40" /><br><br>';

        // Twitter field
        echo '<label for="tn_member_twitter">' . __( 'Twitter URL:', 'team-network' ) . '</label>';
        echo '<input type="url" id="tn_member_twitter" name="tn_member_twitter" value="' . esc_attr( $twitter ) . '" size="40" />';
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
}
