<?php ob_start(); ?>
	<h1>Top <?=$params['posts_num']?> posts</h1>
	<ul class="list-group">
<?php foreach ( $posts_array as $post ) { ?>
	<li class="list-group-item">
	<h3><?=$post->post_title?></h3>
	<p><?=get_the_excerpt($post)?></p>
    <?php echo do_shortcode( '[fav_post post_id="'. $post->ID .'" ]' );
//        if (get_post_type( $post ) == 'movies') {
//	      echo do_shortcode( '[more_similar search_term="' . $post->post_title . '" posts_num  = 3 ]' );
//		}
        ?>
	</li>
<?php } ?>
	</ul>
<?php return ob_get_clean();