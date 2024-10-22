<?php
// Get header
if ( function_exists( 'wp_is_block_theme' ) && wp_is_block_theme() ) {
    // Use template parts for block themes
    wp_head();
} else {
    // Use traditional get_header for classic themes
    get_header();
}

// Start the loop
echo '<section class="tn-single-member-view">';
if ( have_posts() ):
    while ( have_posts() ): the_post();

        // post meta
        $live = get_post_meta( get_the_ID(), '_tn_member_location', true );
        $phone = get_post_meta( get_the_ID(), '_tn_member_phone', true );
        $role = get_post_meta( get_the_ID(), '_tn_member_role', true );

        if ( get_post_type() == 'teamnetwork' ) {?>
				        <div class="team-member-profile">
				            <div class="team-member-headshot">
				            <?php echo get_the_post_thumbnail(); ?>
				            </div>
				            <h1 class="team-member-name"><?php the_title();?></h1>
				            <div class="team-member-content">
				                <p><?php the_excerpt();?></p>
				                <?php

            if ( $role ) {
                echo '<p><strong>Job Title: </strong>' . esc_html( $role ) . '</p>';
            }

            if ( $phone ) {
                echo '<p><strong>Phone: </strong>' . esc_html( $phone ) . '</p>';
            }
            if ( $live ) {
                echo '<p><strong>Based in: </strong>' . esc_html( $live ) . '</p>';
            }

            ?>
				            </div>
				        </div>
				    <?php }
    endwhile;
endif;

echo '</section>';

// Check if the current theme is a block-based theme
if ( function_exists( 'wp_is_block_theme' ) && wp_is_block_theme() ) {
    // Use template parts for block themes
    wp_footer();
} else {
    // Use traditional get_footer for classic themes
    get_footer();
}