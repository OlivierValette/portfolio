<?php

add_action( 'wp_enqueue_scripts', 'insert_css' );
function insert_css()
{
	// adding theme global css
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    // adding fonts
	wp_register_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather', false);
	wp_enqueue_style('custom-google-fonts');
 
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

// Inserting sidebar in back-office
if ( function_exists('register_sidebar') ) {
	register_sidebar([
		'name' => 'sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	]);
}

// Activating featured images (post thumbnails)
add_theme_support('post-thumbnails');

// Creating custom post-types for specific needs
function create_post_type() {
	register_post_type('clients',
		[
			'label'                 => __('Clients'),
			'singular_label'        => __('Client'),
			'add_new_item'          => __('Ajouter un client'),
			'edit_item'             => __('Modifier un client'),
			'new_item'              => __('Nouveau client'),
			'view_item'             => __('Voir le client'),
			'search_items'          => __('Rechercher un client'),
			'not_found'             => __('Aucun client trouvé'),
			'not_found_in_trash'    => __('Aucun client trouvé'),
			'public'                => true,
			'show_ui'               => true,
			'capability_type'       => 'post',
			'has_archive'           => true,
			'hierarchical'          => true,
			'menu_icon'             => 'dashicons-groups',
			'taxonomies'            => array('types'),
			'supports'              => array('title', 'editor', 'thumbnail'),
			'rewrite'               => array('slug' => 'client', 'with_front' => true),
		]
	);
	register_post_type('realisations',
		[
			'label'                 => __('Réalisations'),
			'singular_label'        => __('Réalisation'),
			'add_new_item'          => __('Ajouter une réalisation'),
			'edit_item'             => __('Modifier une réalisation'),
			'new_item'              => __('Nouvelle réalisation'),
			'view_item'             => __('Voir la réalisation'),
			'search_items'          => __('Rechercher une réalisation'),
			'not_found'             => __('Aucune réalisation trouvée'),
			'not_found_in_trash'    => __('Aucune réalisation trouvée'),
			'public'                => true,
			'show_ui'               => true,
			'capability_type'       => 'post',
			'has_archive'           => true,
			'hierarchical'          => true,
			'menu_icon'             => 'dashicons-images-alt',
			'taxonomies'            => array('types'),
			'supports'              => array('title', 'editor', 'thumbnail'),
			'rewrite'               => array('slug' => 'realisation', 'with_front' => true),
		]
	);
}
add_action( 'init', 'create_post_type' );

// Adding associated taxonomies
function citrouille_taxonomy() {
	register_taxonomy(
		'nature',
		'clients',
		[
			'label' => 'Nature',
			'query_var' => true,
			'rewrite' => [
				'slug' => 'nature',
				'with_front' => true,
			]
		]
	);
	register_taxonomy(
		'genre',
		'realisations',
		[
			'label' => 'Genre',
			'query_var' => true,
			'rewrite' => [
				'slug' => 'genre',
				'with_front' => true,
				]
		]
	);
}
add_action( 'init', 'citrouille_taxonomy');