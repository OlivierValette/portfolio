<?php

add_action( 'wp_enqueue_scripts', 'insert_css' );
function insert_css()
{
	// adding theme global css
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // adding jQuery
	wp_register_script('jquery2','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script('jquery2');
	// adding other libraries
	wp_register_script('scroll','https://unpkg.com/scrollreveal/dist/scrollreveal.min.js');
	wp_enqueue_script('scroll');
}

// Example of hook, adding text in wp_footer
add_action('wp_footer', 'footer_text');
function footer_text()
{
	echo "<p class='bottom-text'><i>&copy; Olivier Valette</i></p>";
}

// Defining menus location
add_theme_support('menus');
register_nav_menus([
	'menu-principal' => 'Navigation principale',
	'menu-secondaire' => 'Navigation secondaire',
	'menu-reseaux-sociaux' => 'Liens bas de page',
]);

?>