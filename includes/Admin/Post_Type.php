<?php

class Post_Type {

    /**
     * Register custom post type
     *
     * @return void
     * @since 1.0.0
     */
    public function team_network_post_type() {

        $menu_icon = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiB4PSIwIiB5PSIwIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PHBhdGggZD0iTTQ4MC42ODIgMzE5LjYzM3YtMzIuMzE1aC0xNDguOTdjMCA0MS44MTQtMzMuODk3IDc1LjcxMi03NS43MTIgNzUuNzEycy03NS43MTItMzMuODk3LTc1LjcxMi03NS43MTJIMzEuMzE4djMyLjMxNWw2NC42ODggNi44NWExNjMuNyAxNjMuNyAwIDAgMCAxOS4xNzcgNDYuMjYybC00MC45MDggNTAuNTk3IDQ1LjcwMSA0NS43MDEgNTAuNTk3LTQwLjkwOGExNjMuNyAxNjMuNyAwIDAgMCA0Ni4yNjIgMTkuMTc3bDYuODUgNjQuNjg4aDY0LjYzbDYuODUtNjQuNjg4YTE2My43IDE2My43IDAgMCAwIDQ2LjI2Mi0xOS4xNzdsNTAuNTk3IDQwLjkwOCA0NS43MDEtNDUuNzAxLTQwLjkwOC01MC41OTdhMTYzLjcgMTYzLjcgMCAwIDAgMTkuMTc3LTQ2LjI2Mmw2NC42ODgtNi44NXpNMjU2IDBjLTMxLjk5OSAwLTU4LjAzMyAyNi4wMzQtNTguMDMzIDU4LjAzMyAwIDMxLjk5OSAyNi4wMzQgNTguMDMyIDU4LjAzMyA1OC4wMzIgMzEuOTk5IDAgNTguMDMzLTI2LjAzMyA1OC4wMzMtNTguMDMyQzMxNC4wMzMgMjYuMDM0IDI4Ny45OTkgMCAyNTYgMHpNMzE3Ljc4NyAxMzIuMTA5SDE5NC4yMTNjLTI4LjQ0OS4wMDEtNTEuNTk0IDIzLjE0NS01MS41OTQgNTEuNTk0djczLjYxNGgyMjYuNzYydi03My42MTRjMC0yOC40NDktMjMuMTQ1LTUxLjU5NC01MS41OTQtNTEuNTk0ek0xMzIuODg3IDI2LjgwOGMtMjguNjY2IDAtNTEuOTg3IDIzLjMyMi01MS45ODcgNTEuOTg3IDAgMjguNDM1IDIyLjk1MSA1MS41OTggNTEuMyA1MS45NjkgMTEuNzQtMTMuNzMyIDI3LjkzOS0yMy41MzMgNDYuMzQzLTI3LjEyOGE1MS42NjYgNTEuNjY2IDAgMCAwIDYuMzMxLTI0Ljg0MWMwLTI4LjY2Ni0yMy4zMjEtNTEuOTg3LTUxLjk4Ny01MS45ODd6TTc3LjUzNyAxNDUuMTU0Yy0yNS40ODUgMC00Ni4yMTkgMjAuNzMzLTQ2LjIxOSA0Ni4yMTl2NjUuOTQ1aDgxLjMwMXYtNzMuNjE1YTgxLjA3OCA4MS4wNzggMCAwIDEgOS43MDMtMzguNTQ5SDc3LjUzN3pNMzc5LjExMyAyNi44MDhjLTI4LjY2NiAwLTUxLjk4NyAyMy4zMjItNTEuOTg3IDUxLjk4N2E1MS42NjkgNTEuNjY5IDAgMCAwIDYuMzMgMjQuODQxYzE4LjQwNSAzLjU5NSAzNC42MDQgMTMuMzk2IDQ2LjM0NCAyNy4xMjggMjguMzQ5LS4zNyA1MS4zLTIzLjUzNCA1MS4zLTUxLjk2OSAwLTI4LjY2Ni0yMy4zMjEtNTEuOTg3LTUxLjk4Ny01MS45ODd6TTQzNC40NjMgMTQ1LjE1NGgtNDQuNzg1YTgxLjA3OCA4MS4wNzggMCAwIDEgOS43MDMgMzguNTQ5djczLjYxNGg4MS4zMDF2LTY1Ljk0NWMwLTI1LjQ4NS0yMC43MzQtNDYuMjE4LTQ2LjIxOS00Ni4yMTh6IiBmaWxsPSIjZmZmZmZmIiBvcGFjaXR5PSIxIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIj48L3BhdGg+PC9nPjwvc3ZnPg==';

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
            // 'menu_icon'           => 'dashicons-groups',
            'menu_icon'           => $menu_icon,
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