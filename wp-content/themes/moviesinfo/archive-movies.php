<?php get_header(); ?>

	<section class="post-bg">
		<div class="container">
			<div class="row">

				<div class="col-md-3">
					<?php dynamic_sidebar( 'main-left-sidebar' ); ?>
				</div>

				<div class="col-md-6">

					<?php if ( have_posts() ) : ?>
						<?php while( have_posts() ) :
							the_post();
							?>

							<h1><?php the_title(); ?></h1>
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