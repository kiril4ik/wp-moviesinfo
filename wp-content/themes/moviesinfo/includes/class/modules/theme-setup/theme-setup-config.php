<?php

return [
	'add_theme_support'       => [
		[ 'tittle-tag', get_template_directory() . "/lang" ],
		[
			'custom-logo',
			[
				'height' => 40,
				'width'  => 40,
				'flex'   => true
			]
		],
		[ 'post-thumbnails', null ],
		[
			'html5',
			[
				'search_form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			]
		],
		[
			'post-formats',
			[
				'aside',
				'image',
				'video',
				'gallery'
			]
		]
	],
	'load_theme_textdomain'   => 'moviesinfo',
	'set_post_thumbnail_size' => [ 730, 446 ]
];
set_post_thumbnail_size( 730, 446 );