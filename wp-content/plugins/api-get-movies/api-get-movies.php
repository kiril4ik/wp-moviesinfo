<?php
/**
 * @package Api_Get_Movies
 * @version 1.0
 */
/*
Plugin Name: Api GetMovies
Plugin URI: http://wordpress.org/plugins/api-get-movies/
Description: Get from API and saves to cache some movies
Author: Kyrylo Bustkyi
Version: 1.0
*/

//API key: fdd96480
//OMDb API: http://www.omdbapi.com/?i=tt3896198&apikey=fdd96480

if ( ! function_exists( 'curl_version' ) ) {
	add_action( 'admin_notices', 'api_get_movies_plugin_notice' );
	function api_get_movies_plugin_notice() {
		?>
        <div class="notice notice-error is-dismissible">
            <p>Plugin Api Get Movies requires curl!</p>
        </div>
		<?php
	}

} else {
	require_once( ABSPATH . "wp-content/plugins/api-get-movies/includes/class/api-get-movies-core/class-autoloader.php" );
	new \Api_Get_Movies_Core\Class_Autoloader();
	new \Api_Get_Movies_Core\Customize_Register\Customize_Register();
	new \Api_Get_Movies_Core\Shortcode\Shortcode_More_Similar( 'more_similar' );
}

add_filter( 'get_the_excerpt', 'the_excerpt_add_filter', 10, 2 );
add_filter('get_the_excerpt', 'do_shortcode', 11);

function the_excerpt_add_filter( $excerpt, $post ){
	if (get_post_type( $post ) == 'movies') {
		return $excerpt . '<br>[more_similar search_term="' . $post->post_title . '" posts_num  = 3 ]';
	} else {
		return $excerpt;
    }
}



