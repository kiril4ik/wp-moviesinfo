<?php
return [
	[ 'wp_enqueue_style', 'style-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' ],
	[ 'wp_enqueue_style', 'script-main-styles', get_template_directory_uri() . '/assets/css/main.css' ],
	[ 'wp_enqueue_script', 'jquery', '' ],
	[ 'wp_enqueue_script', 'main-script', get_template_directory_uri() . '/assets/js/main.js' ],
	[ 'wp_enqueue_script', 'script-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js' ],
	[ 'wp_enqueue_script', 'script-reg-form', get_template_directory_uri() . '/assets/js/auth.js' ]
];
