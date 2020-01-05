<?php


namespace Modules\Custom_Rewrite_Rule;

class Custom_Rewrite_Rule {

	public function __construct() {
		add_action( 'init', [ $this, 'add_rewrite_rule' ] );
		add_filter( 'query_vars', [ $this, 'add_query_var'] );
	}

	function add_rewrite_rule() {
		add_rewrite_rule( '^movies/genre-([^/]+)/?$', 'index.php?post_type=movies&taxonomy_filter=$matches[1]', 'top' );
	}
	function add_query_var($qvars) {
		$qvars[] = 'taxonomy_filter';
		return $qvars;
	}
}