<?php

require_once( ABSPATH . "wp-content/themes/moviesinfo/includes/class/core/class-autoloader.php" );
$class_autoloader = new \Core\Class_Autoloader();

new \Modules\Theme_Setup\Theme_Setup();

new \Modules\Enqueue_Scripts_Styles\Enqueue_Scripts_Styles();

//Register new post types: Movies, TV Series, Celebs, Awards
new \Modules\Custom_Register_Post_Type\Custom_Register_Post_Type();

new \Modules\Metabox\Custom_Metabox( 'movie_release_year', 'Release Year', 'movies' );
new \Modules\Metabox\Custom_Metabox( 'celebs_birth_year', 'Birth Year', 'celebs' );

//Add genre taxonomy for movies and type taxonomy for awards
new \Modules\Custom_Register_Taxonomy\Custom_Register_Taxonomy();

//Sidebars register
new \Modules\Custom_Register_Sidebar\Custom_Register_Sidebar();

//Add settings to Customizer
new \Modules\Customize_Register\Customize_Register();

new \Modules\Shortcode\Shortcode_Top_X_Posts( 'top_x_posts' );

new \Widgets\Movies_By_Category\Movies_By_Category_Widget();

