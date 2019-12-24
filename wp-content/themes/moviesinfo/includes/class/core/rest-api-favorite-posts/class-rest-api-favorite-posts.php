<?php

namespace Core\Rest_Api_Favorite_Posts;

class Rest_Api_Favorite_Posts extends \WP_REST_Controller {
	private $path_data;
	private $fav_posts;

	public function __construct() {
		$this->fav_posts = new \Modules\Usermeta\Fav_Posts_Usermeta();
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
		$this->path_data = [
			'basic_endpoint_url' => get_rest_url(),
			'namespace'          => 'moviesinfo',
			'route_modify'       => '/modify-fav-posts',
			'route_get'          => '/get-fav-posts'
		];
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'script-modify-fav-posts', get_template_directory_uri() . '/assets/js/modify-fav-posts.js');
		wp_localize_script( 'script-modify-fav-posts', 'fav_posts_settings', ['wp_nonce_field' => wp_create_nonce('wp_rest'), 'path_data' => $this->path_data] );
	}


	public function register_routes() {
		register_rest_route( $this->path_data['namespace'], $this->path_data['route_modify'], [
			'methods'  => \WP_REST_Server::ALLMETHODS,
			'callback' => [ $this, 'modify_items' ],
			'args'     => [
				'post_id' => [
					'required',
					'validate_callback' => [ $this, 'validate_callback' ],
					'sanitize_callback' => [ $this, 'sanitize_callback' ]
				],
				'is_fav' => [
					'required',
					'validate_callback' => [ $this, 'validate_callback' ],
					'sanitize_callback' => [ $this, 'sanitize_callback' ]
				]
			]
		] );
	}

	public function get_items( $request ) {
	}

	public function modify_items( $request ) {
		global $fav_posts;
		$post_id      = $request->get_param( 'post_id' );
		$is_fav      = $request->get_param( 'is_fav' ) === 'true'? true: false;
		$cur_user_id = get_current_user_id();
//		echo $cur_user_id;
		if (!$cur_user_id) {
			return new \WP_Error( 'no_logged_in_user', "Please login", [ 'status' => 500 ] );
		}
		if ($is_fav) {
			$result = $this->fav_posts->add_value($post_id);
		} else {
			$result = $this->fav_posts->remove_value($post_id);
		}
		if($result) {
			return new \WP_REST_Response( [ 'status' => 'OK' ], 200 );
		} else {
			return new \WP_Error( 'favorite_modify_error', "Please try one more time", [ 'status' => 500 ] );
		}

	}

	public function validate_callback( $param, $request, $key ) {
		if (intval($param) != $param) {
			return false;
		}
		return true;
	}

	public function sanitize_callback( $param, $request, $key ) {
		$param = htmlspecialchars_decode( trim( $param ) );

		return $param;
	}
}