<?php


namespace Modules\Custom_Register_Sidebar;

class Custom_Register_Sidebar {

	public function __construct() {
		add_action( 'widgets_init', [$this, 'register_sidebars'] );
	}
	public function register_sidebars() {
		$data = require( "register-sidebar-config.php" );
		foreach ($data as $item) {
			register_sidebar( $item );
		}
	}
}
