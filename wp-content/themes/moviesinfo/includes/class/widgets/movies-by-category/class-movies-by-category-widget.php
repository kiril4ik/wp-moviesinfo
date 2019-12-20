<?php


namespace Widgets\Movies_By_Category;

class Movies_By_Category_Widget extends \WP_Widget {

	public $current_instance = [];
	static private $is_get_filtered_template_started;

	public function __construct() {
		parent::__construct(
			'movies_by_category_widget',
			'Movies by category',
			[ 'description' => __( 'Top films from different genres' ) ]
		);

		add_action( 'widgets_init', [ $this, 'register_the_widget' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'add_script' ] );
		add_action( 'wp_ajax_sort_widget_category', [ $this, 'get_filtered_template' ] );
		add_action( 'wp_ajax_nopriv_sort_widget_category', [ $this, 'get_filtered_template' ] );
	}

	public function register_the_widget() {
		register_widget( __CLASS__ );
	}

	public function add_script() {
		wp_enqueue_script( 'send_request', get_template_directory_uri() . '/assets/js/send-request.js' );
		wp_localize_script( 'send_request', 'ajaxurl', [ 'ajaxurl' => admin_url( 'admin-ajax.php' ) ] );
	}


	/**
	 * @return null
	 */
	public function get_filtered_template() {
		if ( $this::$is_get_filtered_template_started ) {
			return false;
		}
		$this::$is_get_filtered_template_started = true;
		$sort_order                              = $_REQUEST['sort_order'];
		$get_current_id                          = $_REQUEST['the_id'];
		$get_current_id                          = explode( '-', $get_current_id );
		$get_current_id                          = $get_current_id[ count( $get_current_id ) - 1 ];
		$category                                = get_option( 'widget_movies_by_category_widget' )[ $get_current_id ]['category'];

		$posts_array = get_posts( [
			'posts_per_page' => 5,
			'paged'          => 1,
			'orderby'        => 'meta_value_num',
			'order'          => $sort_order,
			'post_type'      => [ 'movies' ],
			'tax_query'      => [
				[
					'taxonomy'         => 'movie_genre',
					'field'            => 'name',
					'terms'            => $category,
					'include_children' => false
				]
			]
		] );
		foreach ( $posts_array as $post ) {
			?>
            <li class="list-group-item">
                <h5><?php echo $post->post_title; ?></h5>
                <p><?php get_the_excerpt( $post ); ?></p>
            </li>
			<?php
		}
		wp_die();
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title      = apply_filters( 'widget_title', $instance['title'] );
		$category   = $instance['category'];
		$sort_order = $instance['sort_order'];

		$posts_array = get_posts( [
			'posts_per_page' => 5,
			'paged'          => 1,
			'orderby'        => 'meta_value_num',
			'order'          => $sort_order,
			'post_type'      => [ 'movies' ],
			'tax_query'      => [
				[
					'taxonomy'         => 'movie_genre',
					'field'            => 'name',
					'terms'            => $category,
					'include_children' => false
				]
			]
		] );

		require( 'widget-template.php' );

	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = '';
		}
		if ( isset( $instance['category'] ) ) {
			$category = $instance['category'];
		} else {
			$category = null;
		}
		if ( isset( $instance['sort_order'] ) ) {
			$sort_order = $instance['sort_order'];
		} else {
			$sort_order = null;
		}

		require( 'form-template.php' );
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @see WP_Widget::update()
	 *
	 */
	public function update( $new_instance, $old_instance ) {
		$instance               = [];
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['category']   = ( ! empty( $new_instance['category'] ) ) ? strip_tags( $new_instance['category'] ) : '';
		$instance['sort_order'] = ( ! empty( $new_instance['sort_order'] ) ) ? strip_tags( $new_instance['sort_order'] ) : '';

		return $instance;
	}

}