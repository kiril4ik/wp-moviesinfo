<?php
	$output = "<h1>Top {$params['posts_num']} posts</h1>";
	$output .= '<ul class="list-group">';
foreach ( $posts_array as $post ) {
	$output .= '<li class="list-group-item">';
	$output .= "<h3>{$post->post_title}</h3>";
	$output .= '<p>'.get_the_excerpt($post).'</p>';
	$output .= "</li>";
}
	$output .= '</ul>';

	return $output;