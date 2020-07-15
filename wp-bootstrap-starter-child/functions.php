<?php

require_once 'custom_elementor.php';

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css' );
   wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri().'/css/owl.carousel.min.css' );
   wp_enqueue_script( 'owl-scripy', get_stylesheet_directory_uri().'/js/owl.carousel.min.js' );
}
// Remove WP Version From Styles
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

function wp_bootstrap_starter_child_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'wp-bootstrap-starter' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Disclaimer', 'wp-bootstrap-starter' ),
        'id'            => 'disclaimer',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
}
add_action( 'widgets_init', 'wp_bootstrap_starter_child_widgets_init' );



//Testimonial CPT
function testimonial_custom_post_type() {
	$labels = array(
		'name'                => __( 'Testimonial' ),
		'singular_name'       => __( 'Tsetimonial'),
		'menu_name'           => __( 'Testimonial'),
		'parent_item_colon'   => __( 'Parent Testimonial'),
		'all_items'           => __( 'All Testimonials'),
		'view_item'           => __( 'View Tsetimonial'),
		'add_new_item'        => __( 'Add New Tsetimonial'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Tsetimonial'),
		'update_item'         => __( 'Update Tsetimonial'),
		'search_items'        => __( 'Search Tsetimonial'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'Tsetimonial'),
		'description'         => __( 'Tsetimonial'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	        'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page'
);
	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'testimonial_custom_post_type', 0 );

function getPostsForSelect( $args = null ) {
	$posts = get_posts();

	$select_posts = [];

	foreach( $posts as $post ) {
		$select_posts[$post->ID] = ucfirst( $post->post_title );
	}
	return $select_posts;
}

function getPagesForSelect( $args = null ) {
	$pages = get_pages(array('sort_column' => 'post_title', 'sort_order' => 'ASC'));

	$select_pages = [];

	foreach( $pages as $mpage ) {
		$select_pages[$mpage->ID] = ucfirst( $mpage->post_title );
	}
	return $select_pages;
}
