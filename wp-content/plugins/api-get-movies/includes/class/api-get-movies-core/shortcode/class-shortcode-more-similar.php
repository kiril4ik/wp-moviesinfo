<?php


namespace Api_Get_Movies_Core\Shortcode;

class Shortcode_More_Similar extends Basic_Shortcode {

	private $api_omdb;

	public function __construct( $tag ) {
		parent::__construct( $tag );
		$this->api_omdb = new \Api_Get_Movies_Core\Api_Omdb\Api_Omdb();
	}

	public function render( $atts ) {
		$params = shortcode_atts( [
			'search_term' => 'test',
			'posts_num'  => 3,
		], $atts );

		$this->api_omdb->set_search_term($params['search_term']);
		$movies = $this->api_omdb->getMovies($params['posts_num']);

		return require( 'shortcode-more-similar-template.php' );
	}
}
