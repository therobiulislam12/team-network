<?php
// Get header
get_header();

// Start the loop
echo '<section class="tn-single-member-view">';
if (have_posts()) :
    while (have_posts()) : the_post(); 

    // post meta
    $live = get_post_meta(get_the_ID(), '_tn_member_location', true);
    $phone = get_post_meta(get_the_ID(), '_tn_member_phone', true);
    $role = get_post_meta(get_the_ID(), '_tn_member_role', true);

     if (get_post_type() == 'teamnetwork') { ?>
        <div class="team-member-profile">
            <?php echo get_the_post_thumbnail(); ?>
            <h1><?php the_title();  ?></h1>
            <div class="team-member-content">
                <p><?php the_excerpt();  ?></p>
                <?php 

                if($role){
                    echo '<p><strong>Job Title: </strong>' . esc_html($role) . '</p>';
                }

                if($phone){
                    echo '<p><strong>Phone: </strong>' . esc_html($phone) . '</p>';
                }
                if($live){
                    echo '<p><strong>Based in: </strong>' . esc_html($live) . '</p>';
                }

                ?>
            </div>
        </div>
    <?php } endwhile;
endif;

echo '</section>';

// Get footer
get_footer();
