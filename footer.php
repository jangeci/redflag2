<?php
/**
 * The template for displaying the footer
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
    <?php
    $themeSettings = pods('theme_settings');
    $footerLeftContent = $themeSettings->field('footer_left_content');
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
        <div class="footer-bg-top">
            <div class="container">

            </div>
        </div>

        <div class="footer-bottom-content">
            <div class="container">
                <div class="row">
                    <div class="footer-content-left-container">
                        <div class="left-background"></div>
                        <div class="footer-content-left-inner">
                            <?php if ($footerLeftContent) {
                                echo wpautop($footerLeftContent, true);
                            } ?>
                        </div>
                    </div>
                    <div class="footer-content-right-container">
                        <div class="footer-right-top-section">
                            <div class="footer-top-branch first">

                            </div>
                        </div>
                    </div>
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
