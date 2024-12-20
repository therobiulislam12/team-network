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
        $linkedInUrl = get_post_meta( get_the_ID(), '_tn_member_linkedin', true );
        $facebookUrl = get_post_meta( get_the_ID(), '_tn_member_facebook', true );
        $githubUrl = get_post_meta( get_the_ID(), '_tn_member_github', true );
        $wordpressUrl = get_post_meta( get_the_ID(), '_tn_member_wordpress', true );
        $twitterUrl = get_post_meta( get_the_ID(), '_tn_member_twitter', true );

        if ( get_post_type() == 'teamnetwork' ) {?>
            <div class="team-member-profile">
                <div class="team-member-headshot">
                <?php echo get_the_post_thumbnail(); ?>
                </div>
                <h1 class="team-member-name"><?php the_title();?></h1>
                <div class="team-member-content">
                    <?php the_excerpt();?>
                    <div class="team-member-extra-info">
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

                <style>
                    .team-member-profile .team-social-media svg{
                        fill: #000000;
                        width: 26px;
                        height: 26px;
                    }
                    .team-member-profile .team-social-media ul li:hover svg{
                        fill: #A02334;
                    }
                </style>

                <div class="team-social-media">
                    <ul>
                        <?php if($linkedInUrl) :  ?>
                            <li>
                                <a href="<?php echo $linkedInUrl ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="512" height="512"><g><path id="Path_2525" d="M23.002,21.584h0.227l-0.435-0.658l0,0c0.266,0,0.407-0.169,0.409-0.376c0-0.008,0-0.017-0.001-0.025   c0-0.282-0.17-0.417-0.519-0.417h-0.564v1.476h0.212v-0.643h0.261L23.002,21.584z M22.577,20.774h-0.246v-0.499h0.312   c0.161,0,0.345,0.026,0.345,0.237c0,0.242-0.186,0.262-0.412,0.262"/><path id="Path_2520" d="M17.291,19.073h-3.007v-4.709c0-1.123-0.02-2.568-1.564-2.568c-1.566,0-1.806,1.223-1.806,2.487v4.79H7.908   V9.389h2.887v1.323h0.04c0.589-1.006,1.683-1.607,2.848-1.564c3.048,0,3.609,2.005,3.609,4.612L17.291,19.073z M4.515,8.065   c-0.964,0-1.745-0.781-1.745-1.745c0-0.964,0.781-1.745,1.745-1.745c0.964,0,1.745,0.781,1.745,1.745   C6.26,7.284,5.479,8.065,4.515,8.065L4.515,8.065 M6.018,19.073h-3.01V9.389h3.01V19.073z M18.79,1.783H1.497   C0.68,1.774,0.01,2.429,0,3.246V20.61c0.01,0.818,0.68,1.473,1.497,1.464H18.79c0.819,0.01,1.492-0.645,1.503-1.464V3.245   c-0.012-0.819-0.685-1.474-1.503-1.463"/><path id="Path_2526" d="M22.603,19.451c-0.764,0.007-1.378,0.633-1.37,1.397c0.007,0.764,0.633,1.378,1.397,1.37   c0.764-0.007,1.378-0.633,1.37-1.397c-0.007-0.754-0.617-1.363-1.37-1.37H22.603 M22.635,22.059   c-0.67,0.011-1.254-0.522-1.265-1.192c-0.011-0.67,0.523-1.222,1.193-1.233c0.67-0.011,1.222,0.523,1.233,1.193   c0,0.007,0,0.013,0,0.02C23.81,21.502,23.29,22.045,22.635,22.059h-0.031"/></g></svg>
                                </a>
                            </li>
                        <?php endif;  ?>
                        
                        <?php if($facebookUrl) :  ?>
                            <li>
                                <a href="<?php echo $facebookUrl ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="32" height="32"><g><path d="M24,12.073c0,5.989-4.394,10.954-10.13,11.855v-8.363h2.789l0.531-3.46H13.87V9.86c0-0.947,0.464-1.869,1.95-1.869h1.509   V5.045c0,0-1.37-0.234-2.679-0.234c-2.734,0-4.52,1.657-4.52,4.656v2.637H7.091v3.46h3.039v8.363C4.395,23.025,0,18.061,0,12.073   c0-6.627,5.373-12,12-12S24,5.445,24,12.073z"/></g></svg>
                                </a>
                            </li>
                        <?php endif;  ?>

                        <?php if($wordpressUrl) :  ?>
                            <li>
                                <a href="<?php echo $wordpressUrl ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="512" height="512">
                                <g id="W_Mark_2_"><path d="M12,0.72c1.523,0,3,0.298,4.39,0.886c2.671,1.13,4.874,3.333,6.003,6.003C22.982,9,23.28,10.477,23.28,12   s-0.298,3-0.886,4.39c-1.116,2.639-3.35,4.881-6.003,6.003C15,22.982,13.523,23.28,12,23.28c-1.523,0-3-0.298-4.39-0.886   c-2.638-1.116-4.881-3.351-6.003-6.003C1.018,15,0.72,13.523,0.72,12c0-1.523,0.298-3,0.886-4.39   C2.736,4.939,4.94,2.735,7.61,1.606C9,1.018,10.477,0.72,12,0.72 M12,0C5.373,0,0,5.373,0,12c0,6.627,5.373,12,12,12   s12-5.373,12-12C24,5.373,18.627,0,12,0L12,0z"/><path d="M2,12c0,3.958,2.3,7.379,5.636,9L2.866,7.93C2.311,9.174,2,10.55,2,12z M18.751,11.495c0-1.236-0.444-2.092-0.824-2.758   c-0.507-0.824-0.982-1.521-0.982-2.345c0-0.919,0.697-1.775,1.679-1.775c0.044,0,0.086,0.005,0.129,0.008   C16.974,2.995,14.603,2,12,2C8.506,2,5.433,3.793,3.645,6.507C3.88,6.515,4.101,6.519,4.288,6.519c1.046,0,2.665-0.127,2.665-0.127   c0.539-0.032,0.602,0.76,0.064,0.824c0,0-0.542,0.063-1.144,0.095l3.641,10.832l2.189-6.563l-1.558-4.269   C9.607,7.28,9.096,7.216,9.096,7.216C8.557,7.184,8.621,6.361,9.16,6.392c0,0,1.651,0.127,2.634,0.127   c1.046,0,2.666-0.127,2.666-0.127c0.539-0.032,0.602,0.76,0.064,0.824c0,0-0.542,0.063-1.144,0.095l3.614,10.749l1.032-3.269   C18.482,13.363,18.751,12.351,18.751,11.495z M12.176,12.874l-3.001,8.718C10.071,21.856,11.018,22,12,22   c1.164,0,2.282-0.201,3.321-0.567c-0.027-0.043-0.051-0.088-0.072-0.138L12.176,12.874z M20.775,7.202   c0.043,0.318,0.067,0.66,0.067,1.028c0,1.014-0.19,2.155-0.761,3.582l-3.054,8.831C20.001,18.91,22,15.689,22,12   C22,10.261,21.556,8.627,20.775,7.202z"/></g></svg>
                                </a>
                            </li>
                        <?php endif;  ?>

                        <?php if($githubUrl) :  ?>
                            <li>
                                <a href="<?php echo $githubUrl ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="512" height="512"><g><path style="fill-rule:evenodd;clip-rule:evenodd;" d="M12,0.296c-6.627,0-12,5.372-12,12c0,5.302,3.438,9.8,8.206,11.387   c0.6,0.111,0.82-0.26,0.82-0.577c0-0.286-0.011-1.231-0.016-2.234c-3.338,0.726-4.043-1.416-4.043-1.416   C4.421,18.069,3.635,17.7,3.635,17.7c-1.089-0.745,0.082-0.729,0.082-0.729c1.205,0.085,1.839,1.237,1.839,1.237   c1.07,1.834,2.807,1.304,3.492,0.997C9.156,18.429,9.467,17.9,9.81,17.6c-2.665-0.303-5.467-1.332-5.467-5.93   c0-1.31,0.469-2.381,1.237-3.221C5.455,8.146,5.044,6.926,5.696,5.273c0,0,1.008-0.322,3.301,1.23   C9.954,6.237,10.98,6.104,12,6.099c1.02,0.005,2.047,0.138,3.006,0.404c2.29-1.553,3.297-1.23,3.297-1.23   c0.653,1.653,0.242,2.873,0.118,3.176c0.769,0.84,1.235,1.911,1.235,3.221c0,4.609-2.807,5.624-5.479,5.921   c0.43,0.372,0.814,1.103,0.814,2.222c0,1.606-0.014,2.898-0.014,3.293c0,0.319,0.216,0.694,0.824,0.576   c4.766-1.589,8.2-6.085,8.2-11.385C24,5.669,18.627,0.296,12,0.296z"/><path d="M4.545,17.526c-0.026,0.06-0.12,0.078-0.206,0.037c-0.087-0.039-0.136-0.121-0.108-0.18   c0.026-0.061,0.12-0.078,0.207-0.037C4.525,17.384,4.575,17.466,4.545,17.526L4.545,17.526z"/><path d="M5.031,18.068c-0.057,0.053-0.169,0.028-0.245-0.055c-0.079-0.084-0.093-0.196-0.035-0.249   c0.059-0.053,0.167-0.028,0.246,0.056C5.076,17.903,5.091,18.014,5.031,18.068L5.031,18.068z"/><path d="M5.504,18.759c-0.074,0.051-0.194,0.003-0.268-0.103c-0.074-0.107-0.074-0.235,0.002-0.286   c0.074-0.051,0.193-0.005,0.268,0.101C5.579,18.579,5.579,18.707,5.504,18.759L5.504,18.759z"/><path d="M6.152,19.427c-0.066,0.073-0.206,0.053-0.308-0.046c-0.105-0.097-0.134-0.234-0.068-0.307   c0.067-0.073,0.208-0.052,0.311,0.046C6.191,19.217,6.222,19.355,6.152,19.427L6.152,19.427z"/><path d="M7.047,19.814c-0.029,0.094-0.164,0.137-0.3,0.097C6.611,19.87,6.522,19.76,6.55,19.665   c0.028-0.095,0.164-0.139,0.301-0.096C6.986,19.609,7.075,19.719,7.047,19.814L7.047,19.814z"/><path d="M8.029,19.886c0.003,0.099-0.112,0.181-0.255,0.183c-0.143,0.003-0.26-0.077-0.261-0.174c0-0.1,0.113-0.181,0.256-0.184   C7.912,19.708,8.029,19.788,8.029,19.886L8.029,19.886z"/><path d="M8.943,19.731c0.017,0.096-0.082,0.196-0.224,0.222c-0.139,0.026-0.268-0.034-0.286-0.13   c-0.017-0.099,0.084-0.198,0.223-0.224C8.797,19.574,8.925,19.632,8.943,19.731L8.943,19.731z"/></g></svg>
                                </a>
                            </li>
                        <?php endif;  ?>

                        <?php if($twitterUrl) :  ?>
                            <li>
                                <a href="<?php echo $twitterUrl ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="512" height="512"><path id="Logo_00000038394049246713568260000012923108920998390947_" d="M21.543,7.104c0.014,0.211,0.014,0.423,0.014,0.636  c0,6.507-4.954,14.01-14.01,14.01v-0.004C4.872,21.75,2.252,20.984,0,19.539c0.389,0.047,0.78,0.07,1.172,0.071  c2.218,0.002,4.372-0.742,6.115-2.112c-2.107-0.04-3.955-1.414-4.6-3.42c0.738,0.142,1.498,0.113,2.223-0.084  c-2.298-0.464-3.95-2.483-3.95-4.827c0-0.021,0-0.042,0-0.062c0.685,0.382,1.451,0.593,2.235,0.616  C1.031,8.276,0.363,5.398,1.67,3.148c2.5,3.076,6.189,4.946,10.148,5.145c-0.397-1.71,0.146-3.502,1.424-4.705  c1.983-1.865,5.102-1.769,6.967,0.214c1.103-0.217,2.16-0.622,3.127-1.195c-0.368,1.14-1.137,2.108-2.165,2.724  C22.148,5.214,23.101,4.953,24,4.555C23.339,5.544,22.507,6.407,21.543,7.104z"/></svg>
                                </a>
                            </li>
                        <?php endif;  ?>
                    </ul>
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