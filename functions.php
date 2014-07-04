<?php

// Add all scripts and stylesheets

function cloud4all_dequeue_styles() {
	wp_dequeue_style('twentytwelve-ie');
}

function cloud4all_enqueue_styles() {
	global $wp_styles;
	wp_enqueue_style('cloud4all-ie', get_stylesheet_directory_uri() . "/css/ie.css", array("twentytwelve-style"), '1.0');
	$wp_styles->add_data('cloud4all-ie', 'conditional', 'lt IE 9');
}

function cloud4all_scripts() {


    wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery 

    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_register_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
    wp_register_script( 'cookies', 'http:////cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js');

    wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . "/js/modernizr.custom.25951.js");

	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . "/js/scripts.js", array('jquery'), null, false);
	
	wp_enqueue_script( 'card-demo', get_stylesheet_directory_uri() . "/js/card-demo.js", array('jquery', 'jquery-ui', 'cookies'), null, false);
}

add_action( 'wp_enqueue_scripts', 'cloud4all_scripts');
add_action( 'wp_enqueue_scripts', 'cloud4all_dequeue_styles', 11);
add_action( 'wp_enqueue_scripts', 'cloud4all_enqueue_styles', 11);

// add_action( 'wp_enqueue_scripts', 'twentytwelve_cloud4all_scripts_styles' );

// Add Cloud4all favicon
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.ico" />' . "\n";
}
add_action('wp_head', 'blog_favicon');


?>