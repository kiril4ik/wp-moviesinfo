<?php
return [
	[ 'wp_enqueue_style', 'style-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' ],
	[ 'wp_enqueue_style', 'script-main-styles', get_template_directory_uri() . '/css/main.css' ],
	[ 'wp_enqueue_script', 'jquery', '' ],
	[ 'wp_enqueue_script', 'script-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js' ]
];
