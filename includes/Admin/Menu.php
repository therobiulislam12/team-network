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
        add_action( 'add_meta_boxes', array($this, 'tn_custom_meta_boxes') );
    }

    public function tn_custom_meta_boxes( $post_type ) {
        if ( 'teamnetwork' === $post_type ) {
            add_meta_box(
                'tn-role-meta-box',
                __( 'Team Member Role', 'team-network' ),
                array($this, 'tn_user_role'),
                'teamnetwork',
                'advanced',
                'default'
            );
        }
    }

    public function tn_user_role( $post ) {
        // Code to render the meta box content goes here
        echo '<label for="tn_user_role">';
        _e( 'Role', 'team-network' );
        echo '</label> ';
        echo '<input type="text" id="tn_user_role" name="tn_user_role" value="" />';
    }
}
