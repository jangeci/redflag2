<?php
/*
Template Name: Search Page
*/
?>
<?php
get_header(); ?>

    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="vertical-space40"></div>
                <div class="container medium-width-content">
                    <p>Výsledky vyhľadávania pre: <strong><?php echo get_search_query(); ?></strong></p>
                    <div class="vertical-space40"></div>
                    <div>
						<?php
						global $wp_query;
						if ( $wp_query->found_posts == 0 ) {
							?>
                            <p class="search-no-results-message">Pre zadaný výraz neboli nájdené žiadne výsledky.</p>
							<?php
						}
						?>
                        <div class="row">
							<?php
							while ( have_posts() ) : the_post();
								?>
                                <div class="blog-single-item col">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <div class="blog-single-item-inner">
                                            <div class="blog-item-img"
                                                 style='background-image: url("<?php echo get_the_post_thumbnail_url( get_the_id(), 'postThumbnail' ); ?>")'>
                                            </div>
                                        </div>
                                        <h2> <?php
											echo the_title();
											?></h2>
										<?php if ( has_excerpt() ) {
											?>
                                            <p><?php echo get_the_excerpt() ?></p>
											<?php
										} ?>
                                    </a>
                                </div>
							<?php
							endwhile;
							?>
                            <div class="pagination-container col">
                                <div class="nav-previous alignleft"><?php previous_posts_link( '<-' ); ?></div>
                                <div class="nav-next alignright"><?php next_posts_link( '->' ); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-space40"></div>
            </main>
        </div>
    </div>

<?php get_footer();