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

require_once( ABSPATH . "wp-content/plugins/api-get-movies/includes/class/api-get-movies-core/class-autoloader.php");
new \Api_Get_Movies_Core\Class_Autoloader();
new \Api_Get_Movies_Core\Customize_Register\Customize_Register();
new \Api_Get_Movies_Core\Shortcode\Shortcode_More_Similar( 'more_similar' );




