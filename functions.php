<?php

// Add all scripts and stylesheets

function cloud4all_dequeue_styles() {
	wp_dequeue_style('twentytwelve-ie');
}

add_action( 'wp_enqueue_styles', 'cloud4all_dequeue_styles', 11);

wp_enqueue_style('cloud4all-ie', get_stylesheet_directory_uri() . "/css/ie.css", array("twentytwelve-style"), '1.0');
$wp_styles->add_data('cloud4all-ie', 'conditional', 'lt IE 9');

function cloud4all_scripts() {


    wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery 

    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_register_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
    wp_register_script( 'cookies', 'http:////cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js');

	wp_enqueue_script( 'full script', get_stylesheet_directory_uri() . "/js/min/full-scripts.min.js", array('jquery', 'jquery-ui', 'cookies'), null, false);
}

add_action('wp_enqueue_scripts', 'cloud4all_scripts', 11);

// add_action( 'wp_enqueue_scripts', 'twentytwelve_cloud4all_scripts_styles' );

// Add Cloud4all favicon
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.ico" />' . "\n";
}
add_action('wp_head', 'blog_favicon');

// Footer menus
function register_footer_menus() {
	register_nav_menus( 
		array(
			'footer_project_menu' => 'ProjectMenu',
			'footer_research_menu' => 'ResearchMenu',
			'footer_development_menu' => 'DevelopmentMenu',
			'footer_dissemination_menu' => 'DisseminationMenu',
			'footer_utilities_menu' => 'UtilitiesMenu'
		) 
	);
}
add_action('after_setup_theme', 'register_footer_menus', 11);

function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

?>;