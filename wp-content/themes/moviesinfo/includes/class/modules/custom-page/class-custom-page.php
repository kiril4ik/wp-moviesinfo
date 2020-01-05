<?php


namespace Modules\Custom_Page;

class Custom_Page {

	public $is_logged_in;

	public function __construct() {
		$this->is_logged_in =  wp_get_current_user();
		add_action( 'init', [ $this, 'add_rewrite_rule' ] );
		add_filter( 'query_vars', [ $this, 'add_query_var' ] );
		add_action( 'parse_query', [ $this, 'render_file_content' ] );
	}

	function add_rewrite_rule() {
		add_rewrite_rule( '^secret-page/?$', 'index.php?secret_page=yes', 'top' );
	}

	function add_query_var( $qvars ) {
		$qvars[] = 'secret_page';

		return $qvars;
	}

	function render_file_content() {
//		var_dump(get_query_var( 'secret_page' ));
		$secret_page = get_query_var( 'secret_page' );
		if ( $secret_page == 'yes' && user_can( $this->is_logged_in, 'administrator' )) {
			header( "Content-type: application/pdf" );
			header( "Content-Disposition: inline; filename=filename.pdf" );
			include( ABSPATH . "wp-content/uploads/pdf/guide.pdf" );
			die();
		}
	}
}