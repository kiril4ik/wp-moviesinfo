<?php

function moviesinfo_setup() {
	load_theme_textdomain('moviesinfo');

	add_theme_support('tittle-tag', get_template_directory() . "/lang");

	add_theme_support('custom-logo', array(
		'height' => 31,
		'width' => 134,
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

add_action('after_setup_theme', 'moviesinfo_setup');

//Register new post types: Movies, TV Series, Celebs, Awards
add_action( 'init', 'register_post_types' );
function register_post_types() {
	register_post_type('movies', array(
		'label'  => null,
		'labels' => array(
			'name'               => esc_html__('Movies'), // основное название для типа записи
			'singular_name'      => esc_html__('Movie'), // название для одной записи этого типа
		),
		'description'         => esc_html__('Movies list with detailed description can be fond here'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-video-alt',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','custom-fields','comments','revisions','page-attributes' ],
		'taxonomies'          => [],
		'has_archive'         => 'movies',
		'rewrite'             => true,
		'query_var'           => true,
	) );
	register_post_type('series', array(
		'label'  => null,
		'labels' => array(
			'name'               => esc_html__('TV Series'), // основное название для типа записи
			'singular_name'      => esc_html__('TV Series'), // название для одной записи этого типа
		),
		'description'         => esc_html__('Here is best TV series category'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-view-site',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','custom-fields','comments','revisions','page-attributes' ],
		'taxonomies'          => [],
		'has_archive'         => 'series',
		'rewrite'             => true,
		'query_var'           => true,
	) );
	register_post_type('celebs', array(
		'label'  => null,
		'labels' => array(
			'name'               => esc_html__('Celebrities'), // основное название для типа записи
			'singular_name'      => esc_html__('Celebrity'), // название для одной записи этого типа
		),
		'description'         => esc_html__('The most popular selebrities category'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-groups',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','custom-fields','comments','revisions','page-attributes' ],
		'taxonomies'          => [],
		'has_archive'         => 'celebs',
		'rewrite'             => true,
		'query_var'           => true,
	) );
	register_post_type('awards', array(
		'label'  => null,
		'labels' => array(
			'name'               => esc_html__('Awards'), // основное название для типа записи
			'singular_name'      => esc_html__('Award'), // название для одной записи этого типа
		),
		'description'         => esc_html__('Oskar awards and many others'),
		'public'              => true,
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-awards',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author','thumbnail','custom-fields','comments','revisions','page-attributes' ],
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

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'script-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js' );
}

//Add settings to Customizer
function moviesinfo_customize_register( $wp_customize ) {

	//All our sections, settings, and controls will be added here
	$wp_customize->add_section( 'footer_section' , array(
		'title'      => __( 'Footer settings', 'moviesinfo' ),
		'priority'   => 31,
	) );
	$wp_customize->add_setting( 'footer_copy' , array(
		'default'   => __('Copyright 2019', 'moviesinfo'),
		'transport' => 'refresh',
	) );
	$wp_customize->add_control(
		'footer_copy',
		array(
			'label'    => __( 'Footer text', 'moviesinfo' ),
			'section'  => 'footer_section',
			'settings' => 'footer_copy',
			'type'     => 'textarea',
		)
	);
}
add_action( 'customize_register', 'moviesinfo_customize_register' );


