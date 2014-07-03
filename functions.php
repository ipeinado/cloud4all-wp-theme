<?php

// Add all scripts and stylesheets
function twentytwelve_cloud4all_scripts() {

    wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery  
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_register_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
    wp_register_script( 'cookies', 'http:////cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js');

	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . "/js/scripts.js", array('jquery'), null, false);
	
	wp_enqueue_script( 'card-demo', get_stylesheet_directory_uri() . "/js/card-demo.js", array('jquery', 'jquery-ui', 'cookies'), null, false);
}

add_action( 'wp_enqueue_scripts', 'twentytwelve_cloud4all_scripts' );

// Add Cloud4all favicon
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.ico" />' . "\n";
}
add_action('wp_head', 'blog_favicon');


?>