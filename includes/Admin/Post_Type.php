<?php

class Post_Type {

    /**
     * Register custom post type
     *
     * @return void
     * @since 1.0.0
     */
    public function team_network_post_type() {

        $labels = array(
            'name'                  => _x( 'Team Network', 'Post Type General Name', 'team-network' ),
            'singular_name'         => _x( 'Team Network', 'Post Type Singular Name', 'team-network' ),
            'menu_name'             => __( 'Team Network', 'team-network' ),
            'name_admin_bar'        => __( 'Member', 'team-network' ),
            'archives'              => __( 'Team Archives', 'team-network' ),
            'attributes'            => __( 'Team Attributes', 'team-network' ),
            'parent_item_colon'     => __( 'Parent Team:', 'team-network' ),
            'all_items'             => __( 'All Members', 'team-network' ),
            'add_new_item'          => __( 'Add New Member', 'team-network' ),
            'add_new'               => __( 'Add New Member', 'team-network' ),
            'new_item'              => __( 'New Member', 'team-network' ),
            'edit_item'             => __( 'Edit Member', 'team-network' ),
            'update_item'           => __( 'Update Member', 'team-network' ),
            'view_item'             => __( 'View Member', 'team-network' ),
            'view_items'            => __( 'View Teams', 'team-network' ),
            'search_items'          => __( 'Search Member', 'team-network' ),
            'not_found'             => __( 'Not found Team Member', 'team-network' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'team-network' ),
            'featured_image'        => __( 'Team Member Image', 'team-network' ),
            'set_featured_image'    => __( 'Set team member Image', 'team-network' ),
            'remove_featured_image' => __( 'Remove team member image', 'team-network' ),
            'use_featured_image'    => __( 'Use as team member image', 'team-network' ),
            'insert_into_item'      => __( 'Insert into member', 'team-network' ),
            'uploaded_to_this_item' => __( 'Uploaded to this member', 'team-network' ),
            'items_list'            => __( 'Teams list', 'team-network' ),
            'items_list_navigation' => __( 'Teams list navigation', 'team-network' ),
            'filter_items_list'     => __( 'Filter team members list', 'team-network' ),
        );
        $args = array(
            'label'               => __( 'Team Network', 'team-network' ),
            'description'         => __( 'Manage your team member with custom post type', 'team-network' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', 'excerpt' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 20,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'taxonomies'          => array( 'department' ),
            'rewrite'             => array( 'slug' => 'team' ),
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'menu_icon'           => 'dashicons-groups',
            'show_in_rest'        => true,
            'rest_base'           => 'team-network',
        );
        register_post_type( 'teamnetwork', $args );
    }

    /**
     * Add here department category for teamnetwork post type
     * 
     * 
     * @return void
     * @since 1.0.0
     */
    public function tn_department_category() {

        $labels = array(
            'name'                       => _x( 'Team Department', 'Taxonomy General Name', 'team-network' ),
            'singular_name'              => _x( 'Team Department', 'Taxonomy Singular Name', 'team-network' ),
            'menu_name'                  => __( 'Team Department', 'team-network' ),
            'all_items'                  => __( 'All Department', 'team-network' ),
            'parent_item'                => __( 'Parent Department', 'team-network' ),
            'parent_item_colon'          => __( 'Parent Department:', 'team-network' ),
            'new_item_name'              => __( 'New Department Name', 'team-network' ),
            'add_new_item'               => __( 'Add New Department', 'team-network' ),
            'edit_item'                  => __( 'Edit Department', 'team-network' ),
            'update_item'                => __( 'Update Department', 'team-network' ),
            'view_item'                  => __( 'View Department', 'team-network' ),
            'separate_items_with_commas' => __( 'Separate department with commas', 'team-network' ),
            'add_or_remove_items'        => __( 'Add or remove department', 'team-network' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'team-network' ),
            'popular_items'              => __( 'Popular Department', 'team-network' ),
            'search_items'               => __( 'Search Department', 'team-network' ),
            'not_found'                  => __( 'Department Not Found', 'team-network' ),
            'no_terms'                   => __( 'No Department', 'team-network' ),
            'items_list'                 => __( 'Department list', 'team-network' ),
            'items_list_navigation'      => __( 'Department list navigation', 'team-network' ),
        );
        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => false,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
        );
        register_taxonomy( 'department', array( 'teamnetwork' ), $args );

    }
}