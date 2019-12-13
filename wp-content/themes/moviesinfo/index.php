<?php get_header(); ?>

<section class="post_blog_bg primary-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="col-md-8">

                    <?php if ( have_posts() ) : ?>
                        <?php while( have_posts() ) : the_post();

		                    the_content();

                        endwhile; ?>
                    <?php endif; ?>

				</div>


				<!--Sidebar here-->
				<?php get_sidebar(); ?>


			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
