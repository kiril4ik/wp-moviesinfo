<?php

return [
	[
		'movies',
		[
			'label'             => null,
			'labels'            => [
				'name'          => __( 'Movies' ), // основное название для типа записи
				'singular_name' => __( 'Movie' ), // название для одной записи этого типа
			],
			'description'       => __( 'Movies list with detailed description can be fond here' ),
			'public'            => true,
			'show_in_nav_menus' => true, // зависит от public
			'show_in_menu'      => true, // показывать ли в меню адмнки
			'rest_base'         => null, // $post_type. C WP 4.7
			'menu_position'     => null,
			'menu_icon'         => 'dashicons-video-alt',
			'hierarchical'      => false,
			'supports'          => [
				'title',
				'editor',
				'author',
				'thumbnail',
				'comments',
				'revisions',
				'page-attributes'
			],
			'taxonomies'        => [],
			'has_archive'       => 'movies',
			'rewrite'           => true,
			'query_var'         => true,
		]
	],
	[
		'series',
		[
			'label'             => null,
			'labels'            => [
				'name'          => __( 'TV Series' ),
				'singular_name' => __( 'TV Series' ),
			],
			'description'       => __( 'Here is best TV series category' ),
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_menu'      => true,
			'rest_base'         => null,
			'menu_position'     => null,
			'menu_icon'         => 'dashicons-welcome-view-site',
			'hierarchical'      => false,
			'supports'          => [
				'title',
				'editor',
				'author',
				'thumbnail',
				'comments',
				'revisions',
				'page-attributes'
			],
			'taxonomies'        => [],
			'has_archive'       => 'series',
			'rewrite'           => true,
			'query_var'         => true,
		]
	],
	[
		'celebs',
		[
			'label'             => null,
			'labels'            => [
				'name'          => __( 'Celebrities' ),
				'singular_name' => __( 'Celebrity' ),
			],
			'description'       => __( 'The most popular selebrities category' ),
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_menu'      => true,
			'rest_base'         => null,
			'menu_position'     => null,
			'menu_icon'         => 'dashicons-groups',
			'hierarchical'      => false,
			'supports'          => [
				'title',
				'editor',
				'author',
				'thumbnail',
				'comments',
				'revisions',
				'page-attributes'
			],
			'taxonomies'        => [],
			'has_archive'       => 'celebs',
			'rewrite'           => true,
			'query_var'         => true,
		]
	],
	[
		'awards',
		[
			'label'             => null,
			'labels'            => [
				'name'          => __( 'Awards' ),
				'singular_name' => __( 'Award' ),
			],
			'description'       => __( 'Oskar awards and many others' ),
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_menu'      => true,
			'rest_base'         => null,
			'menu_position'     => null,
			'menu_icon'         => 'dashicons-awards',
			'hierarchical'      => false,
			'supports'          => [
				'title',
				'editor',
				'author',
				'thumbnail',
				'comments',
				'revisions',
				'page-attributes'
			],
			'taxonomies'        => [],
			'has_archive'       => 'awards',
			'rewrite'           => true,
			'query_var'         => true,
		]
	]
];