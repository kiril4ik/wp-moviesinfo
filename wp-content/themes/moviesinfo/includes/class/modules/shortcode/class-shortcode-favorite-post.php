<?php


namespace Modules\Shortcode;

class Shortcode_Favorite_Post extends Basic_Shortcode {

	private $fav_posts;
	public function __construct( $tag ) {
		parent::__construct( $tag );
		$this->fav_posts = new \Modules\Usermeta\Fav_Posts_Usermeta();
	}

	public function render( $atts ) {
		$params = shortcode_atts( [
			'post_id'  => 'false'
		], $atts );

		$is_fav = $this->fav_posts->is_fav( $params['post_id'] );


		return require( 'shortcode-favorite-post-template.php' );
	}
}
