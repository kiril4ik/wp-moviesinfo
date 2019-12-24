<?php get_header(); ?>

    <section class="post-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
					<?php dynamic_sidebar( 'main-left-sidebar' ); ?>
                </div>

                <div class="col-md-6 posts-archive-block">

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) :
							the_post();
							?>
                            <div class="post-block">
                                <p class="left-img">
                                    <img class="post-image" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                </p>
                                <h1><?php the_title(); ?></h1>
                                <h4 class="taxonomy-field"><?php
									echo implode( ', ', wp_get_post_terms( get_the_ID(), 'movie_genre', array( 'fields' => 'names' ) ) );
									?>
                                </h4>
								<?php the_excerpt();
								echo do_shortcode( '[fav_post post_id="' . $post->ID . '" ]' ); ?>
                            </div> <?php
						endwhile; ?>
					<?php endif; ?>

                </div>

                <div class="col-md-3">
					<?php get_sidebar( 'main-right' ); ?>
                </div>

            </div>
        </div>
    </section>

<?php get_footer(); ?>