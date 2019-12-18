<?php


namespace Modules\Theme_Setup;

class Theme_Setup {

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );
	}

	public function theme_setup() {
		$data = require( 'theme-setup-config.php' );
		foreach ( $data['add_theme_support'] as $item ) {
			if ( ! isset( $item[1] ) ) {
				add_theme_support( $item[0] );
			} else {
				add_theme_support( $item[0], $item[1] );
			}
		}
		load_theme_textdomain( $data['load_theme_textdomain'] );
		set_post_thumbnail_size( $data['set_post_thumbnail_size'][0], $data['set_post_thumbnail_size'][1] );
	}
}
