<?php

echo $before_widget;
?>
<?php
if ( ! empty( $title ) ) {
	echo $before_title . $title . $after_title;
} ?>
    <p id="widget-sort-by">
        Sort by views
        <span id="widget-sort-asc" class="widget-sort-by glyphicon glyphicon-arrow-down"></span>
        <span id="widget-sort-desc" class="widget-sort-by glyphicon glyphicon-arrow-up"></span>
    </p>
<?php
echo '<ul class="list-group">';
foreach ( $posts_array as $post ) { ?>
	<li class="list-group-item">
        <h5><?php echo $post->post_title; ?></h5>
        <p><?php get_the_excerpt($post); ?></p>
	</li>
<?php }
echo '</ul>';
//echo '<script>';
//require( 'send-request.js' );
//echo '</script>';
echo $after_widget;