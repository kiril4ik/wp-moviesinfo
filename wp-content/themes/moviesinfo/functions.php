<?php

require_once(ABSPATH."wp-content/themes/moviesinfo/includes/class/core/class-autoloader.php");
$class_autoloader = new \Core\Class_Autoloader();

new \Core\Custom_Metabox( 'movie_release_year', 'Release Year', 'movies' );
new \Core\Custom_Metabox( 'celebs_birth_year', 'Birth Year', 'celebs' );

//Register new post types: Movies, TV Series, Celebs, Awards
new \Modules\Custom_Register_Post_Type\Custom_Register_Post_Type;

//Add genre taxonomy for movies and type taxonomy for awards
new \Modules\Custom_Register_Taxonomy\Custom_Register_Taxonomy;

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
