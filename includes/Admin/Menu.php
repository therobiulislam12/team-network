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

        // Hook to save the meta box data when the post is saved
        add_action( 'save_post', array( $this, 'save_tn_user_role_meta_box' ) );
    }

    public function tn_custom_meta_boxes( $post_type ) {
        if ( 'teamnetwork' === $post_type ) {
            add_meta_box(
                'tn-role-meta-box',
                __( 'Team Member Role', 'team-network' ),
                array( $this, 'tn_user_role' ),
                'teamnetwork',
                'advanced',
                'default'
            );
        }
    }

    public function tn_user_role( $post ) {

        // Add a nonce field to authenticate later
        wp_nonce_field( 'save_tn_member_role_data', 'tn_user_role_nonce' );

        // Get the existing value from the database (if any)
        $value = get_post_meta( $post->ID, '_tn_user_role', true );

        // Code to render the meta box content goes here
        echo '<label for="tn_user_role">' . __( 'Role:', 'team-network' ) . '</label>';
        echo '<input type="text" id="tn_user_role" name="tn_user_role" value="' . esc_attr( $value ) . '" />';
    }

    // Save the meta box data
    public function save_tn_user_role_meta_box( $post_id ) {
        // Check if nonce is set
        if ( !isset( $_POST['tn_user_role_nonce'] ) ) {
            return;
        }

        // Verify nonce
        if ( !wp_verify_nonce( $_POST['tn_user_role_nonce'], 'save_tn_member_role_data' ) ) {
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

        // Sanitize user input
        $new_value = sanitize_text_field( $_POST['tn_user_role'] );

        // Update or delete the meta field in the database
        if ( !empty( $new_value ) ) {
            update_post_meta( $post_id, '_tn_user_role', $new_value );
        } else {
            delete_post_meta( $post_id, '_tn_user_role' );
        }
    }
}
