<?php


namespace Modules\Customize_Register;

class Customize_Register {

	public function __construct() {
		add_action( 'customize_register', [$this, 'customize_register'] );
	}
	public function customize_register() {
		$data = require( "customize-register-config.php" );
		global $wp_customize;
		foreach ($data as $item) {
			$wp_customize->{$item[0]}( $item[1], $item[2] );
		}
	}
}