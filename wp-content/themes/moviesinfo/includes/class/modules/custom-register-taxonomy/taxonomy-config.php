<?php
return [
	[
		'movie_genre',
		[ 'movies' ],
		[
			'label'       => '',
			'labels'      => [
				'name'          => 'Genres',
				'singular_name' => 'Genre'
			],
			'description' => '',
			'public'      => true,

			'hierarchical'      => false,
			'rewrite'           => true,
			'capabilities'      => array(),
			'meta_box_cb'       => null,
			'show_admin_column' => false,
			'show_in_rest'      => null,
			'rest_base'         => null,
		]
	],
	[
		'awards_type',
		[ 'awards' ],
		[
			'label'       => '',
			'labels'      => [
				'name'          => 'Types',
				'singular_name' => 'Type'
			],
			'description' => '',
			'public'      => true,

			'hierarchical'      => false,
			'rewrite'           => true,
			'capabilities'      => array(),
			'meta_box_cb'       => null,
			'show_admin_column' => false,
			'show_in_rest'      => null,
			'rest_base'         => null,
		]
	]
];
