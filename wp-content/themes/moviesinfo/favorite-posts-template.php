<?php /* Template Name: Favorite Posts */ ?>

<?php get_header(); ?>

<section class="post-bg">
	<div class="container">
		<div class="row">

            <div class="col-md-3">
				<?php dynamic_sidebar( 'main-left-sidebar' ); ?>
            </div>

            <div class="col-md-6 fav-posts-block">
                    <h1 class="text-center"><?php the_post(); the_title(); ?></h1>
                    <?php

                        if (!get_current_user_id()) {
                            echo '<p>No favorite posts. Please register to add posts to favorites.</p>';
                        } else {
                            $fav_post_ids = $fav_posts->get_values();
//                            $fav_post_ids = [35,37];
                            foreach ($fav_post_ids as $fav_post_id) {
                                $post = get_post( $fav_post_id, 'OBJECT' );
                                ?>
                                <div class="fav-post-block">
                                <p class="left-img">
                                    <img class="post-image" src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                </p>
                                <h4><?php the_title(); ?></h4>
                                <h4 class="taxonomy-field"><?php
                                    echo implode( ', ', wp_get_post_terms( get_the_ID(), 'movie_genre', array( 'fields' => 'names' ) ) );
                                    ?>
                                </h4>
                                <?php the_excerpt();
                                echo do_shortcode( '[fav_post post_id="' . $post->ID . '" is_fav="1"]' );
                                echo '</div>';
                            }
                        }
                    ?>
			</div>

			<div class="col-md-3">
				<?php get_sidebar( 'main-right' ); ?>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>
