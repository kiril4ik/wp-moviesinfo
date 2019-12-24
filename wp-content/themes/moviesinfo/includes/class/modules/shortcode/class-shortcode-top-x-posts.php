<?php


namespace Modules\Shortcode;

class Shortcode_Top_X_Posts extends Basic_Shortcode {

	public function render( $atts ) {
		$params = shortcode_atts( [
			'posts_num'  => 3,
			'sort_order' => 'DESC',
		], $atts );

		$posts_array = get_posts( [
			"posts_per_page" => $params['posts_num'],
			"paged"          => 1,
			"orderby"        => "meta_value_num",
			"order"          => $params['sort_order'],
			"post_type"      => [ 'movies', 'series', 'celebs', 'awards' ]
		] );

		return require( 'shortcode-top-x-posts-template.php' );
	}
}
