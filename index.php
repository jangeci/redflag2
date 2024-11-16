<?php
/**
 * The template for blog
 */
get_header(); ?>
    <main id="main" class="site-main">
        <section id="primary" class="content-area">

            <div id="page-content">
	            <?php
	            if(is_front_page()){
		            ?>
                    <h1 hidden="true">Solarmajster</h1>
		            <?php
	            }
	            ?>
				<?php
				if ( is_home() ) {
					$id           = get_the_id();
					$current_page = get_queried_object();
					$content      = apply_filters( 'the_content', $current_page->post_content );
					?>
                    <div class="container">
						<?php echo $content; ?>
                    </div>
                    <div class="vertical-space40"></div>
                    <div class="container medium-width-content">
                        <div class="vertical-space40"></div>
                        <div>
                            <div class="row">
								<?php
								while ( have_posts() ) :
									the_post();
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
					<?php
				} else {
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						?>
                        <div class="container">
							<?php
							the_content();
							?>
                        </div>
					<?php
					endwhile;
				}
				?>
        </section>
    </main>
<?php
get_footer();