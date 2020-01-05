<?php


namespace Api_Get_Movies_Core\Api_Omdb;

class Api_Omdb {
	private $post_fields = [];

	public function __construct() {
		$this->post_fields ['apikey'] = get_option( 'api_key_setting' );
	}

	public function set_search_term( $s ) {
		$this->post_fields ['s'] = $s;
	}

	/**
	 * Getting and returning array with $number movies search results
	 *
	 * @param integer $number
	 *
	 * @return array
	 */
	public function getMovies( $number ) {
		$movies_all = $this->check_transient();
		$movies     = [];
		$n          = 0;
		foreach ( $movies_all as $movie ) {
			$movies[] = $movie;
			$n ++;
			if ( $n >= $number ) {
				break;
			}
		}

		$a = $movies;
		return $movies;
	}

	private function check_transient() {
		$search_result = get_transient( 'search_result_' . $this->post_fields ['s'] );

		if ( $search_result === false ) {
			$search_result = $this->getData();
			set_transient( 'search_result_' . $this->post_fields ['s'], $search_result, 12 * HOUR_IN_SECONDS );
		}
		return $search_result;
	}

	/**
	 * Getting data from url. Returning result as array.
	 *
	 * @return array
	 */
	private function getData() {
		$query_str = http_build_query( $this->post_fields );
		$ch        = curl_init( "http://www.omdbapi.com/?$query_str" );
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$list = curl_exec( $ch );
		if ( curl_errno( $ch ) ) {
			echo curl_error( $ch );
			curl_close( $ch );
			exit ();
		}
		curl_close( $ch );

		return json_decode( $list )->Search;
	}

}