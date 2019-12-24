<?php

namespace Modules\Usermeta;
class Fav_Posts_Usermeta {

	private $user_id;
	private $key;
	private $fav_posts_id;

	public function __construct( $user_id = false, $key = 'fav_posts' ) {
		if ( $user_id ) {
			$this->user_id = $user_id;
		} else {
			$this->user_id = get_current_user_id();
		}
		$this->key = $key;
		if ( $this->user_id ) {
			$this->fav_posts_id = get_user_meta( $this->user_id, $this->key );

			return true;
		} else {
			$this->fav_posts_id = false;

			return false;
		}
	}

	public function add_value( $value ) {
		if ( $this->get_values() ) {
			foreach ( $this->get_values() as $item_value ) {
				if ( $item_value == $value ) {
					return true;
				}
			}
		}

		return add_user_meta( $this->user_id, $this->key, $value );
	}

	public function remove_value( $value ) {
		return delete_user_meta( $this->user_id, $this->key, $value );
	}

	public function get_values() {
		return $this->fav_posts_id;
	}

	public function is_fav( $post_id ) {
		if ($this->get_values()) {
			foreach ( $this->get_values() as $post ) {
				if ( $post == $post_id ) {
					return true;
				}
			}
		}

		return false;
	}
}