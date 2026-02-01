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
                                        <h3 class="post-tile-title"><?php echo get_the_title(); ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>

    <div class="footer-bg">
        <div class="container">
            <div class="row footer-row">
                <div class="footer-content-left-container">
                    <div class="footer-logo-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" alt="Logo"/>
                    </div>
                    <?php if ($footerLeftContent) {
                        echo wpautop($footerLeftContent, true);
                    } ?>
                </div>
                <div class="footer-horizontal-space"></div>
                <div class="footer-content-right-container">
<!--                    --><?php
//                    include('parts/socials.php');
//                    ?>
                    <div class="footer-right-top-section">
                        <div class="one-half">
                            <div class="footer-bottom-branch">
                                <p>
                                    Tel:
                                    <strong>
                                        <br><a href="tel:+421911112442">+421 911 112 442</a>
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="one-half">
                            <div class="footer-bottom-branch second">
                                <p>
                                    Socials:
                                    <br>
                                    <strong>
                                        <a href="https://www.ecoportal.site" target="_blank">fb: ecoportal.site</a>
                                        <br>
                                        <a href="https://www.ecoportal.site" target="_blank">insta: ecoportal.site</a>
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="one-half">
                            <div class="footer-bottom-branch third">
                                <p>
                                    Adresa:
                                    <br>
                                    <strong>
                                        Business centrum Chmelová
                                        <br>
                                        Chmeľová dolina 27, Nitra
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="one-half">
                            <div class="footer-bottom-branch third">
                                <p>
                                    Friends:
                                    <br>
                                    <strong>
                                        <a target="_blank" href="https://www.krr.sk">www.krr.sk</a>                               
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="one-half">
                            <div class="footer-bottom-branch third">
                                <p>
                                    Email:
                                    <br>
                                    <strong><a href="mailto:info@eco-portal.site">info@eco-portal.site</a></strong>
                                    <br>
                                    <strong><a href="mailto:obchod@eco-portal.site">obchod@eco-portal.site</a></strong>
                                </p>
                            </div>
                        </div>
                        <div class="one-half">
                            <div class="footer-bottom-branch third">
                                <p>
                                    <strong>
                                        <a href="http://www.ecoportal.site/">STARÝ ECOPORTAL</a>
                                    <strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="footer-right-bottom-section">
                        <?php if ($footerRightContent) {
                            echo wpautop($footerRightContent, true);
                        } ?>
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
