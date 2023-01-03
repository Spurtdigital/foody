<?php

if ( ! function_exists( 'creators_setup' ) ) :
	function creators_setup() {
		load_theme_textdomain( 'creators', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'widgets' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );
		add_theme_support( 'customize-selective-refresh-widgets' );

		register_nav_menus( array(
			'hoofdmenu' => esc_html__( 'Hoofdmenu', 'creators' ),
			'footermenu' => esc_html__( 'Footer menu', 'creators' ),
			'privacymenu' => esc_html__( 'Privacy menu', 'creators' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'creators_setup' );

function creators_hoofdmenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'hoofdmenu',
		'menu_class' => 'nav-bar__menu d-lg-flex',
		'theme_location' => 'hoofdmenu',
		'depth' => 2
	));
}

function creators_footermenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'footermenu',
		'menu_class' => 'footermenu',
		'theme_location' => 'footermenu',
		'depth' => 1
	));
}

function creators_privacymenu() {
	wp_nav_menu(array(
        'container' => false,
		'menu' => 'privacymenu',
		'menu_class' => 'privacymenu',
		'theme_location' => 'privacymenu',
		'depth' => 1
	));
}

function creators_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'creators_content_width', 640 );
}
add_action( 'after_setup_theme', 'creators_content_width', 0 );

function creators_scripts() {
	wp_deregister_script('jquery');
	
	wp_enqueue_style( 'creators-css', get_template_directory_uri() .  '/dist/css/app.css' );
	wp_enqueue_script( 'creators-manifest', get_template_directory_uri() . '/dist/js/manifest.js', array(), '', true );
	wp_enqueue_script( 'creators-vendor', get_template_directory_uri() . '/dist/js/vendor.js', array(), '', true );
	wp_enqueue_script( 'creators-app', get_template_directory_uri() . '/dist/js/app.js', array(), '', true );
	wp_enqueue_script( 'creators-builder', get_template_directory_uri() . '/dist/js/builder.js', array(), '', true );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css' );

}
add_action( 'wp_enqueue_scripts', 'creators_scripts' );

function creators_remove_metabox() {
    if ( ! current_user_can( 'edit_others_posts' ) )
        remove_meta_box( 'wpseo_meta', 'post', 'normal' );
}
add_action( 'add_meta_boxes', 'creators_remove_metabox', 11 );

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );

add_filter('use_block_editor_for_post', '__return_false', 10);