<?php


namespace Api_Get_Movies_Core\Shortcode;

abstract class Basic_Shortcode {

	abstract function render( $atts );

	public function __construct( $tag ) {
		add_shortcode( $tag, [ $this, 'render' ] );
	}
}
