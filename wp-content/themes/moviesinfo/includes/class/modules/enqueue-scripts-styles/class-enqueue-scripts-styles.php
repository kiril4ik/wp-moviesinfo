<?php


namespace Modules\Enqueue_Scripts_Styles;

class Enqueue_Scripts_Styles {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
	}
	public function enqueue_scripts() {
		$data = require( "enqueue-scripts-styles-config.php" );
		foreach ($data as $item) {
			call_user_func($item[0], $item[1], $item[2]);
		}
	}
}