<?php get_header(); ?>

<section class="post-bg">
	<div class="container">
		<div class="row">

			<div class="col-md-9">

                <?php if ( have_posts() ) : ?>
					<?php while( have_posts() ) :
                        the_post();
					?>
					    <h1><?php the_title(); ?></h1>
                        <h4 class="taxonomy-field"><?php
                            echo implode (', ',wp_get_post_terms( get_the_ID(), 'movie_genre', array('fields' => 'names')));
                            ?>
                        </h4>
                        <?php if (isset($post->movie_release_year) && $post->movie_release_year != "") { ?>
                        <p><b>
                            <?php
                            echo "Release year: ".$post->movie_release_year;
                            ?>
                        </b></p>
                        <?php } ?>
						<img class="post-image" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
					<?php the_content();

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
