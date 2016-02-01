<?php

/* Enqueue Scripts and Styles
-------------------------------------------------------------- */

function theme_name_scripts() {

	wp_enqueue_style( 'screen.css', get_template_directory_uri() . '/dist/styles/screen.css' );
	wp_enqueue_style( 'slick-carousel.css', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'slick-carousel-theme.css', get_template_directory_uri() . '/css/slick-theme.css' );
    wp_enqueue_style( 'slicknav.css', get_template_directory_uri() . '/css/slicknav.css' );
// 	wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	
	wp_enqueue_script( 'jquery' );
	// 	wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	wp_enqueue_script( 'slick-carousel.js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '', false );
    wp_enqueue_script( 'slicknav.js', get_template_directory_uri() . '/js/slicknav.min.js', array( 'jquery' ), '', false );
    wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'match-height.js', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ), '', false );
 	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', 
 	array( 'jquery', 
 		   'slick-carousel.js',
           'slicknav.js',
           'bootstrap.js',
 		   'match-height.js' ), '', true ); // enqueue new scripts before this script and add handle to array
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

/* Register Nav-Menus
-------------------------------------------------------------- */

register_nav_menus( array(
	'main_menu' => 'Main Menu',
	'sidebar_menu' => 'Sidebar Menu',
) );

/* No Tab Conflicts Gravity Forms
-------------------------------------------------------------- */

add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
    }

/* Dynamic Sidebars
-------------------------------------------------------------- */

if(function_exists('register_sidebars')){
	
	register_sidebar(array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
		'name'          => 'Blog Sidebar',
		'id'            => 'blog_sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
	));
}

/* Add Theme Support Page Thumbnails
-------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );

/* Modify the_excerpt() " read more "
-------------------------------------------------------------- */

function new_excerpt_more($more) {
   global $post;
   return '... <a href="'. get_permalink($post->ID) . '">' . 'read more' . '</a>';
   }
   add_filter('excerpt_more', 'new_excerpt_more');