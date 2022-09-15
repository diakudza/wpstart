<?php

add_action( 'wp_enqueue_scripts', 'childhood_styles' );
add_action( 'wp_enqueue_scripts', 'childhood_scripts' );

function childhood_styles() {
	wp_enqueue_style( 'childhood-slyle', get_stylesheet_uri() );
}

function childhood_scripts() {
	wp_enqueue_script( 'childhood-scripts', get_template_directory_uri() . '/assets/js/main.min.js',
		[], null, true );
}