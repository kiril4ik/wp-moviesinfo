<?php
return [
	[
		'add_section',
		'footer_section',
		[
			'title'    => __( 'Footer settings', 'moviesinfo' ),
			'priority' => 120,
		]
	],
	[
		'add_setting',
		'footer_copy',
		[
			'default'   => __( 'Copyright 2019', 'moviesinfo' ),
			'transport' => 'refresh',
		]
	],
	[
		'add_control',
		'footer_copy',
		[
			'label'    => __( 'Footer text', 'moviesinfo' ),
			'section'  => 'footer_section',
			'settings' => 'footer_copy',
			'type'     => 'textarea',
		]
	]
];
