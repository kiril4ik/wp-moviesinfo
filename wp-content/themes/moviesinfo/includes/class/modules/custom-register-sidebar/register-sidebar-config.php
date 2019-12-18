<?php

return [
	[
		'id'            => 'main-left-sidebar',
		'name'          => __( 'Left Sidebar' ),
		'description'   => __( 'The lastest films is here' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	],
	[
		'id'            => 'main-right-sidebar',
		'name'          => __( 'Right Sidebar' ),
		'description'   => __( 'The lastest films is here' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	],
	[
		'id'            => 'footer-sidebar',
		'name'          => __( 'Footer Sidebar' ),
		'description'   => __( 'Info categories' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	]
];
