<?php

/**
 * Main Post Column Added Class
 */
class TN_Columns {

    /**
     * Plugin main constructor
     */
    public function __construct() {

        // column added filter
        add_filter( 'manage_teamnetwork_posts_columns', array( $this, 'tn_custom_post_columns' ), 10, 1 );

        // added custom field value
        add_action( 'manage_teamnetwork_posts_custom_column', array( $this, 'tn_added_custom_value_on_custom_column' ), 10, 2 );

        // custom column sortable
        add_action('manage_edit-teamnetwork_sortable_columns', array($this, 'tn_custom_column_sortable'), 10, 1);
    }

    /**
     * Custom Post column call back
     *
     * @return array
     *
     * @since 1.0.0
     */
    public function tn_custom_post_columns( $columns ) {

        $new_columns = [];

        foreach ( $columns as $key => $column ) {
            if ( 'title' == $key ) {
                $new_columns[$key] = $column;
                $new_columns['job-title'] = 'Job Title';
                continue;
            }

            $new_columns[$key] = $column;
        }

        return $new_columns;
    }

    /**
     * Added custom value on my created custom field
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function tn_added_custom_value_on_custom_column($column_name, $post_id) {
        $job_title = get_post_meta($post_id, '_tn_member_role', true);

        if('job-title' === $column_name){
            echo $job_title;
        }
    }

    /**
     * Make your column sortable
     * 
     * @param array $sortable_columns
     * @return array
     * 
     * @since 1.0.0
     */
    public function tn_custom_column_sortable($sortable_columns){

        $sortable_columns['job-title'] = 'job-title';
        $sortable_columns['taxonomy-department'] = 'taxonomy-department';
        
        return $sortable_columns;
    }
}