<?php

echo $before_widget;
if ( ! empty( $title ) ) {
	echo $before_title . $title . $after_title;
}
$output .= '<ul class="list-group">';
foreach ( $posts_array as $post ) { ?>
	<li class="list-group-item">
        <h5><?php echo $post->post_title; ?></h5>
        <p><?php get_the_excerpt($post); ?></p>
	</li>
<?php }
echo '</ul>';
echo $after_widget;