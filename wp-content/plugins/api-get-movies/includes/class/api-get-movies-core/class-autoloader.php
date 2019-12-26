<?php


namespace Api_Get_Movies_Core;

/*
 * Autoload classes
 */

class Class_Autoloader {

	/**
	 * Path to the includes directory.
	 *
	 * @var string
	 */
	private $include_path = '';

	/**
	 * The Constructor.
	 */
	public function __construct() {
		if ( function_exists( '__autoload' ) ) {
			spl_autoload_register( '__autoload' );
		}

		spl_autoload_register( array( $this, 'autoload' ) );

		$this->include_path = ABSPATH . "wp-content/plugins/api-get-movies/includes/class/";

	}

	/**
	 * Include a class file.
	 *
	 * @param string $path File path.
	 *
	 * @return bool Successful or not.
	 */
	private function load_file( $path ) {
		if ( $path && is_readable( $path ) ) {
			include_once $path;

			return true;
		}

		return false;
	}

	/**
	 * Auto-load classes on demand to reduce memory consumption.
	 *
	 * @param string $class Class name.
	 */
	public function autoload( $class ) {

		$class = strtolower( $class );
		$class = str_replace( "_", "-", $class );
		$class = str_replace( "\\", "/", $class );
		$arr = explode ( '/', $class );
		$arr[count($arr)-1] = 'class-' . $arr[count($arr)-1];
		$file = implode( "/", $arr ) . '.php';

		$this->load_file( $this->include_path . $file );

	}
}