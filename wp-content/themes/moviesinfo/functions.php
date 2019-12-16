<?php

require_once(ABSPATH."wp-content/themes/moviesinfo/includes/class/Core/Class_Autoloader.php");
$class_autoloader = new \Core\Class_Autoloader();

$meta_movie_release_year = new \Core\Custom_Metabox( 'movie_release_year', 'Release Year', 'movies' );
$meta_celebs_birth_year = new \Core\Custom_Metabox( 'celebs_birth_year', 'Birth Year', 'celebs' );

add_action('after_setup_theme', 'moviesinfo_setup');
function moviesinfo_setup() {
	load_theme_textdomain('moviesinfo');

	add_theme_support('tittle-tag', get_template_directory() . "/lang");

	add_theme_support('custom-logo', array(
		'height' => 40,
		'width' => 40,
		'flex' => true
	));

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(730,446);

	add_theme_support('html5', array(
		'search_form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'));

	add_theme_support('post-formats', array(
		'aside',
		'image',
		'video',
		'gallery'
	));

	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
		)
	);

}

//Register new post types: Movies, TV Series, Celebs, Awards
add_action( 'init', 'register_post_types' );
function register_post_types() {
	register_post_type('movies', array(
		'label'  => null,
		'labels' => array(
			'name'               => __('Movies'), // основное название для типа записи
			'singular_name'      => __('Movie'), // название для одной записи этого типа
		),
		'description'         => __('Movies list with detailed description can be fond here'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-video-alt',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','comments','revisions','page-attributes' ],
		'taxonomies'          => [],
		'has_archive'         => 'movies',
		'rewrite'             => true,
		'query_var'           => true,
	) );
	register_post_type('series', array(
		'label'  => null,
		'labels' => array(
			'name'               => __('TV Series'), // основное название для типа записи
			'singular_name'      => __('TV Series'), // название для одной записи этого типа
		),
		'description'         => __('Here is best TV series category'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-view-site',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','comments','revisions','page-attributes' ],
		'taxonomies'          => [],
		'has_archive'         => 'series',
		'rewrite'             => true,
		'query_var'           => true,
	) );
	register_post_type('celebs', array(
		'label'  => null,
		'labels' => array(
			'name'               => __('Celebrities'), // основное название для типа записи
			'singular_name'      => __('Celebrity'), // название для одной записи этого типа
		),
		'description'         => __('The most popular selebrities category'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-groups',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','comments','revisions','page-attributes' ],
		'taxonomies'          => [],
		'has_archive'         => 'celebs',
		'rewrite'             => true,
		'query_var'           => true,
	) );
	register_post_type('awards', array(
		'label'  => null,
		'labels' => array(
			'name'               => __('Awards'), // основное название для типа записи
			'singular_name'      => __('Award'), // название для одной записи этого типа
		),
		'description'         => __('Oskar awards and many others'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-awards',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','comments','revisions','page-attributes' ],
		'taxonomies'          => [],
		'has_archive'         => 'awards',
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

//Include scripts and styles to head section
add_action( 'wp_enqueue_scripts', 'moviesinfo_scripts' );
function moviesinfo_scripts() {
	wp_enqueue_style( 'style-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'script-main-styles', get_template_directory_uri() . '/css/main.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'script-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js' );
}

//Add settings to Customizer
add_action( 'customize_register', 'moviesinfo_customize_register' );
function moviesinfo_customize_register( $wp_customize ) {

	//All our sections, settings, and controls will be added here
	$wp_customize->add_section( 'footer_section' , array(
		'title'      => __( 'Footer settings', 'moviesinfo' ),
		'priority'   => 31,
	) );
	$wp_customize->add_setting( 'footer_copy' , array(
		'default'   => __( 'Copyright 2019', 'moviesinfo'),
		'transport' => 'refresh',
	) );
	$wp_customize->add_control(
		'footer_copy',
		array(
			'label'    => __('Footer text', 'moviesinfo' ),
			'section'  => 'footer_section',
			'settings' => 'footer_copy',
			'type'     => 'textarea',
		)
	);
}

add_action( 'widgets_init', 'moviesinfo_register_sidebars' );
function moviesinfo_register_sidebars() {
	register_sidebar(
		array(
			'id'            => 'main-left-sidebar',
			'name'          => __('Left Sidebar' ),
			'description'   => __('The lastest films is here' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'main-right-sidebar',
			'name'          => __('Right Sidebar' ),
			'description'   => __('The lastest films is here' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-sidebar',
			'name'          => __('Footer Sidebar' ),
			'description'   => __('Info categories' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}

//Add genre taxonomy for movies
add_action( 'init', 'moviesinfo_taxonomy_movie_genre' );
function moviesinfo_taxonomy_movie_genre(){
	register_taxonomy( 'movie_genre', [ 'movies' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Genres',
			'singular_name'     => 'Genre'
		],
		'description'           => '', // описание таксономии
		'public'                => true,

		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
	] );
}
//Add type taxonomy for awards (eg Oskar, Golden globe...)
add_action( 'init', 'moviesinfo_taxonomy_awards_type' );
function moviesinfo_taxonomy_awards_type(){
	register_taxonomy( 'awards_type', [ 'awards' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Types',
			'singular_name'     => 'Type'
		],
		'description'           => '', // описание таксономии
		'public'                => true,

		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
	] );
}


