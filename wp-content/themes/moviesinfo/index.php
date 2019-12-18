<?php get_header(); ?>

<section class="frontpage-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
				<?php dynamic_sidebar( 'main-left-sidebar' ); ?>
            </div>


            <div class="col-md-6">

                <?php echo do_shortcode( '[top_x_posts posts_num="3" sort_order="ASC"]' ); ?>


            </div>

            <div class="col-md-3">
				<?php get_sidebar( 'main-right' ); ?>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
