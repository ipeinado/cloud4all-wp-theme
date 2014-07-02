<?php

function twentytwelve_cloud4all_scripts() {

    wp_register_style('bootstrap-min', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-min');
		
	wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery  
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
    wp_register_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
    wp_register_script( 'cookies', 'http:////cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js');

	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . "/js/card-demo.js", array('jquery', 'jquery-ui', 'cookies'), null, false);

}

add_action( 'wp_enqueue_scripts', 'twentytwelve_cloud4all_scripts' );

?>