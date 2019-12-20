<?php


namespace Core\Rest_Api_Favorite_Posts;

class Rest_Api_Favorite_Posts extends \WP_REST_Controller {
	private $path_data;

	public function __construct() {
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
		$this->path_data = [
			'basic_endpoint_url' => get_rest_url(),
			'namespace'          => 'moviesinfo',
			'route'              => '/register'
		];
		add_action( 'wp_enqueue_scripts', [$this, 'localize_script']);
	}

	public function localize_script() {
		wp_localize_script( 'script-reg-form', 'reg_api_data', $this->path_data );
	}

	public function register_routes() {
		register_rest_route( $this->path_data['namespace'], $this->path_data['route'], [
			'methods'  => \WP_REST_Server::ALLMETHODS,
			'callback' => [ $this, 'get_items' ],
			'args'     => [
				'email'      => [
					'required',
					'validate_callback' => [ $this, 'validate_callback' ],
					'sanitize_callback' => [ $this, 'sanitize_callback' ]
				],
				'psw'        => [
					'required',
					'validate_callback' => [ $this, 'validate_callback' ],
					'sanitize_callback' => [ $this, 'sanitize_callback' ]
				],
				'psw-repeat' => [
					'required',
					'validate_callback' => [ $this, 'validate_callback' ],
					'sanitize_callback' => [ $this, 'sanitize_callback' ]
				]
			]
		] );
	}

	public function get_items( $request ) {
		$email      = $request->get_param( 'email' );
		$psw        = $request->get_param( 'psw' );
		$psw_repeat = $request->get_param( 'psw-repeat' );
		$username   = explode( '@', $email )[0];
		if ( $psw != $psw_repeat ) {
			return new \WP_Error( 'psw_mismatch', "Passwords not the same", [ 'status' => 400 ] );
		}
		$result = $this->add_user( $username, $psw, $email );
		if ( is_wp_error( $result ) ) {
			return new \WP_Error( 'login_error', "Please try another email", [ 'status' => 400 ] );
		}

		return new \WP_REST_Response( [ 'status' => $result, 'redirect_url' => '/movies' ], 200 );
	}

	private function add_user( $username, $password, $email ) {
		$username = explode( '@', $email )[0];
		$user_id  = wp_create_user( $username, $password, $email );
		if ( is_wp_error( $user_id ) ) {
			return $user_id;
		}
		$user = wp_signon( [ 'user_login' => $username, 'user_password' => $password, 'remember' => true ] );
		if ( is_wp_error( $user ) ) {
			return $user;
		}

		return true;
	}

	public function validate_callback( $param, $request, $key ) {
		if ( $key == 'email' ) {
			if ( ! ( filter_var( $param, FILTER_VALIDATE_EMAIL )
			         && preg_match( '/@.+\./', $param ) ) ) {
				return new \WP_Error( 'invalid_email', "Email is invalid", [ 'status' => 400 ] );
			}
		}
		if ( $key == 'psw' ) {
			if ( strlen( $param ) < 8 ) {
				return new \WP_Error( 'psw_length_error', "Password length is less than 8 symbols", [ 'status' => 400 ] );
			}
		}
		if ( ! isset( $param ) || $param == "" ) {
			return new \WP_Error( 'no_value_error', "No data in $key field", [ 'status' => 400 ] );
		}

		return true;
	}

	public function sanitize_callback( $param, $request, $key ) {
		$param = htmlspecialchars_decode( trim( $param ) );

		return $param;
	}
}