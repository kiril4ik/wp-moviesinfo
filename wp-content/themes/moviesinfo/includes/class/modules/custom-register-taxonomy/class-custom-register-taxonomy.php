<?php


namespace Modules\Custom_Register_Taxonomy;

class Custom_Register_Taxonomy {

	public function __construct() {
		add_action( 'init', [$this, 'register_post_types'] );
	}
	public function register_post_types() {
		$data = require( "taxonomy-config.php" );
		foreach ($data as $item) {
			register_taxonomy( $item[0], $item[1], $item[2]);
		}
	}
}