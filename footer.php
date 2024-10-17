<?php
/**
 * The template for displaying the footer
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
    <?php
    $themeSettings = pods('theme_settings');
    $footerLeftContent = $themeSettings->field('footer_content_left');
    $footerRightContent = $themeSettings->field('footer_content_right');
    $socials = pods('socials');
    $themeSettings = pods('theme_settings');
    $facebook = $socials->field('facebook');
    $twitter = $socials->field('twitter');
    $linkedin = $socials->field('linkedin');
    $instagram = $socials->field('instagram');
    $youtube = $socials->field('youtube');
    ?>

    <div class="footer-most-recent-section">
        <div class="container">
            <div class="row">
                <?php
                /*

            $most_recent = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'orderby' => 'date',
            );

            $most_recent_query = new WP_Query($most_recent);

            if ($most_recent_query->have_posts()) {
                while ($most_recent_query->have_posts()) {
                    $most_recent_query->the_post();
                    ?>
                    <div class="footer-posts-single-col">
                        <div data-aos="flip-down"
                             data-aos-duration="500"
                             data-aos-easing="ease-in"
                        >
                            <a class="single-post-tile single-post-tile-medium variant2"
                               href="<?php echo get_permalink(); ?>">
                                <div class="single-post-tile-inner"
                                     style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
                                </div>
                                <div class="post-tile-title-container">
                                    <h3 class="post-tile-title"><?php //echo get_the_title(); ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_postdata();
          */ ?>
            </div>
        </div>
    </div>
    <?php

    ?>

    <div class="footer-bg">
        <div class="container">
            <div class="row footer-row">
                <div class="footer-content-left-container">
                    <div class="footer-logo-container">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>
                    </div>
                    <?php if ($footerLeftContent) {
                        echo wpautop($footerLeftContent, true);
                    } ?>
                </div>
                <div class="footer-horizontal-space"></div>
                <div class="footer-content-right-container">
                    <?php
                    include('parts/socials.php');
                    ?>
                    <div class="footer-right-top-section">
                        <?php if ($footerLeftContent) {
                            echo wpautop($footerRightContent, true);
                        } ?>

                        <div class="footer-decoration"></div>
                    </div>

                    <?php
                    wp_nav_menu(
                        [
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-menu',
                        ]
                    );
                    ?>
                    <?php
                    wp_nav_menu(
                        [
                            'theme_location' => 'footer_secondary',
                            'menu_class' => 'footer-secondary-menu',
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>

    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
