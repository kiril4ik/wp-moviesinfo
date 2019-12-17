<?php


namespace Modules\Custom_Register_Post_Type;

class Custom_Register_Post_Type {

	public function __construct() {
		add_action( 'init', [$this, 'register_post_types'] );
	}
	public function register_post_types() {
		$data = require( "post-types-config.php" );
		foreach ($data as $item) {
			register_post_type( $item[0], $item[1]);
		}
	}
}
